<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\materi3;
use Illuminate\Support\Facades\Storage;

class M3Controller extends Controller
{
    function index() {
        $result = materi3::get();
        return view('materi3/index', ['title' => 'Materi 3', 'materis' => $result]);
    }

    function store() {
        $rules = [
            'image' => 'file|mimes:png,jpg,jpeg',
            'no' => 'required|numeric|unique:materi3s,no',
            'soal' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'benar' => 'required'
        ];
        

        $data = Request()->validate($rules);
        $data['image'] = (Request()->image) ? Request()->image->store('soal') : 'soal/default.png';

        $result = materi3::create($data);

        return redirect('/m3')->with('soalBerhasil', 'Soal Berhasil Ditambahkan.');
    }

    function delete() {
        materi3::where('id', Request()->input('id'))->delete();
        return redirect('/m3')->with('hapusBerhasil', 'Hapus Soal Berhasil.');
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

        materi3::where('id', Request()->input('id'))->update($data);

        return redirect('/m3')->with('ubahBerhasil', 'Soal Berhasil Diubah.');
    }
}
