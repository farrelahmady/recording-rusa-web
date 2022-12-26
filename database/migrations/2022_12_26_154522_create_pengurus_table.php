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
        Schema::create('pengurus', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->uuid('id_penangkaran')->unsigned();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nama_depan', 50);
            $table->string('nama_belakang', 50)->nullable();
            $table->string('no_telp', 15);
            $table->text('alamat');
            $table->bigInteger('id_role')->unsigned();
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
        Schema::dropIfExists('pengurus');
    }
};
