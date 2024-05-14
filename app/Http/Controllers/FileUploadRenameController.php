<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class FileUploadRenameController extends Controller
{
    public function fileUploadRename(): Response
    {
        return response()->view('file-upload-rename');
    }

    public function prosesFileUploadRename(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'berkas' => 'required|file|image|max:2048',
            'file-name' => 'string|max:255|nullable',
        ], [
            'berkas.required' => 'File harus diisi',
            'berkas.file' => 'File harus berupa gambar',
            'berkas.image' => 'File harus berupa gambar',
            'berkas.max' => 'File tidak boleh lebih dari 10 MB',
            'file-name.string' => 'File name harus berupa string',
            'file-name.max' => 'File name tidak boleh lebih dari 255 karakter',
        ]);

        if ($validator->fails()) {
            return redirect('/file-upload-rename')->withErrors($validator)->withInput();
        }

        if ($request->hasFile('berkas')) {
            $fileName = '';
            if ($request['file-name'] == null) {
                $fileName = $request->berkas->store('public');
                $fileName = basename($fileName);
            } else {
                $fileName = $request->berkas->storeAs('public', $request['file-name'] . '.' . $request->berkas->getClientOriginalExtension());
                $fileName = basename($fileName);
            }

            $url = asset('storage/' . $fileName);
            echo "Gambar berhasil diupload ke: <a href='$url'>$fileName</a>";
            echo "<br><img src='$url'>";
        }
    }
}
