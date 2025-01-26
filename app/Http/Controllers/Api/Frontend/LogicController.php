<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Logic;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class LogicController extends Controller
{
    public function getLogic(Request $request)
    {
        $logic = Logic::latest()->first();
        if (!$logic) {
            return Helper::jsonResponse(false, 'Logic not found', 404);
        }
        $data = [
            'multi_trip_standard' => $logic->multi_trip_standard,
            'multi_trip_extended' => $logic->multi_trip_extended,
            'cancellation_coverage_standard' => $logic->cancellation_coverage_standard,
            'cancellation_coverage_extended' => $logic->cancellation_coverage_extended,
            'winter_sports' => $logic->winter_sports,
            'adventure_sports_multi' => $logic->adventure_sports_multi,
            'adventure_sports_single' => $logic->adventure_sports_single,
            'charge' => $logic->charge
        ];
        return Helper::jsonResponse(true, 'Logic', 200, $data);
    }
}
