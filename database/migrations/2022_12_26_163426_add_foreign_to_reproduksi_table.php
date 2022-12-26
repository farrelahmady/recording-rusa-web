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
        Schema::table('reproduksi', function (Blueprint $table) {
            $table->foreign('id_jantan')->references('id')->on('rusa')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_betina')->references('id')->on('rusa')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_anak')->references('id')->on('rusa')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::table('reproduksi', function (Blueprint $table) {
            $table->dropForeign(['id_jantan']);
            $table->dropForeign(['id_betina']);
            $table->dropForeign(['id_anak']);
            $table->dropForeign(['id_pengurus']);
        });
    }
};
