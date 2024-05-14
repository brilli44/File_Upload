<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload-tugas');

    }
    public function prosesFileUpload(Request $request)
    {
        $request->validate([
            'nama_foto'=>'required',
            'berkas'=>'required|file|image|max:500',
            ]);
            $extension = $request->berkas->getClientOriginalExtension();
            // $extFile = $request->berkas->getClientOriginalName();
            $namaFile = $request->nama_foto.'.'.$extension;
             $request->berkas->move('foto',$namaFile);
            // echo "Variabel path berisi $path <br>";
            $pathBaru = asset('foto/'.$namaFile);
            echo "Gambar berhasil di upload ke:<a href='$pathBaru'>$namaFile</a>";
            echo "<br>";
            echo "<img src='$pathBaru' alt='$namaFile' style='max-width: 500px;
            height: auto'>";
    }
}
