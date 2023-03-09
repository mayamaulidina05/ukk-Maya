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
        Schema::create('masyarakat', function (Blueprint $table) {
            $table->integer('id_user');
            $table->char('nik', 16)->autoIncrement();
            $table->string('nama',300);
            $table->string('username',300);
            $table->string('password',300);
            $table->string('telp',300);
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
        Schema::dropIfExists('masyarakat'); 
    }
};
