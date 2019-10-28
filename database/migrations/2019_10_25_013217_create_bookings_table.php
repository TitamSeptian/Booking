<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->bigInteger('tempat_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('jam_awal');
            $table->string('jam_akhir');
            $table->enum('status', ['booking', 'cencel', 'success']);
            $table->timestamps();

            // $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');

            $table->foreign('tempat_id')->references('id')->on('tempats')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
