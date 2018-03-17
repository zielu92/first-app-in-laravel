<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    //

    protected $upload = '/images/';

    protected $fillable = ['file'];

    public function getFileAttribute($photo) {
        return $this->upload . $photo;
    }

//    public function deletePhoto() {
//
//        Storage::delete($this->upload.$this->file);
//        $this->delete();
//    }
}
