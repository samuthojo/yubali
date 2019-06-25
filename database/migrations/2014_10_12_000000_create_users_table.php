<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->date('birthdate')->nullable();
            $table->string('gender')->nullable();
            $table->string('specialization')->nullable();
            $table->string('marital_status')->nullable();
            $table->integer('children_number')->nullable();
            $table->string('physical_address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->unique();
            $table->string('salvation_status')->nullable();
            $table->string('denomination')->nullable();
            $table->string('church_name')->nullable();
            $table->string('church_location')->nullable();
            $table->text('biography')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
