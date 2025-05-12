<?php

namespace App\Traits;

use App\Models\Doctor;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

trait UploadFilesTrait
{
    // store Image function
    public function storeImage(Request $request, $inputName, $imageable_id, $imageable_type, $folderName)
    {

        if ($request->hasFile($inputName)) {

            $file = $request->file($inputName);
            $fileName = time() . $file->getClientOriginalName();
            $location = public_path('Dashboard/img/' . $folderName);
            $file->move($location, $fileName);
        } else {
            $fileName = 'user.jpg';
        }

        // insert to database => (Images table) :
        $image = new Image();
        $image->create([
            'fileName' => $fileName,
            'imageable_id' => $imageable_id,
            'imageable_type' => $imageable_type,
        ]);
    }

    // update Image function
    public function updateImage(Request $request, $inputName, $imageable_id, $imageable_type, $folderName)
    {

        $image = Image::where('imageable_id', $imageable_id)->where('imageable_type',$imageable_type)->get()->first();
        $imageName = $image->fileName;

        $file = $request->file($inputName);
        if ($file != null) {
            $fileName = time() . $file->getClientOriginalName();
            $location = public_path('Dashboard/img/' . $folderName);
            $file->move($location, $fileName);
            $oldImage = public_path('Dashboard/img/' . $folderName . '/' . $imageName);
            if ($imageName != 'user.jpg') {
                unlink($oldImage);
            }
        } else {
            $fileName = $imageName;
        }

        $image->update([
            'fileName' => $fileName,
            'imageable_id' => $imageable_id,
            'imageable_type' => $imageable_type,
        ]);
    }

    // Delete Image function
    public function deleteImage($imageable_id, $folderName,$imageable_type)
    {
        $images = Image::where('imageable_id', $imageable_id)->where('imageable_type',$imageable_type)->get();
        foreach ($images as $image) {
            $imageName = $image->fileName;

            $imagePath = public_path('Dashboard/img/' . $folderName . '/' . $imageName);
            if ($imageName != 'user.jpg') {
                unlink($imagePath);
            }
            $image->delete();
        }
    }


    // store Multiple Image function
    public function storeMultipleImage(Request $request, $inputName, $imageable_id, $imageable_type, $folderName)
    {
        if ($request->hasFile($inputName)) {

            $files = $request->file($inputName);
            foreach ($files as $file) {
                $fileName = time() . $file->getClientOriginalName();
                $location = public_path('Dashboard/img/' . $folderName);
                $file->move($location, $fileName);

                // insert to database => (Images table) :
                $image = new Image();
                $image->create([
                    'fileName' => $fileName,
                    'imageable_id' => $imageable_id,
                    'imageable_type' => $imageable_type,
                ]);
            }
        }
    }
}
