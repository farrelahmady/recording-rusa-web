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
        Schema::table('rusa', function (Blueprint $table) {
            $table->foreign('id_pemilik')->references('id')->on('pemilik')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_penangkaran')->references('id')->on('penangkaran')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rusa', function (Blueprint $table) {
            $table->dropForeign(['id_pemilik']);
            $table->dropForeign(['id_penangkaran']);
        });
    }
};
