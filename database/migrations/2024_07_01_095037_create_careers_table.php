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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company');
            $table->string('profile');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->string('no_of_post');
            $table->string('city');
            $table->string('state');
            $table->string('job_type');
            $table->string('language');
            $table->string('qualification');
            $table->string('min_salary');
            $table->string('max_salary');
            $table->string('min_experience');
            $table->string('max_experience');
            $table->string('opening_date');
            $table->string('image');
            $table->string('website')->nullable();
            $table->longText('description');
            $table->string('status')->nullable();
            $table->string('delete_reason')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('careers');
    }
};
