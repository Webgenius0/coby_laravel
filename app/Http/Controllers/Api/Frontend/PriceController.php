<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use GuzzleHttp\Client;
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
            'age_group' => 'required|string|in:49,50-59,60-64,65-69,70-74,80-84',
            'party_type' => 'required|string|in:individual,couple,family'
        ]);

        if ($validation->fails()) {
            return Helper::jsonResponse(false, $validation->errors()->first(), 422);
        }

        $priceQuery = Pricing::where('is_annual', $request->is_annual)->where('destination', $request->destination);
       
        $maxDuration = $request->max_duration;

        switch (true) {
            case $maxDuration == 0 || $maxDuration == "0" :
                $priceQuery->where('max_duration', 0)->orWhere('max_duration', '0');
                break;
            case $maxDuration >= 1 && $maxDuration <= 7:
                $priceQuery->where('max_duration', 7);
                break;
            case $maxDuration > 8 && $maxDuration <= 10:
                $priceQuery->where('max_duration', 10);
                break;
            case $maxDuration >= 11 && $maxDuration <= 18:
                $priceQuery->where('max_duration', 18);
                break;
            case $maxDuration >= 19 && $maxDuration <= 24:
                $priceQuery->where('max_duration', 24);
                break;
            case $maxDuration >= 25 && $maxDuration <= 30:
                $priceQuery->where('max_duration', 30);
                break;
            default:
                return Helper::jsonResponse(false, 'Price not found', 404);
        }

        $price = $priceQuery->where('age_group', $request->age_group)->where('party_type', $request->party_type)->first();

        if (!$price) {
            return Helper::jsonResponse(false, 'Price not found', 404);
        }

        $client = new Client();
        $response = $client->get('https://api.exchangerate-api.com/v4/latest/GBP');
        $data = json_decode($response->getBody(), true);
        $rate = $data['rates']['USD'];

        $data = [
            'price_in_pound' => $price->base_premium, 
            'price_in_dollar' => $price->base_premium * $rate //GBP to USD
        ];

        return Helper::jsonResponse(true, 'Price', 200, $data);
    }
}
