<?php

namespace App\Http\Controllers\Web\Backend\CMS;

use App\Http\Controllers\Controller;
use App\Enums\PageEnum;
use App\Enums\SectionEnum;
use App\Helpers\Helper;
use App\Models\CMS;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FormPageControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CMS::where('page', PageEnum::FORM)->where('section', SectionEnum::FORM_PDF)->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('pdf', function ($data) {
                    if (isset($data->metadata) && !empty(json_decode($data->metadata)->pdf)) {
                        return "<a href='" . asset(json_decode($data->metadata)->pdf) . "' target='_blank'>View</a>";
                    }
                    return '';
                })
                ->addColumn('status', function ($data) {
                    $backgroundColor = $data->status == "active" ? '#4CAF50' : '#ccc';
                    $sliderTranslateX = $data->status == "active" ? '26px' : '2px';
                    $sliderStyles = "position: absolute; top: 2px; left: 2px; width: 20px; height: 20px; background-color: white; border-radius: 50%; transition: transform 0.3s ease; transform: translateX($sliderTranslateX);";

                    $status = '<div class="form-check form-switch" style="margin-left:40px; position: relative; width: 50px; height: 24px; background-color: ' . $backgroundColor . '; border-radius: 12px; transition: background-color 0.3s ease; cursor: pointer;">';
                    $status .= '<input onclick="showStatusChangeAlert(' . $data->id . ')" type="checkbox" class="form-check-input" id="customSwitch' . $data->id . '" getAreaid="' . $data->id . '" name="status" style="position: absolute; width: 100%; height: 100%; opacity: 0; z-index: 2; cursor: pointer;">';
                    $status .= '<span style="' . $sliderStyles . '"></span>';
                    $status .= '<label for="customSwitch' . $data->id . '" class="form-check-label" style="margin-left: 10px;"></label>';
                    $status .= '</div>';

                    return $status;
                })
                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="' . route('cms.form.pdf.edit', ['id' => $data->id]) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                    <i class="fe fe-edit"></i>
                                </a>

                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['pdf', 'status', 'action'])
                ->make();
        }

        return view("backend.layouts.cms.form.pdf.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.layouts.cms.form.pdf.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'pdf' => 'required|mimes:pdf|max:2048',
        ]);

        try {
            // Add the page and section to validated data
            $validatedData['page'] = PageEnum::FORM->value;
            $validatedData['section'] = SectionEnum::FORM_PDF->value;

            $counting = CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->count(); 
            
            if ($counting >= 4) {
                return redirect()->back()->with('t-error', 'Maximum 3 Item You Can Add');
            }

            if ($request->hasFile('pdf')) {
                $validatedData['pdf'] = Helper::fileUpload($request->file('pdf'), 'pdf', time() . '_' . getFileName($request->file('pdf')));
            }

            // Create or update the CMS entry
            $metadata = json_encode(['pdf' => $validatedData['pdf']]);
            $validatedData['metadata'] = $metadata;
            unset($validatedData['pdf']);

            // Create or update the CMS entry
            CMS::create($validatedData);

            return redirect()->route('cms.form.pdf.index')->with('t-success', 'Created successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pdf = CMS::findOrFail($id);
        return view("backend.layouts.cms.form.pdf.update", compact("pdf"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pdf = CMS::findOrFail($id);
        return view("backend.layouts.cms.form.pdf.update", compact("pdf"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'pdf' => 'required|mimes:pdf|max:2048',
        ]);

        try {
            // Find the existing CMS record by ID
            $Review = CMS::findOrFail($id);

            // Update the page and section if necessary
            $validatedData['page'] = PageEnum::FORM->value;
            $validatedData['section'] = SectionEnum::FORM_PDF->value;

            // Check if an image is being uploaded
            if ($request->hasFile('pdf')) {
                // Check if there is an existing image, and delete it if so
                if (isset($Review->metadata) && !empty(json_decode($Review->metadata)->pdf) && file_exists(public_path(json_decode($Review->metadata)->pdf))) {
                    Helper::fileDelete(public_path(json_decode($Review->metadata)->pdf));
                }
                // Upload the new image
                $validatedData['pdf'] = Helper::fileUpload($request->file('pdf'), 'pdf', time() . '_' . getFileName($request->file('pdf')));
            }

            // Update the meta data
            $meta = json_decode($Review->metadata);
            $meta->rating = $validatedData['pdf'];
            $validatedData['metadata'] = json_encode($meta);
            unset($validatedData['pdf']);

            // Update the CMS entry with the validated data
            $Review->update($validatedData);
            return redirect()->route('cms.form.pdf.index')->with('t-success', 'Updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Find the CMS entry by ID
            $data = CMS::findOrFail($id);

            // Check if there is an image associated with this CMS entry
            if ($data->image && file_exists(public_path($data->image))) {
                // Delete the image file from the server
                Helper::fileDelete(public_path($data->image));
            }

            // Delete the CMS entry
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'Deleted successfully.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete.',
            ]);
        }
    }

    public function status(int $id): JsonResponse
    {
        // Find the CMS entry by ID
        $data = CMS::findOrFail($id);

        // Check if the record was found
        if (!$data) {
            return response()->json([
                "success" => false,
                "message" => "Item not found.",
                "data" => $data,
            ]);
        }

        // Toggle the status
        $data->status = $data->status === 'active' ? 'inactive' : 'active';

        // Save the changes
        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'Item status changed successfully.',
            'data'    => $data,
        ]);
    }

}
