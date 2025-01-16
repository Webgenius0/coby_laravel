<?php
namespace App\Http\Controllers\Api\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Page;


class DynamicPageController extends Controller
{
    public function index()
    {
        $pages = Page::where('status', 'active')->get();
        $data = [
            'pages' => $pages
        ];
        return Helper::jsonResponse(true, 'About Page', 200, $data);
    }

    public function single($page_id = null)
    {
        $page = Page::find($page_id);

        if (!$page || $page->status !== 'active') {
            return Helper::jsonResponse(false, 'Page not found', 404);
        }

        $data = [
            'page' => $page
        ];
        return Helper::jsonResponse(true, 'Page details', 200, $data);
    }
}