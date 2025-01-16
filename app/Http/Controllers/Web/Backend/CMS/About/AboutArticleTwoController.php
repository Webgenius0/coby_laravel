<?php

namespace App\Http\Controllers\Web\Backend\CMS\About;

use App\Enums\PageEnum;
use App\Enums\SectionEnum;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Exception;
use Illuminate\Http\Request;

class AboutArticleTwoController extends Controller
{

    public function index()
    {
        $articletwo = CMS::where('page', PageEnum::ABOUT->value)->where('section', SectionEnum::ABOUT_ARTICLE_TWO->value)->first();
        return view('backend.layouts.cms.about.articletwo', compact('articletwo'));
    }
    public function update(Request $request)
    {
        $validatedData = request()->validate([
            'title'         => 'required|string|max:250',
            'description'   => 'required|string',
            'image'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        try {
            $validatedData['page'] = PageEnum::ABOUT->value;
            $validatedData['section'] = SectionEnum::ABOUT_ARTICLE_TWO->value;

            if ($request->hasFile('image')) {
                $validatedData['image'] = Helper::fileUpload($request->file('image'), 'cms', time() . '_' . getFileName($request->file('image')));
            }

            if (CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->exists()) {
                CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->update($validatedData);
            } else {
                CMS::create($validatedData);
            }

            return redirect()->route('cms.about.articletwo')->with('t-success', 'Updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }
}
