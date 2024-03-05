<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Likefoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilemeController extends Controller
{
    public function getdataprofile(Request $request){
        $dataUser = auth()->user();
        return response()->json([
            'dataUser' => $dataUser
        ], 200);
    }
    public function getdata(Request $request){
        $user = auth()->id();
        $explore = Foto::with(['likefoto'])->withCount(['likefoto', 'comments'])->where('id_user', $user)->orderBy('id', 'DESC')->paginate();
        return response()->JSON([
            'data' => $explore,
            'statuscode' => 200,
            'idUser' => auth()->user()->id
        ]);
    }
    public function likesfoto(Request $request){
        try {
            $request->validate([
                'idfoto' => 'required'
            ]);

            $existingLike = Likefoto::where('id_foto', $request->idfoto)->where('id_user', auth()->user()->id)->first();
            if(!$existingLike){
                $dataSimpan = [
                    'id_foto' => $request->idfoto,
                    'id_user' => auth()->user()->id,
                ];
                Likefoto::create($dataSimpan);
            }else{
                Likefoto::where('id_foto', $request->idfoto)->where('id_user', auth()->user()->id)->delete();
            }

            return response()->json('Data Berhasil Disimpan', 200);
            } catch (\Throwable $th){
            return response()->json('Something went wrong', 500);
            }
        }
        public function tampilprofile($id){
            $data = User::find($id);
            // dd($data);
            return view('page.editprofile', compact('data'));

        }
        public function updateprofile(Request $request, $id){
            $profil = Auth::user();
            $filenya = $request->file('picture');

        if ($request->hasFile('picture')) {
            $filename = pathinfo($filenya, PATHINFO_FILENAME);
            $extensiFile = $filenya->getClientOriginalExtension();
            $picture = 'asset' . time() . '_' . $extensiFile;
            $filenya->move('asset', $picture);
        } else {
            $picture = 'Default.jpg';
        }
        $profil->update([
            'email' => $request->email,
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'picture' => $picture,

        ]);
        return redirect('/profile')->with('success', 'Edit Profile Berhasil Dilakukan');


}
}
