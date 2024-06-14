<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\PhotoMedia;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    use MediaUploadingTrait;
    
    public function index()
    {
        $media = PhotoMedia::all();
        return view('admin.media.index',compact('media'));
    }

    public function show()
    {

    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $media = PhotoMedia::create($request->all());
        if ($request->input('photo', false)) {
            $media->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }
        toastr()->success('Photo Media Created Successfully', 'Success!');
        return redirect()->route('admin.media.index')->with('message', 'Seller Type Create Success!');
    }
}
