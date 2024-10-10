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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('alt_mobile')->nullable();
            $table->string('event_type');
            $table->string('pincode');
            $table->string('address');
            $table->integer('quantity');
            $table->string('booking_date');
            $table->string('booking_time');
            $table->string('delivered_by')->nullable();
            $table->boolean('isDelivered')->default(false);
            $table->string('price')->nullable();
            $table->boolean('payment')->default(false);
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('events');
    }
};
