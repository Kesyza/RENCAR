<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('car_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('sopir_id')->unsigned();
            $table->string('kode_booking');
            $table->date('tanggal_booking');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->date('tanggal_kembali');
            $table->integer('denda');
            $table->integer('durasi');
            $table->string('status_booking');
            $table->string('paket');
            $table->integer('jumlah_bayar');
            $table->integer('jumlah_dp');

            $table->foreign('car_id')->references('id')
            ->on('mobils')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('user_id')->references('id')
            ->on('users')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('sopir_id')->references('id')
            ->on('sopirs')->onUpdate('cascade')
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
        Schema::dropIfExists('bookings');
    }
}
