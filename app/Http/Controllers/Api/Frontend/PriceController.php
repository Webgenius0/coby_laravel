<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class PriceController extends Controller
{
    public function getPrice(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'is_annual' => 'required|boolean',
            'destination' => 'required|string|in:europe,ex_usa,worldwide',
            'max_duration' => 'required|integer',
            'age_group' => 'required|string|in:49, 50-59, 60-64, 65-69, 70-74, 80-84',
            'party_type' => 'required|string|in:individual, couple, family'
        ]);

        if ($validation->fails()) {
            return Helper::jsonResponse(false, $validation->errors()->first(), 422);
        }

        $price = Pricing::where('is_annual', $request->is_annual)
            ->where('destination', $request->destination)
            ->where('max_duration', $request->max_duration)
            ->where('age_group', $request->age_group)
            ->where('party_type', $request->party_type)
            ->first();

        if (!$price) {
            return Helper::jsonResponse(false, 'Price not found', 404);
        }

        $data = [
            'price' => $price->base_premium
        ];
        
        return Helper::jsonResponse(true, 'Price', 200, $data);
    }
}
