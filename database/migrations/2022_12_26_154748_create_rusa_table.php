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
        Schema::create('rusa', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('no_satwa', 50);
            $table->string('kode_satwa', 50);
            $table->string('id_tag', 50);
            $table->uuid('id_pemilik');
            $table->uuid('id_penangkaran');
            $table->string('nama', 50);
            $table->string('jenis_kelamin', 50);
            $table->uuid('induk_jantan');
            $table->uuid('induk_betina');
            $table->date('tanggal_lahir');
            $table->integer('status_gen');
            $table->text('ciri_khusus');
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
        Schema::dropIfExists('rusa');
    }
};
