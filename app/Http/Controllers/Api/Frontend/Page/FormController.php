<?php

namespace App\Http\Controllers\Api\Frontend\Page;

use App\Enums\PageEnum;
use App\Enums\SectionEnum;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\CMS;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        //cms start
        $query = CMS::where('page', PageEnum::FORM)->where('status', 'active');
        $cms = [];
        foreach (SectionEnum::FormPage() as $key => $section) {
            $cms[$key] = (clone $query)->where('section', $key)->latest()->take($section['item'])->{$section['type']}();
        }
        //cms end
        foreach ($cms['form_pdf'] as $key => $value) {
            $pdf = json_decode($value->metadata, true);
            $pdf['pdf'] = asset($pdf['pdf']);
            $value->metadata = json_encode($pdf);
            $cms['form_pdf'][$key] = $value;
        }

        $data = [
            'cms' => $cms
        ];
        return Helper::jsonResponse(true, 'Home Page', 200, $data);
    }
}
