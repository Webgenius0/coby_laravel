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
            'multi_trip_standard' => $logic->multi_trip_standard ? number_format(($logic->multi_trip_standard / 100) + 1, 2) : 0,
            'multi_trip_extended' => $logic->multi_trip_extended ? number_format(($logic->multi_trip_extended / 100) + 1, 2) : 0,
            'cancellation_coverage_standard' => $logic->cancellation_coverage_standard ? number_format(($logic->cancellation_coverage_standard / 100) + 1, 2) : 0,
            'cancellation_coverage_increased' => $logic->cancellation_coverage_increased ? number_format(($logic->cancellation_coverage_increased / 100) + 1, 2) : 0,
            'winter_sprots' => $logic->winter_sprots ? number_format(($logic->winter_sprots + 100) / 100, 2) : 0,
            'adventure_sprots_multi' => $logic->adventure_sprots_multi ? number_format(($logic->adventure_sprots_multi + 100) / 100, 2) : 0,
            'adventure_sprots_single' => $logic->adventure_sprots_single ? number_format(($logic->adventure_sprots_single + 100) / 100, 2) : 0,
            'charge' => $logic->charge ? number_format($logic->charge, 2) : 0,
            'tax' => $logic->tax ? number_format($logic->tax, 2) : 0
        ];
        return Helper::jsonResponse(true, 'Logic', 200, $data);
    }
}
