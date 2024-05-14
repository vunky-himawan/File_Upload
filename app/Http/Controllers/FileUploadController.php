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
        return "Pemrosesan file upload di sini";
    }
}