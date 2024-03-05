<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
   public function album(Request $request){
    $user = auth()->user();
    // $data = Album::all();
    // $dataalbum = Album::where('id', $id)->first();
    $albums = Album::where('id_user', Auth::user()->id)->get();
    return view('page.profilealbum', compact('user', 'albums'));
}
    public function tambahalbum(Request $request){
        $dataSimpan = [
            'id_user' => auth()->user()->id,
            'nama_album' => $request->nama_album,
            'foto_sampul' => $request->foto_sampul,
        ];
        Album::create($dataSimpan);
        return redirect('/profilealbum')->with('success', 'Album Berhasil Ditambahkan');
    }
    public function isialbum($id)
    {
        $user = auth()->user();
        $fotos = Foto::where('id_album', $id)->where('id_user', Auth::user()->id)->get();
        $album = Album::where('id', $id)->first();
        // $albums = Album::with(['fotos'])->paginate();
        return view('page.isialbum', compact('fotos', 'album', 'user'));
    }

}
