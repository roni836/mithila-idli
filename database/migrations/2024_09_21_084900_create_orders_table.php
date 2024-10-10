<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('alt_mobile')->nullable();
            $table->string('pincode');
            $table->string('address');
            $table->string('delivered_by')->nullable();
            $table->boolean('isDelivered')->default(false);
            $table->string('price')->nullable();
            $table->boolean('payment')->default(false);
            $table->string('payment_method')->nullable();
            $table->enum('event_type', ['wedding-party','birthday-party', 'kitty-party', 'anniversary-party', 'other'])->nullable();
            $table->boolean('isConfirmed')->default(false);
            $table->boolean('status')->default(false);
            $table->string('booking_date');
            $table->string('booking_time');
            $table->integer('quantity');
            $table->string('order_id')->unique();
            $table->string('delete_reason')->nullable();
            $table->string('token')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
