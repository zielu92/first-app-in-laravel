<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    //

    protected $upload = '/images/';

    protected $fillable = ['file'];

    /**
     * @param $photo
     * @return string
     */
    public function getFileAttribute($photo) {
        return $this->upload . $photo;
    }

    /**
     * Uploading photo to server and update in DB
     * @param $file
     * @param $newName
     */
    public function photoUpload($file, $newName){

            $name = uniqid($newName) . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

            return $input['photo_id'];

    }
}
