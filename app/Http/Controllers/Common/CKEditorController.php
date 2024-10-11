<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class CKEditorController extends Controller
{
    // CKEditor image upload
    public function imageUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . uniqid() . '.' . $extension;

            //Upload File
            // $request->file('upload')->move(public_path('ckeditor_images'), $filenametostore);

            Image::make($request->file('upload'))->save('ckeditor_images/' . $filenametostore, 50);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            // $url = asset('storage/uploads/' . $filenametostore);
            $url = asset('ckeditor_images/' . $filenametostore);
            $msg = "Image Uploaded Successful.";
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
