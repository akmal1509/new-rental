<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

trait HasImage
{
    public function imageData($data)
    {
        return str_replace("/vendor/ckfinder/userfiles/", "", $data);
    }
}
