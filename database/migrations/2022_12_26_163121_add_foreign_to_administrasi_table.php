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
        Schema::table('administrasi', function (Blueprint $table) {
            $table->foreign('id_seksi_konservasi')->references('id')->on('seksi_konservasi')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_jenis_surat')->references('id')->on('jenis_surat')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_pemilik')->references('id')->on('pemilik')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_rusa')->references('id')->on('rusa')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('administrasi', function (Blueprint $table) {
            //
        });
    }
};
