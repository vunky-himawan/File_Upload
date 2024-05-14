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
        $request->validate([
            'berkas' => 'required|file|image|max:500'
        ]);
        // $path = $request->berkas->store('uploads');
        // $path = $request->berkas->storeAs('uploads', 'berkas');
        // $namaFile = $request->berkas->getClientOriginalName();
        // $path = $request->berkas->storeAs('uploads', $namaFile);
        $extFile = $request->berkas->getClientOriginalName();
        $namaFile = 'web-' . time() . '.' . $extFile;
        $path = $request->berkas->storeAs('uploads', $namaFile);
        echo "Proses upload berhasil, file berada di: $path";
    }
}