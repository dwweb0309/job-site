<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('location_id')->constrained('locations');
            $table->foreignId('nationality_id')->constrained('locations');
            $table->string('photo_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('whatsapp')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Not sure'])->default('Male');
            $table->date('dob')->nullable();
            $table->integer('expected_salary')->nullable();
            $table->string('currency_code')->default('USD');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
