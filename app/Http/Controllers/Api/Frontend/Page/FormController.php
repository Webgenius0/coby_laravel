<?php

namespace App\Http\Controllers\Api\Frontend\Page;

use App\Enums\PageEnum;
use App\Enums\SectionEnum;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\CMS;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        //cms start
        $query = CMS::where('page', PageEnum::FORM)->where('status', 'active');
        $cms = [];
        foreach (SectionEnum::FormPage() as $key => $section) {
            $cms[$key] = (clone $query)->where('section', $key)->latest()->take($section['item'])->{$section['type']}();
        }
        //cms end
        foreach ($cms['form_pdf'] as $key => $value) {
            $pdf = json_decode($value->metadata, true);
            $pdf['pdf'] = asset($pdf['pdf']);
            $value->metadata = json_encode($pdf);
            $cms['form_pdf'][$key] = $value;
        }

        $data = [
            'cms' => $cms
        ];
        return Helper::jsonResponse(true, 'Home Page', 200, $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'policy_currency' => 'required|in:British Pounds,USA Dollers',
            'country_of_residence' => 'required|string|max:100',
            'insurance_type' => 'required|in:single-trip,multi-trip',
            'policy_type' => 'nullable|string|max:50',
            'coverage_type' => 'nullable|string|max:50',
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
            'travel_type' => 'required|array|min:1',
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

        $validatedData['created_at'] = date('Y-m-d H:i:s');


        do {
            $unique_id = uniqid('bk_', true);
        } while (Booking::where('unique_id', $unique_id)->exists());

        $validatedData['unique_id'] = $unique_id;

        $validatedData['travel_type'] = json_encode($validatedData['travel_type']);
        $validatedData['adults'] = json_encode($validatedData['adults']);
        $validatedData['children'] = json_encode($validatedData['children'] ?? []);

        $validatedData['status'] = 'inactive';
        $validatedData['payment_status'] = 'pending';

        $data = Booking::create($validatedData);

        return redirect()->route('payment.stripe.checkout', $data->id);
    }
}
