<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index() {
        return view('user.index',['title' => 'Pengaturan Akun']);
    }

    public function updatePassword(User $user) {
        if(!Hash::check(Request()->passwordLama, $user->password)) {
            return redirect('/dashboard/user')->with('passwordSalah', 'Password Lama Salah!');
        }
        $data = Request()->validate([
            'passwordLama' => 'required',
            'password' => 'required|min:5|max:20',
            'password_confirmation' => 'required|same:password'
        ]);
        
        User::where('id', $user->id)->update(['password' => bcrypt($data['password'])]);
        return back()->with('passwordBerhasil', 'Ubah Password Berhasil.');
    }

    public function updateNumber(User $user) {
        Request()->validate(['number' => 'required|numeric|digits_between:11,12|unique:users']);
        User::where('id', $user->id)->update(['number' => Request()->number]);
        return redirect('/dashboard/user')->with('nomerBerhasil', 'Ubah Nomer Berhasil.');
    }

    public function updateFoto(User $user) {
        Request()->validate([
            'image' => 'required|file|max:1024|mimes:png,jpg,jpeg'
        ]);

        $foto = Request()->file('image')->store('foto-user');
        if($user->foto != 'foto-user/default.png') {
            Storage::delete($user->foto);
        }

        User::where('id', $user->id)->update(['foto' => $foto]);

        return redirect('dashboard/user')->with('fotoBerhasil', 'Foto Berhasil di Ubah.');
    }

    public function updateName(User $user) {
        $data = Request()->validate([
            'name' => 'required|min:4|max:30|alpha_spaces'
        ]);

        User::where('id', $user->id)->update(['name' => $data['name']]);

        return redirect('/dashboard/user')->with('namaBerhasil', 'Ubah Nama Berhasil.');
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);
        $result =User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        return $result;
    }
    public function login(Request $request){
        $credentials=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if (Auth::attempt($credentials)){
            $user=Auth::user();
            $token=md5(time()).'.'.md5($request->email);
            $user->forceFill([
                'api_token'=>$token
            ])->save();
            return response()->json([
                'token'=>$token
            ]);
        }
        return response()->json([
            'message'=>'The provided credentials do not match our records'
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->forceFill([
            'api_token'=>null,
        ])->save();
        return response()->json(['message'=>'success']);
    }
}
