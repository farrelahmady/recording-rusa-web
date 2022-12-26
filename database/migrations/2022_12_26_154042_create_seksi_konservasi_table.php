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
        Schema::create('seksi_konservasi', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nama_depan_ketua', 50);
            $table->string('nama_belakang_ketua', 50)->nullable();
            $table->integer('wilayah');
            $table->string('no_telp', 15);
            $table->text('alamat');
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
        Schema::dropIfExists('seksi_konservasi');
    }
};
