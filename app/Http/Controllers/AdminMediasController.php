<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminMediasController extends Controller
{
    //

    public function index() {
        $photos = Photo::all();
        return view('admin.media.index', compact('photos'));
    }

    public function create() {

        return view('admin.media.create');
    }

    public function store(Request $request){

        $photo = new Photo;

        if($file = $request->file('file')){
            $photo->photoUpload($request->file('file'), 'media_');
        }

    }

    public function destroy($id) {
        $photo = Photo::findOrFail($id);

        if(!empty($photo->file)) unlink(public_path() . $photo->file);

        $photo->delete();

        return redirect('/admin/media');
    }
}
