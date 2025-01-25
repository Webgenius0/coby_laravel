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
        return Helper::jsonResponse(true, 'Logic', 200, $logic);
    }
}
