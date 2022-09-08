<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content');
            $table->string('slug');
            $table->string('apply_url')->nullable();
            $table->foreignId('company_id')->constrained('companies');
            $table->boolean('remote_allowed')->default(false);
            $table->boolean('hybrid_allowed')->default(false);
            $table->boolean('inperson_allowed')->default(false);
            $table->integer('salary_min')->nullable();
            $table->integer('salary_max')->nullable();
            $table->integer('age_min')->nullable();
            $table->integer('age_max')->nullable();
            $table->string('currency_code')->default('USD');
            $table->boolean('is_highlighted')->default(false);
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('listings');
    }
}
