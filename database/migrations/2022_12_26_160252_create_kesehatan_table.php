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
        Schema::create('kesehatan', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->uuid('id_rusa');
            $table->string('penyakit', 50);
            $table->string('jenis_penyakit', 50);
            $table->string('penanganan');
            $table->string('obat');
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
        Schema::dropIfExists('kesehatan');
    }
};
