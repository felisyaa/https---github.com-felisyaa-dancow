<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\materi1;
use Illuminate\Support\Facades\Storage;

class M1Controller extends Controller
{
    function index() {
        $result = materi1::get();
        return view('materi/index', ['title' => 'Materi 1', 'materis' => $result]);
    }

    function store() {
        $rules = [
            'image' => 'file|mimes:png,jpg,jpeg',
            'no' => 'required|numeric|unique:materi1s,no',
            'soal' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'benar' => 'required'
        ];
        

        $data = Request()->validate($rules);
        $data['image'] = (Request()->image) ? Request()->image->store('soal') : 'soal/default.png';

        $result = materi1::create($data);

        return redirect('/m1')->with('soalBerhasil', 'Soal Berhasil Ditambahkan.');
    }

    function delete() {
        materi1::where('id', Request()->input('id'))->delete();
        return redirect('/m1')->with('hapusBerhasil', 'Hapus Soal Berhasil.');
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

        materi1::where('id', Request()->input('id'))->update($data);

        return redirect('/m1')->with('ubahBerhasil', 'Soal Berhasil Diubah.');
    }
}
