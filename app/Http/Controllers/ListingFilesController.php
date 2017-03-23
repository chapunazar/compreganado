<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingFilesController extends Controller
{
    public function showFile($filename)
    {
        $path = storage_path("app/files/".$filename);
        if (file_exists($path)) { 
            $img = \Image::make($path)->resize(400, null,function ($constraint) {
			    $constraint->aspectRatio();
				});

            return $img->response();
        }else{
            return redirect()->home();
        }
        /*
        $file = Storage::get($file);

        return response($file, 200);*/
    }
}
