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
            $table->uuid('id_pemilik')->nullable();
            $table->uuid('id_penangkaran');
            $table->string('nama', 50);
            $table->enum('jenis_kelamin', [1, 2]);
            $table->uuid('induk_jantan')->nullable();
            $table->uuid('induk_betina')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->integer('status_gen')->default(0);
            $table->text('ciri_khusus')->nullable();
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
