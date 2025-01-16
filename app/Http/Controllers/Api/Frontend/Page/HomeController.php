<?php
namespace App\Http\Controllers\Api\Frontend\Page;

use App\Enums\PageEnum;
use App\Enums\SectionEnum;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;

class HomeController extends Controller{
    public function index()
    {
        //cms start
        $query = CMS::where('page', PageEnum::HOME)->where('status', 'active');
        $cms = [];
        foreach (SectionEnum::HomePage() as $key => $section) {
            $cms[$key] = (clone $query)->where('section', $key)->latest()->take($section['item'])->{$section['type']}();
        }
        //cms end
        $data = [
            'cms' => $cms
        ];
        return Helper::jsonResponse(true, 'Home Page', 200, $data);
    }
}