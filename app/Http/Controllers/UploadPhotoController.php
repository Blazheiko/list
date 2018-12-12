<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadPhotoController extends Controller
{
    public function __invoke()
    {
        $file = request('photo');
        $path = $file->hashName('profiles');

        $disk = Storage::disk('public');

        $disk->put(
            $path, $this->formatImage($file)
        );

        $photo = request()->user()->photos()->create([
            'photo_url' => $disk->url($path),
        ]);

        broadcast(new NewPhoto($photo))->toOthers();

        return $photo->load('user');
    }
}

