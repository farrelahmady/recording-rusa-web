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
        Schema::create('reproduksi', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->uuid('id_jantan');
            $table->uuid('id_betina');
            $table->uuid('id_anak');
            $table->enum('status', [1, 2, 3]);
            $table->date('tanggal');
            $table->uuid('id_pengurus');
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
        Schema::dropIfExists('reproduksi');
    }
};
