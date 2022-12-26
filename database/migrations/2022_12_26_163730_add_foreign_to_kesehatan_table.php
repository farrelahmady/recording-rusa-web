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
        Schema::table('kesehatan', function (Blueprint $table) {
            $table->foreign('id_rusa')->references('id')->on('rusa')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_pengurus')->references('id')->on('pengurus')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kesehatan', function (Blueprint $table) {
            $table->dropForeign(['id_rusa']);
            $table->dropForeign(['id_pengurus']);
        });
    }
};
