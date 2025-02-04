<?php
namespace App\Http\Controllers\Api\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Broker;


class AffiliateController extends Controller
{
    public function getData($code)
    {
        $broker = Broker::where('slug', $code)->get();
        $data = [
            'pages' => $broker
        ];
        return Helper::jsonResponse(true, 'About Page', 200, $data);
    }

}