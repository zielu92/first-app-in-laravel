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
     * @return $photo_id
     */
    public function photoUpload($file, $newName){

            $name = uniqid($newName) . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

            return $input['photo_id'];

    }

    /**
     * returning if the picture is used for user or for post or else
     * @return string
     */
    public function photoSource() {
        $result = explode('/images/',$this->file);
        $result = explode('_',$result[1]);
        if(empty($result[0])) $result[0] = 'none';
        return $result[0];
    }

    public function photoPlaceholder() {
        return "http://placehold.it/500";
    }
}
