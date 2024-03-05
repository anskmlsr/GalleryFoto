<?php

use App\Http\Controllers\AlbumController;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilemeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('page.halamanutama');
});

Route::post('/auth', [AuthController::class,'auth']);
Route::get('/register', [AuthController::class,'register']);
Route::post('/registered', [AuthController::class,'registered']);
Route::get('/login', [AuthController::class,'login'])->name('login');
Route::middleware('auth')->group(function () {

    Route::get('/explore', function (){
        return view('page.explore');
    });
    Route::get('/getDataExplore', [ExploreController::class, 'getdata']);
    Route::post('/likefotos', [ExploreController::class, 'likesfoto']);
    Route::get('/uploadfoto', [ExploreController::class, 'uploadfoto']);
    Route::post('/savefoto', [ExploreController::class, 'savefoto']);

    //route edit dan delete postingan
    Route::get('/exploredetail/{id}', [ExploreController::class,'datafoto']);
    Route::get('/exploredetail/tampilkandata/{id}', [ExploreController::class, 'tampilkandata']);
    Route::post('/updatedata/{id}', [ExploreController::class, 'updatedata']);
    Route::get('/exploredetail/delete/{id}', [ExploreController::class, 'delete']);
    //rote halaman detail
    Route::post('/exploredetail/kirimkomentar', [ExploreController::class,'kirimkomentar']);
    Route::get('/exploredetail/getComment/{id}', [ExploreController::class,'ambildatakomentar']);
    Route::get('/exploredetail/{id}/getdatadetail', [ExploreController::class,'getdatadetail']);

    //route profilesaya & edit profilesaya
    Route::get('/profile', function (){
        return view('page.profilesaya');
    });
    Route::get('/editprofile', function(){
        $data = auth()->user();
        return view('page.editprofile', compact('data'));
    });
    Route::post('/updateprofile/{id}', [ProfilemeController::class, 'updateprofile']);
    //route data halaman profilesaya
    Route::get('/profilee/getDataProfile/{id}', [ProfilemeController::class, 'getdataprofile']);
    Route::get('/getdataprofilesayaexplore', [ProfilemeController::class, 'getdata']);

    //route album
    Route::get('/profilealbum', [AlbumController::class, 'album']);
    Route::get('/isialbum/{id}', [AlbumController::class, 'isialbum']);
    Route::post('/tambahalbum', [AlbumController::class, 'tambahalbum']);
    
    Route::get('/changepassword', function (){
        return view('page.changepassword');
    });
    Route::post('/ubahpassword', [AuthController::class, 'ubahpassword']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

