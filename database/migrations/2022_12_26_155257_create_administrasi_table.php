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
        Schema::create('administrasi', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->uuid('id_seksi_konservasi');
            $table->string('nomor_surat', 50);
            $table->bigInteger('id_jenis_surat');
            $table->string('judul', 50);
            $table->text('deskripsi');
            $table->text('file');
            $table->uuid('id_pemilik');
            $table->uuid('id_rusa');
            $table->enum('status', [1, 2, 3, 4, 5]);
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
        Schema::dropIfExists('administrasi');
    }
};
