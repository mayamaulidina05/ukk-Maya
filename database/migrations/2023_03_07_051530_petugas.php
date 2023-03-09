<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->integer('id_petugas');
            $table->integer('id_user');
            $table->string('nama_petugas',300);
            $table->string('username',300);
            $table->string('password',300);
            $table->string('telp',300);
            $table->enum('level',['admin', 'petugas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
        Schema::dropIfExists('tanggapan');  
    }
};
