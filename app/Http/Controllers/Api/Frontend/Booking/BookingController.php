<?php

namespace App\Http\Controllers\Api\Frontend\Booking;

use App\Enums\PageEnum;
use App\Enums\SectionEnum;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Mail\SendQuote;
use App\Models\Booking;
use App\Models\CMS;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Services\BookingServices;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    protected $BookingServices;

    public function __construct(BookingServices $BookingServices)
    {
        $this->BookingServices = $BookingServices;
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'policy_currency' => 'required|in:British Pounds,USA Dollers',
            'country_of_residence' => 'required|string|max:100',
            'insurance_type' => 'nullable|in:single-trip,multi-trip',
            'policy_type' => 'nullable|string|max:50',
            'coverage_type' => 'nullable|string|max:50',
            'area_of_travel' => 'required|in:europe,ex_usa,worldwide',
            'age' => 'nullable|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
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
            'broker_id' => 'nullable|exists:brokers,id',
        ]);

        $validatedData['created_at'] = date('Y-m-d H:i:s');


        do {
            $unique_id = "JSL-SS" . str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
        } while (Booking::where('unique_id', $unique_id)->exists());

        $validatedData['unique_id'] = $unique_id;

        $validatedData['travel_type'] = json_encode($validatedData['travel_type']);
        $validatedData['adults'] = json_encode($validatedData['adults']);
        $validatedData['children'] = json_encode($validatedData['children'] ?? []);

        $validatedData['status'] = 'inactive';
        $validatedData['payment_status'] = 'pending';

        $data = Booking::create($validatedData);

        $this->BookingServices->jsonFileSave($data->id);
        $this->BookingServices->PdfFileSave($data->id);

        return redirect()->route('payment.stripe.checkout', $data->id);
    }
    public function quote(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'policy_currency' => 'required|in:British Pounds,USA Dollers',
            'country_of_residence' => 'required|string|max:100',
            'insurance_type' => 'nullable|in:single-trip,multi-trip',
            'policy_type' => 'nullable|string|max:50',
            'coverage_type' => 'nullable|string|max:50',
            'area_of_travel' => 'required|in:europe,ex_usa,worldwide',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'currency' => 'required|in:USD,GBP',
            'total_price' => 'required|numeric|min:0',
            'if_contact' => 'required|boolean',
        ]);
        $validatedData['created_at'] = date('Y-m-d H:i:s');

        do {
            $unique_id = "JSL-SS" . str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
        } while (Booking::where('unique_id', $unique_id)->exists());

        $validatedData['unique_id'] = $unique_id;

        $validatedData['status'] = 'inactive';
        $validatedData['payment_status'] = 'saved';

        $data = Booking::create($validatedData);

        Mail::to($data->email)->send(new SendQuote($data));

        return Helper::jsonResponse(true, 'Quote created successfully', 200, $data);
    }

    public function show($id)
    {
        $booking = Booking::where('payment_status', 'saved')->find($id);
        if (!$booking) {
            return Helper::jsonResponse(false, 'Quote not found', 404);
        }
        return Helper::jsonResponse(true, 'Quote details', 200, $booking);
    }

}
