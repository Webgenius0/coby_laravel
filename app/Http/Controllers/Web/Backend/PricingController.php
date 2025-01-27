<?php

namespace App\Http\Controllers\Web\Backend;

use App\Helpers\Helper;
use App\Models\Pricing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pricing::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('is_annual', function ($data) {
                    return $data->is_annual ? 'Multi' : 'single';
                })
                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

                                <a href="#" type="button" onclick="goToEdit(' . $data->id . ')" class="btn btn-primary fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-edit"></i>
                                </a>

                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>

                            </div>';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view("backend.layouts.pricing.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.layouts.pricing.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'is_annual' => 'required|boolean',
            'destination' => 'required|in:ex_usa,europe,worldwide',
            'max_duration' => 'required|in:0,7,10,18,24,30',
            'age_group' => 'required|in:49,50-59,60-64,65-69,70-74,80-84',
            'party_type' => 'required|in:individual,couple,family',
            'base_premium' => 'required|numeric|min:1',
        ]);

        try {

            Pricing::create($validate);

            session()->put('t-success', 'Pricing created successfully');
           
        } catch (Exception $e) {
            session()->put('t-error', $e->getMessage());
        }

        return redirect()->route('pricing.index')->with('success', 'Pricing created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pricing $pricing, $id)
    {
        $pricing = Pricing::findOrFail($id);
        return view('backend.layouts.pricing.edit', compact('pricing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pricing $pricing, $id)
    {
        $pricing = Pricing::findOrFail($id);
        return view('backend.layouts.pricing.edit', compact('pricing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'is_annual' => 'required|boolean',
            'destination' => 'required|in:ex_usa,europe,worldwide',
            'max_duration' => 'required|in:0,7,10,18,24,30',
            'age_group' => 'required|in:49,50-59,60-64,65-69,70-74,80-84',
            'party_type' => 'required|in:individual,couple,family',
            'base_premium' => 'required|numeric|min:1',
        ]);

        try {
            $pricing = Pricing::findOrFail($id);

            $pricing->update($validate);
            session()->put('t-success', 'Pricing updated successfully');
        } catch (Exception $e) {
            session()->put('t-error', $e->getMessage());
        }

        return redirect()->route('pricing.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Pricing::findOrFail($id);
            if ($data->image && file_exists(public_path($data->image))) {
                Helper::fileDelete(public_path($data->image));
            }
            $data->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Your action was successful!'
            ]);
            
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Your action was successful!'
            ]);
        }
    }

}
