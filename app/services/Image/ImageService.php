<?php

namespace App\Services\Image;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use test;

class ImageService
{
    public static function upload_image(UploadedFile $image,$type): string
    {
        return $image->store($type, 'public');
    }

    public static function default()
    {
        // return 'profile/default.jpg';
    }
}


