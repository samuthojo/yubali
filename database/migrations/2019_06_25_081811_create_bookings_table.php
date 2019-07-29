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
        $table->string('service_category');
        $table->string('name');
        $table->string('region');
        $table->string('district');
        $table->string('place');
        $table->string('denomination')->nullable();
        $table->string('contact_person');
        $table->string('mobile');
        $table->string('email');
        $table->date('start_date');
        $table->date('end_date');
        $table->string('status')->default('pending');
        $table->string('reason')->nullable();
        $table->unsignedBigInteger('user_id');
        $table->timestamps();
        // Set the foreign keys
        $table->foreign('user_id')
              ->references('id')->on('users')
              ->onDelete('cascade');
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
