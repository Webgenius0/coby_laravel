<?php
namespace App\Http\Controllers\Api\Frontend\Booking;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();

        if ($countries->count() == 0) {
            return Helper::jsonResponse(false, 'No countries found', 404);
        }

        return Helper::jsonResponse(true, 'Countries list', 200, $countries);
    }
}