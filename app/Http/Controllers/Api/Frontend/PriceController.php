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

        $priceQuery = Pricing::where('is_annual', $request->is_annual)->where('destination', $request->destination);

        if ($request->max_duration > 30) {
            return Helper::jsonResponse(false, 'Price not found', 404);
        }elseif ($request->max_duration > 1 && $request->max_duration <= 10) { //1-10 = 10
            $priceQuery->where('max_duration', 10);
        }elseif ($request->max_duration >= 11 && $request->max_duration <= 18) { //11-18 = 18
            $priceQuery->where('max_duration', 10);
        }elseif ($request->max_duration >= 18 && $request->max_duration <= 24) { //18-24 = 24
            $priceQuery->where('max_duration', 24);
        }elseif ($request->max_duration >= 25 && $request->max_duration <= 30) { //25-30 = 30
            $priceQuery->where('max_duration', 30);
        }else{
            $priceQuery->where('max_duration', 0);
        }

        $price = $priceQuery->where('age_group', $request->age_group)->where('party_type', $request->party_type)->first();

        if (!$price) {
            return Helper::jsonResponse(false, 'Price not found', 404);
        }

        $data = [
            'price' => $price->base_premium
        ];
        
        return Helper::jsonResponse(true, 'Price', 200, $data);
    }
}
