<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FileUploadController extends Controller
{
    public function fileUpload(): Response
    {
        return response()->view('file-upload');
    }

    public function prosesFileUpload(Request $request)
    {
        // dump($request->berkas);
        if ($request->hasFile('berkas')) {
            echo "path() = " . $request->file('berkas')->path();
            echo "<br>";
            echo "extension() = " . $request->file('berkas')->extension();
            echo "<br>";
            echo "getClientOriginalExtension() = " . $request->file('berkas')->getClientOriginalExtension();
            echo "<br>";
            echo "getMimeType() = " . $request->file('berkas')->getMimeType();
            echo "<br>";
            echo "getClientOriginalName() = " . $request->file('berkas')->getClientOriginalName();
            echo "<br>";
            echo "getSize() = " . $request->file('berkas')->getSize();
        } else {
            echo "Tidak ada berkas yang diupload";
        }
    }
}