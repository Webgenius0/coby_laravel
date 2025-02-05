<?php
namespace App\Http\Controllers\Api\Frontend\Booking;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Broker;

class BrokerController extends Controller
{
    public function show($code)
    {
        $broker = Broker::where('slug', $code)->first();

        if (!$broker) {
            return Helper::jsonResponse(false, 'Broker not found', 404);
        }

        return Helper::jsonResponse(true, 'Broker details', 200, $broker);
    }
}