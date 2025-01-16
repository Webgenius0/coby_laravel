<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Contact::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="#" type="button" onclick="goToOpen(' . $data->id . ')" class="btn btn-primary fs-14 text-white delete-icn" title="Open">
                                    <i class="fe fe-eye"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view("backend.layouts.contact.index");
    }

    public function single($id)
    {
        try {
            $contact = Contact::find($id);
            return view('backend.layouts.contact.single', compact('contact'));
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }
}
