<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('merek_id')->unsigned();
            $table->string('nama_mobil');
            $table->string('nopol');
            $table->integer('tahun');
            $table->integer('seat');
            $table->string('transmisi');
            $table->string('bb');
            $table->string('status_mobil');
            $table->integer('tarif_mobil');
            $table->integer('tarif_sopir');
            $table->string('img');

            $table->foreign('merek_id')->references('id')
            ->on('mereks')->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('mobils');
    }
}
