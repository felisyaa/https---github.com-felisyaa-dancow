<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\materi2;
use Illuminate\Support\Facades\Storage;

class M2Controller extends Controller
{
    function index() {
        $result = materi2::get();
        return view('materi2/index', ['title' => 'Materi 2', 'materis' => $result]);
    }

    function store() {
        $rules = [
            'image' => 'file|mimes:png,jpg,jpeg',
            'no' => 'required|numeric|unique:materi2s,no',
            'soal' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'benar' => 'required'
        ];
        

        $data = Request()->validate($rules);
        $data['image'] = (Request()->image) ? Request()->image->store('soal') : 'soal/default.png';

        $result = materi2::create($data);

        return redirect('/m2')->with('soalBerhasil', 'Soal Berhasil Ditambahkan.');
    }

    function delete() {
        materi2::where('id', Request()->input('id'))->delete();
        return redirect('/m2')->with('hapusBerhasil', 'Hapus Soal Berhasil.');
    }

    function update() {

        $rules = [
            'image' => 'file|mimes:png,jpg,jpeg',
            'no' => 'required|numeric',
            'soal' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'benar' => 'required'
        ];

        $data = Request()->validate($rules);

        if(Request()->image) {
            Storage::delete(Request()->image);
        }
        
        $data['image'] = (Request()->image) ? Request()->image->store('soal') : 'soal/default.png';

        materi2::where('id', Request()->input('id'))->update($data);

        return redirect('/m2')->with('ubahBerhasil', 'Soal Berhasil Diubah.');
    }
}
