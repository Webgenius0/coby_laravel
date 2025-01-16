<?php

namespace App\Http\Controllers\Web\Backend\CMS\Home;

use App\Enums\PageEnum;
use App\Enums\SectionEnum;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Exception;
use Illuminate\Http\Request;

class HomeQouteController extends Controller
{

    public function index()
    {
        $qoute = CMS::where('page', PageEnum::HOME->value)->where('section', SectionEnum::HOME_QOUTE->value)->first();
        return view('backend.layouts.cms.home.qoute', compact('qoute'));
    }
    public function update(Request $request)
    {
        $validatedData = request()->validate([
            'title'         => 'required|string|max:250',
            'description'   => 'required|string',
            'btn_text'      => 'required|string|max:100',
            'btn_link'      => 'required|string|max:100',
        ]);
        
        try {
            $validatedData['page'] = PageEnum::HOME->value;
            $validatedData['section'] = SectionEnum::HOME_QOUTE->value;

            if (CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->exists()) {
                CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->update($validatedData);
            } else {
                CMS::create($validatedData);
            }

            return redirect()->route('cms.home.qoute')->with('t-success', 'Updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }
}
