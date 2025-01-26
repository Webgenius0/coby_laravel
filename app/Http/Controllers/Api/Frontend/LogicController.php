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
            'multi_trip_standard' => number_format((float) ($logic->multi_trip_standard ? ($logic->multi_trip_standard / 100) + 1 : 0), 2, '.', ''),
            'multi_trip_extended' => number_format((float) ($logic->multi_trip_extended ? ($logic->multi_trip_extended / 100) + 1 : 0), 2, '.', ''),
            'cancellation_coverage_standard' => number_format((float) ($logic->cancellation_coverage_standard ? ($logic->cancellation_coverage_standard / 100) + 1 : 0), 2, '.', ''),
            'cancellation_coverage_extended' => number_format((float) ($logic->cancellation_coverage_extended ? ($logic->cancellation_coverage_extended / 100) + 1 : 0), 2, '.', ''),
            'winter_sports' => number_format((float) ($logic->winter_sports ? ($logic->winter_sports + 100) / 100 : 0), 2, '.', ''),
            'adventure_sports_multi' => number_format((float) ($logic->adventure_sports_multi ? ($logic->adventure_sports_multi + 100) / 100 : 0), 2, '.', ''),
            'adventure_sports_single' => number_format((float) ($logic->adventure_sports_single ? ($logic->adventure_sports_single + 100) / 100 : 0), 2, '.', ''),
            'charge' => number_format((float) ($logic->charge ? $logic->charge : 0), 2, '.', ''),
        ];
        return Helper::jsonResponse(true, 'Logic', 200, $data);
    }
}
