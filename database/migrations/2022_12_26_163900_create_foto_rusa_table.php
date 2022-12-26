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
        Schema::create('foto_rusa', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->foreignUuid('id_rusa')->constrained('rusa')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('foto');
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
        Schema::table('foto_rusa', function (Blueprint $table) {
            $table->dropForeign(['id_rusa']);
        });
        Schema::dropIfExists('foto_rusa');
    }
};
