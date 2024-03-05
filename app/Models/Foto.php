<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul_foto',
        'deskripsi_foto',
        'url',
        'id_user',
        'id_album',
    ];
    protected $table ='foto';
    //relasi nilai balik ke tabel user
    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function album(){
        return $this->belongsTo(Album::class, 'id_foto', 'id');
    }
    //relasi ke tabel likefoto
    public function likefoto(){
    return $this->hasMany(Likefoto::class, 'id_foto', 'id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'id_foto', 'id');
    }

}
