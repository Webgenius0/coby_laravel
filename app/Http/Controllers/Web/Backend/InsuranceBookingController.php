<?php

namespace App\Http\Controllers\Web\Backend;

use App\Helpers\Helper;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Broker;
use App\Models\Country;
use App\Models\Logic;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class InsuranceBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $status = null)
    {
        if ($request->ajax()) {

            $data = Booking::query();
            if ($status != null && $status != '') {
                $data = $data->where('payment_status', '=', $status);
            }
            $data = $data->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('total_price', function ($data) {
                    return floatval($data->total_price).' '.$data->currency;
                })
                ->addColumn('status', function ($data) {
                    $backgroundColor = $data->status == "active" ? '#4CAF50' : '#ccc';
                    $sliderTranslateX = $data->status == "active" ? '26px' : '2px';
                    $sliderStyles = "position: absolute; top: 2px; left: 2px; width: 20px; height: 20px; background-color: white; border-radius: 50%; transition: transform 0.3s ease; transform: translateX($sliderTranslateX);";

                    $status = '<div class="form-check form-switch" style="margin-left:40px; position: relative; width: 50px; height: 24px; background-color: ' . $backgroundColor . '; border-radius: 12px; transition: background-color 0.3s ease; cursor: pointer;">';
                    $status .= '<input onclick="showStatusChangeAlert(' . $data->id . ')" type="checkbox" class="form-check-input" id="customSwitch' . $data->id . '" getAreaid="' . $data->id . '" name="status" style="position: absolute; width: 100%; height: 100%; opacity: 0; z-index: 2; cursor: pointer;">';
                    $status .= '<span style="' . $sliderStyles . '"></span>';
                    $status .= '<label for="customSwitch' . $data->id . '" class="form-check-label" style="margin-left: 10px;"></label>';
                    $status .= '</div>';

                    return $status;
                })
                ->addColumn('action', function ($data) {
                    $pdf = $data->payment_status == 'paid' ? '' : 'd-none';
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

                                <a href="#" type="button" onclick="goToShow(' . $data->id . ')" class="btn btn-primary fs-14 text-white delete-icn" title="View">
                                    <i class="fe fe-eye"></i>
                                </a>

                                <a href="#" type="button" onclick="goToEdit(' . $data->id . ')" class="btn btn-success fs-14 text-white delete-icn" title="Edit">
                                    <i class="fe fe-edit"></i>
                                </a>

                                <a href="#" type="button" onclick="openToPdf(' . $data->id . ')" class="btn btn-warning fs-14 text-white delete-icn '. $pdf .'" title="PDF">
                                    <i class="fe fe-file"></i>
                                </a>

                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>

                            </div>';
                })
                ->rawColumns(['total_price', 'status', 'action'])
                ->make();
        }
        return view("backend.layouts.booking.index");
    }

    public function show(Booking $booking, $id)
    {
        $booking = Booking::findOrFail($id);
        return view('backend.layouts.booking.show', compact('booking'));
    }

    public function edit(Booking $booking, $id)
    {
        $booking = Booking::findOrFail($id);
        $countries = Country::all();
        $brokers = Broker::all();
        return view('backend.layouts.booking.edit', compact('booking', 'countries', 'brokers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'policy_currency' => 'required|in:British Pounds,US Dollar',
            'country_of_residence' => 'required|string|max:100',
            'insurance_type' => 'required|in:single-trip,multi-trip',
            'policy_type' => 'nullable|string|max:50',
            'coverage_type' => 'nullable|string|max:50',
            'area_of_travel' => 'required|in:europe,ex_usa,worldwide',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'number_of_adults' => 'required|integer|min:1',
            /*'adults' => 'required|array|min:1',
            'adults.*.name' => 'nullable|string|max:255',
            'adults.*.forename' => 'nullable|string|max:100',
            'adults.*.surname' => 'nullable|string|max:100',
            'adults.*.birth_day' => 'nullable|string',
            'adults.*.nationality' => 'nullable|string|max:50', */
            'number_of_children' => 'nullable|integer|min:0',
            /*'children' => 'nullable|array',
            'children.*.name' => 'nullable|string|max:255',
            'children.*.forename' => 'nullable|string|max:100',
            'children.*.surname' => 'nullable|string|max:100',
            'children.*.birth_day' => 'required|string',
            'children.*.nationality' => 'nullable|string|max:50', */
            'travel_type' => 'nullable|array',
            'address_one' => 'required|string|max:255',
            'address_two' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'country' => 'required|string|max:100',
            'how_know' => 'nullable|string|max:255',
            'comments' => 'nullable|string|max:1000',
            'total_price' => 'required|numeric|min:0',
            'currency' => 'required|in:USD,GBP',
            'broker_id' => 'required|exists:brokers,id',
            'status' => 'nullable|in:active,inactive',
            'payment_status' => 'required|in:paid,pending,failed,saved',
        ]);

        $validate['travel_type'] = json_encode($validate['travel_type'] ?? []);
        $validate['adults'] = json_encode($request['adults']);
        $validate['children'] = json_encode($request['children'] ?? []);

        try {
            $booking = Booking::findOrFail($id);

            $booking->update($validate);
            session()->put('t-success', 'Booking updated successfully');
        } catch (Exception $e) {
            session()->put('t-error', $e->getMessage());
        }

        return redirect()->route('insurance.booking.show', ['id' => $id]);
    }

    public function create(){
        $countries = Country::all();
        $brokers = Broker::all();
        return view('backend.layouts.booking.create', compact('countries', 'brokers'));
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'policy_currency' => 'required|in:British Pounds,US Dollar',
            'country_of_residence' => 'required|string|max:100',
            'insurance_type' => 'required|in:single-trip,multi-trip',
            'policy_type' => 'nullable|string|max:50',
            'coverage_type' => 'nullable|string|max:50',
            'area_of_travel' => 'required|in:europe,ex_usa,worldwide',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'number_of_adults' => 'required|integer|min:1',
            /*'adults' => 'required|array|min:1',
            'adults.*.name' => 'nullable|string|max:255',
            'adults.*.forename' => 'nullable|string|max:100',
            'adults.*.surname' => 'nullable|string|max:100',
            'adults.*.birth_day' => 'nullable|string',
            'adults.*.nationality' => 'nullable|string|max:50', */
            'number_of_children' => 'nullable|integer|min:0',
            /*'children' => 'nullable|array',
            'children.*.name' => 'nullable|string|max:255',
            'children.*.forename' => 'nullable|string|max:100',
            'children.*.surname' => 'nullable|string|max:100',
            'children.*.birth_day' => 'required|string',
            'children.*.nationality' => 'nullable|string|max:50', */
            'travel_type' => 'nullable|array',
            'address_one' => 'required|string|max:255',
            'address_two' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'country' => 'required|string|max:100',
            'how_know' => 'nullable|string|max:255',
            'comments' => 'nullable|string|max:1000',
            'total_price' => 'required|numeric|min:0',
            'currency' => 'required|in:USD,GBP',
            'broker_id' => 'required|exists:brokers,id',
            'status' => 'nullable|in:active,inactive',
            'payment_status' => 'required|in:paid,pending,failed,saved',
        ]);

        $validatedData['created_at'] = date('Y-m-d H:i:s');


        do {
            $unique_id = "JSL-SS" . str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
        } while (Booking::where('unique_id', $unique_id)->exists());

        $validatedData['unique_id'] = $unique_id;

        $validatedData['travel_type'] = json_encode($validatedData['travel_type'] ?? []);
        $validatedData['adults'] = json_encode($request['adults']);
        $validatedData['children'] = json_encode($request['children'] ?? []);

        $validatedData['status'] = 'inactive';
        $validatedData['payment_status'] = 'pending';

        $data = Booking::create($validatedData);

        return redirect()->route('insurance.booking.show', ['id' => $data->id]);
    }

    public function destroy(string $id)
    {
        try {
            $data = Booking::findOrFail($id);
            $data->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Your action was successful!'
            ]);
            
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Your action was successful!'
            ]);
        }
    }

    public function status(int $id): JsonResponse
    {
        $data = Booking::findOrFail($id);
        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Item not found.',
            ]);
        }
        $data->status = $data->status === 'active' ? 'inactive' : 'active';
        $data->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Your action was successful!',
        ]);
    }

    public function pdf($id)
    {
        $data = Booking::where('payment_status', 'paid')->findOrFail($id);

        if (!$data) {
            return response()->json([
                'status' => 't-error',
                'message' => 'Item not found.',
            ]);
        }

        $icon = base64_encode(file_get_contents(public_path('default/logo.png')));
        $pdf = PDF::loadView('pdf.certificate', [
            'data' => $data,
            'charge' => Logic::first()->charge, 
            'icon' => $icon
        ]);
        return $pdf->stream('certificate.pdf');
    }

}
