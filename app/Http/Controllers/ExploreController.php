<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Album;
use App\Models\Comment;
use App\Models\Likefoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExploreController extends Controller
{
    public function getdata(Request $request){
        if($request->cari !== 'null'){
            $explore = Foto::with(['likefoto'])->withCount(['likefoto', 'comments'])->where('judul_foto', 'like', '%'.$request->cari.'%')->orderBy('id', 'DESC')->paginate();
        }else{
            $explore = Foto::with(['likefoto'])->withCount(['likefoto', 'comments'])->orderBy('id', 'DESC')->paginate();
        }

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
        public function getdatadetail(Request $request, $id){
            $dataDetailFoto = Foto::with('user')->where('id', $id)->firstOrFail();
            return response()->JSON([
                'dataDetailFoto' => $dataDetailFoto,
                'dataUser' => auth()->user()->id,

            ], 200);
        }

        public function datafoto($id){
            $datafoto = Foto::find($id);
            // dd($data);
            return view('page.exploredetail', compact('datafoto'));

        }
        public function ambildatakomentar(Request $request, $id){
            $ambilkomentar = Comment::with('user')->where('id_foto', $id)->get();
            return response()->JSON([
                'data' => $ambilkomentar,
            ], 200);
        }
        public function kirimkomentar(Request $request){
            try {
                $request->validate([
                    'idfoto'=>'required',
                    'isi_komentar'=> 'required'
                ]);
                $dataStoreKomentar = [
                    'id_user' => auth()->user()->id,
                    'id_foto' =>$request->idfoto,
                    'isi_komentar' => $request->isi_komentar,
                ];
                Comment::create($dataStoreKomentar);
                return response()->JSON([
                    'data' => 'Data berhasil disimpan'
                ], 200);
            } catch (\Throwable $th) {
               return response()->JSON('Data komentar gagal di simpan', 500);
            }
        }
        public function uploadfoto(Request $request)
    {
        $datafoto = Foto::all();
        $albums = Album::where('id_user', Auth::user()->id)->get();
        return view('page.uploadfoto', compact('datafoto', 'albums'));
    }
    public function savefoto(Request $request)
{
    $filenya = $request->file('url');

    if ($request->hasFile('url')) {
        $filename = pathinfo($filenya, PATHINFO_FILENAME);
        $extensiFile = $filenya->getClientOriginalExtension();
        $url = 'asset' . time() . '_' . $extensiFile;
        $filenya->move('asset', $url);
    } else {
        $url = 'Default.jpg';
    }

    $dataSimpan = [
        'id_user' => auth()->user()->id,
        'judul_foto' => $request->judul_foto,
        'deskripsi_foto' => $request->deskripsi_foto,
        'url' => $url,
        'id_album' => $request->album
    ];

    Foto::create($dataSimpan);
    return redirect('/explore');
}


    //function edit postingan
    public function tampilkandata($id){
        $datafoto = Foto::find($id);
        $albums = Album::where('id_user', Auth::user()->id)->get();
        return view('page.tampildata', compact('datafoto', 'albums'));
    }

    public function updatedata(Request $request, $id){
        $datafoto = Foto::find($id);
        $datafoto->judul_foto = $request->judul_foto;
        $datafoto->deskripsi_foto = $request->deskripsi_foto;
        $datafoto->id_album = $request->album;
        $datafoto->save();
        // $albums = Album::where('id_user', Auth::user()->id)->get();
        return redirect()->back()->with('success', 'Edit Foto Berhasil Dilakukan');

    }
    public function delete($id){
        $datafoto = Foto::find($id);
        $datafoto->delete();
        return redirect('/explore')->with('success', 'Foto Berhasil Dihapus');
    }
}
