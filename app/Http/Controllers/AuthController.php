<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request){
        return view('page.register');
    }
    public function registered(Request $request){
        $request->validate([
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:6',
            'tanggal_lahir' => 'required',
            'picture' => 'required',
        ]);
        $filenya = $request->file('picture');

        if ($request->hasFile('picture')) {
            $filename = pathinfo($filenya, PATHINFO_FILENAME);
            $extensiFile = $filenya->getClientOriginalExtension();
            $picture = 'asset' . time() . '_' . $extensiFile;
            $filenya->move('asset', $picture);
        } else {
            $picture = 'Default.jpg';
        }
        $dataStore = [
            'email' => $request->email,
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
            'tanggal_lahir' => $request->tanggal_lahir,
            'picture' => $picture,

        ];
        User::create($dataStore);
        return redirect('/register')->with('success', 'Registrasi Berhasil Dilakukan');
    }
    public function login(Request $request){
        return view('page.login');
    }
    public function auth(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $request->session()->regenerate();
                return redirect('/explore');
            } else {
                return redirect()->back()->with('error', 'Email atau Password Salah');
            }
       }
       public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }

    public function ubahpassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|min:6'
        ]);
        $user = Auth::user();
        //periksa kecocokan password
        if (Hash::check($request->password, $user->password)) {
            $user->update([ 'password' => Hash::make($request->new_password)]);
            return redirect('/changepassword')->with('success', 'Ubah Password Berhasil Dilakukan');;
        } else {
            return redirect()->back()->with('error', 'Password Lama Salah, Silahkan Cek Kembali');
        }
    }

}
