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

        $extFile = $request->berkas->getClientOriginalName();
        $namaFile = 'web-' . time() . '.' . $extFile;
        $path = $request->berkas->storeAs('public', $namaFile);

        $pathBaru = asset('storage/' . $namaFile);
        echo "Proses upload berhasil, file berada di: $path";
        echo "<br>";
        echo "Tampilkan link: <a href='$pathBaru'>$pathBaru</a>";
    }
}