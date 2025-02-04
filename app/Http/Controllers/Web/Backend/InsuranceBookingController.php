<?php

namespace App\Http\Controllers\Web\Backend;

use App\Helpers\Helper;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
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
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

                                <a href="#" type="button" onclick="goToShow(' . $data->id . ')" class="btn btn-primary fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-eye"></i>
                                </a>

                                <a href="#" type="button" onclick="goToEdit(' . $data->id . ')" class="btn btn-success fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-edit"></i>
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
        return view('backend.layouts.booking.edit', compact('booking', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'policy_currency' => 'required|in:British Pounds,USA Dollers',
            'country_of_residence' => 'required|string|max:100',
            'insurance_type' => 'required|in:single-trip,multi-trip',
            'policy_type' => 'nullable|in:standard,extended',
            'coverage_type' => 'nullable|in:standard,increased',
            'area_of_travel' => 'required|in:europe,ex_usa,worldwide',
            'age' => 'required|string|max:50',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'number_of_adults' => 'required|integer|min:1',
            'adults' => 'required|array|min:1',
            'adults.*.name' => 'required|string|max:255',
            'adults.*.forename' => 'required|string|max:100',
            'adults.*.surname' => 'required|string|max:100',
            'adults.*.birth_day' => 'required|string',
            'adults.*.nationality' => 'required|string|max:50',
            'number_of_children' => 'nullable|integer|min:0',
            'children' => 'nullable|array',
            'children.*.name' => 'required_with:children|string|max:255',
            'children.*.forename' => 'required_with:children|string|max:100',
            'children.*.surname' => 'required_with:children|string|max:100',
            'children.*.birth_day' => 'required|string',
            'children.*.nationality' => 'required_with:children|string|max:50',
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
        ]);

        try {
            $booking = Booking::findOrFail($id);

            $booking->update($validate);
            session()->put('t-success', 'Booking updated successfully');
        } catch (Exception $e) {
            session()->put('t-error', $e->getMessage());
        }

        return redirect()->route('booking.index');
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

}
