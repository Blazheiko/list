<?php


namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UploadPhotoController extends Controller
{

    public function __invoke (Request $request){
        //dd($request);

        // Handle the user upload of avatar
        if($request->hasFile('photo')){
            //echo ' in function update_avatar';

            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(300, 300)->save( public_path('/uploads/photos/' . $filename  ) );

            $user = Auth::user();

            $message = $user->messages()->create([
                'message' => '','photo_url'=> $filename,'is_photo'=>true
            ]);
            $user->save();

            broadcast(new MessageSent($user, $message))->toOthers();


        return ['user'=>$user,'message'=> $message];
        }
        return ['status' => 'Photo not!!!!'];

    }
//    public function UploadPhoto()
//    {
//        echo " в контроллере" ;
//        $file = request('photo');
//        $path = $file->hashName('profiles');
//
//        $disk = Storage::disk('public');
//
//        $disk->put(
//            $path, $this->formatImage($file)
//        );
//
//        $photo = request()->user()->photos()->create([
//            'photo_url' => $disk->url($path),
//        ]);
//
//        broadcast(new NewPhoto($photo))->toOthers();
//
//        return $photo->load('user');
//    }
}

