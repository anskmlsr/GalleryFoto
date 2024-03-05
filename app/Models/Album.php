<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_album',
        'foto_sampul',
        'id_user',
    ];
    protected $table ='album';
    public function fotos (){
        return $this->hasMany(Foto::class, 'id_album', 'id');
    }
}
