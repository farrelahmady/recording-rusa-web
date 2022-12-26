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
        Schema::create('rolepengurus_permission', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_role_pengurus')->constrained('role_pengurus')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_permission')->constrained('permission')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::table('rolepengurus_permission', function (Blueprint $table) {
            $table->dropForeign(['id_role_pengurus']);
            $table->dropForeign(['id_permission']);
        });
        Schema::dropIfExists('rolepengurus_permission');
    }
};
