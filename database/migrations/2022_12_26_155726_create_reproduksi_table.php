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
            $table->id();
            $table->uuid('id_jantan')->unsigned();
            $table->uuid('id_betina')->unsigned();
            $table->uuid('id_anak')->unsigned();
            $table->enum('status', [1, 2, 3]);
            $table->date('tanggal');
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
