<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likefoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_foto',
    ];
    protected $table = 'likefoto';

    //relasi nilai balik
    public function foto(){
        return $this->belongsTo(Foto::class, 'id_foto', 'id');
    }
}
