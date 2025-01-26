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
            'multi_trip_standard' => $logic->multi_trip_standard ? ($logic->multi_trip_standard / 100) + 1 : 0,
            'multi_trip_extended' => $logic->multi_trip_extended ? ($logic->multi_trip_extended / 100) + 1 : 0,
            'cancellation_coverage_standard' => $logic->cancellation_coverage_standard ? ($logic->cancellation_coverage_standard / 100) + 1 : 0,
            'cancellation_coverage_extended' => $logic->cancellation_coverage_extended ? ($logic->cancellation_coverage_extended / 100) + 1 : 0,
            'winter_sports' => $logic->winter_sports ? ($logic->winter_sports + 100) / 100 : 0,
            'adventure_sports_multi' => $logic->adventure_sports_multi ? ($logic->adventure_sports_multi + 100) / 100 : 0,
            'adventure_sports_single' => $logic->adventure_sports_single ? ($logic->adventure_sports_single + 100) / 100 : 0,
            'charge' => $logic->charge ? number_format((float) $logic->charge, 2, '.', '') : 0,
        ];
        return Helper::jsonResponse(true, 'Logic', 200, $data);
    }
}
