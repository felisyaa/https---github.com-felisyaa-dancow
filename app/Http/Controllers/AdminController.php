<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.index', ['title' => 'Admin', 'users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create', ['title' => 'Buat User Baru']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:4|max:30|alpha_spaces',
            'username' => 'required|min:6|max:12|unique:users|alpha_num',
            'authorization' => 'required|max:3',
            'email' => 'nullable|email|unique:users',
            'number' => 'nullable|numeric|digits_between:11,12|unique:users',
            'password' => 'required|min:5|max:20'
        ];

        $rules['foto'] = (Request()->image) ? 'file|max:1024|mimes:png,jpg,jpeg' : '';

        $data = Request()->validate($rules);
        $data['foto'] = (Request()->image) ? Request()->image->store('foto-user') : 'foto-user/default.png';
        $data['password'] = bcrypt($data['password']);

        User::create($data);
        
        return redirect('/dashboard/admin')->with('buatBerhasil', 'Buat User Baru Berhasil.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        return view('admin.edit', [
            'title' => 'Edit User',
            'user' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $admin)
    {
        $rules = [
            'name' => 'required|min:4|max:30|alpha_spaces',
            'username' => 'required|min:6|max:12|unique:users|alpha_num',
            'authorization' => 'required|max:3',
        ];

        $rules['username'] = (Request()->username == $admin->username) ? 'min:6|max:12|alpha_num' : 'required|min:6|max:12|unique:users|alpha_num';
        $rules['email'] = (Request()->email) ? 'email' : '';
        $rules['number'] = (Request()->number) ? 'numeric|digits_between:11,12' : '';
        $rules['password'] = (Request()->password)  ? 'min:5|max:20' : '';
        $rules['foto'] = (Request()->foto) ? 'file|max:1024|mimes:png,jpg,jpeg' : '';
        $data = Request()->validate($rules);
        $data['password'] = (Request()->password) ? bcrypt($data['password']) : $admin->password;
        if(Request()->foto) {
            $data['foto'] = Request()->foto->store('foto-user');
            if($admin->foto != 'foto-user/default.png') {
                Storage::delete($admin->foto);
            }
        }
        User::where('id', $admin->id)->update($data);
        return redirect('/dashboard/admin')->with('ubahBerhasil', 'Ubah User Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        if($admin->foto != 'foto-user/default.png') {
            Storage::delete($admin->foto);
        }   
        User::destroy($admin->id);
        return redirect('/dashboard/admin')->with('hapusBerhasil', 'Hapus User Berhasil.');
    }
}
