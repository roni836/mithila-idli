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
        Schema::create('job_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_id')->constrained()->onDelete("cascade");
            $table->string('name');
            $table->string('mother');
            $table->string('father');
            $table->string('dob');
            $table->string('gender');
            $table->string('religion');
            $table->string('community');
            $table->string('mobile');
            $table->string('email');
            $table->string('experience');
            $table->string('skills');
            $table->string('area');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            $table->string('qualification');
            $table->string('photo');
            $table->string('document');
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
        Schema::dropIfExists('job_forms');
    }
};
