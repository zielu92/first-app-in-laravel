<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminMediasController extends Controller
{
    //

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('admin.media.index', [
            'photos' => Photo::paginate(10)
            ]
        );
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {

        return view('admin.media.create');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){

        $photo = new Photo;

        if($file = $request->file('file')){
            $photo->photoUpload($request->file('file'), 'media_');
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        $photo = Photo::findOrFail($id);

        if(!empty($photo->file)) unlink(public_path() . $photo->file);

        $photo->delete();

        return redirect('/admin/media');
    }
}
