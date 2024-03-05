<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('foto', function(Blueprint $table){
          $table->id();
          $table->string('judul_foto');
          $table->string('deskripsi_foto');
          $table->string('url');
          $table->unsignedBigInteger('id_user');
          $table->unsignedBigInteger('id_album')->nullable();
          $table->timestamps() ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto');
    }
};
