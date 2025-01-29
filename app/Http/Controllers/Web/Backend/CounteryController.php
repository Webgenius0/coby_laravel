<?php

namespace App\Http\Controllers\Web\Backend;

use App\Helpers\Helper;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class CounteryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Country::all();
            return DataTables::of($data)
                ->addIndexColumn()
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
        return view("backend.layouts.country.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.layouts.country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|unique:countries,name',
            'code' => 'required|string|unique:countries,code',
            'nationality' => 'required|string|max:50',
            'continent' => 'required|string|max:50'
        ]);

        try {

            Country::create($validate);

            session()->put('t-success', 'Country created successfully');
           
        } catch (Exception $e) {
            session()->put('t-error', $e->getMessage());
        }

        return redirect()->route('country.index')->with('success', 'Country created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country, $id)
    {
        $country = Country::findOrFail($id);
        return view('backend.layouts.country.edit', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country, $id)
    {
        $country = Country::findOrFail($id);
        return view('backend.layouts.country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required|string|unique:countries,name',
            'code' => 'required|string|unique:countries,code',
            'nationality' => 'required|string|max:50',
            'continent' => 'required|string|max:50'
        ]);

        try {
            $country = Country::findOrFail($id);

            $country->update($validate);
            session()->put('t-success', 'Country updated successfully');
        } catch (Exception $e) {
            session()->put('t-error', $e->getMessage());
        }

        return redirect()->route('country.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Country::findOrFail($id);
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
