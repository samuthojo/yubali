<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('specialization');
            $table->string('marital_status');
            $table->integer('children_number');
            $table->string('physical_address');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('salvation_status');
            $table->string('denomination');
            $table->string('church_name');
            $table->string('church_location');
            $table->text('biography');
            $table->string('flag')->default('office_admin');
            $table->string('status')->default('pending');
            $table->text('reason')->nullable();
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
        Schema::dropIfExists('membership_applications');
    }
}
