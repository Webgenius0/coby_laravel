<?php

namespace App\Http\Controllers\Web\Backend\Settings;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Logic;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class LogicController extends Controller
{
    /**
     * Display the system settings page.
     *
     * @return View
     */
    public function index(): View
    {
        $logic = Logic::latest('id')->first();
        return view('backend.layouts.settings.logic_settings', compact('logic'));
    }

    /**
     * Update the system settings.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'multi_trip_standard'               => ['required', 'numeric', 'min:1'],
            'multi_trip_extended'               => ['required', 'numeric', 'min:1'],
            'cancellation_coverage_standard'    => ['required', 'numeric', 'min:1'],
            'cancellation_coverage_increased'   => ['required', 'numeric', 'min:1'],
            'winter_sprots'                     => ['required', 'numeric', 'min:1'],
            'adventure_sprots_multi'            => ['required', 'numeric', 'min:1'],
            'adventure_sprots_single'           => ['required', 'numeric', 'min:1'],
            'charge'                            => ['required', 'numeric', 'between:0,9999999.99'],
            'tax'                            => ['required', 'numeric', 'between:0,9999999.99'],
        ]);
        try {
            $logic = Logic::firstOrNew(['id' => 1]);
            $logic->fill($request->only([
                'multi_trip_standard',
                'multi_trip_extended',
                'cancellation_coverage_standard',
                'cancellation_coverage_increased',
                'winter_sprots',
                'adventure_sprots_multi',
                'adventure_sprots_single',
                'charge',
                'tax',
            ]));
            $logic->save();
            return back()->with('t-success', 'Updated successfully');
        } catch (Exception $e) {
            return back()->with('t-error', 'Failed to update' . $e->getMessage());
        }
    }
}

