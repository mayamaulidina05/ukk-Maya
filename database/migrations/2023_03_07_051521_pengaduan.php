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
        Schema::create('pengaduan', function(Blueprint $table){
            $table->id();
            $table->date('tgl_pengaduan');
            $table->string('nik',16);
            $table->string('isi_laporan',300);
            $table->string('foto',300)->nullable();
            $table->enum('status',['0', 'proses','selesai']);
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
        Schema::dropIfExists('pengaduan'); 
    }
};
