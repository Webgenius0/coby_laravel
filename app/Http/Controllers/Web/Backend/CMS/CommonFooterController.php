<?php

namespace App\Http\Controllers\Web\Backend\CMS;

use App\Enums\PageEnum;
use App\Enums\SectionEnum;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Exception;
use Illuminate\Http\Request;

class CommonFooterController extends Controller
{

    public function index()
    {
        $footer = CMS::where('page', PageEnum::COMMON->value)->where('section', SectionEnum::FOOTER->value)->first();
        return view('backend.layouts.cms.footer', compact('footer'));
    }
    public function update(Request $request)
    {
        $validatedData = request()->validate([
            'copyright'         => 'required|string|max:250',
            'description'   => 'required|string'
        ]);
        
        try {
            $validatedData['page'] = PageEnum::COMMON->value;
            $validatedData['section'] = SectionEnum::FOOTER->value;

            $validatedData['metadata'] = json_encode(['copyright' => $validatedData['copyright']]);
            unset($validatedData['copyright']);

            if (CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->exists()) {
                CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->update($validatedData);
            } else {
                CMS::create($validatedData);
            }

            return redirect()->route('cms.common.footer.index')->with('t-success', 'Updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }
}
