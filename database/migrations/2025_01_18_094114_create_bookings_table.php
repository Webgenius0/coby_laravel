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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->enum('policy_currency', ['British Pounds', 'USA Dollers'])->default('British Pounds');
            $table->string('country_of_residence');
            $table->enum('insurance_type', ['multi-trip', 'single-trip'])->default('multi-trip');
            $table->enum('area_of_travel', ['worldwide', 'excluding USA, Canada & Caribbean'])->default('worldwide');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('number_of_adults');
            $table->string('age');
            $table->json('adults');
            $table->integer('number_of_children');
            $table->json('travel_type');
            $table->json('children');
            $table->string('address_one');
            $table->string('address_two')->nullable();
            $table->string('city');
            $table->string('zip_code');
            $table->string('telephone');
            $table->string('email');
            $table->string('country');
            $table->string('how_know');
            $table->longText('comments')->nullable();
            $table->float('total_price', 8, 2)->default(0);
            $table->enum('status', ['pending', 'paid', 'failed'])->default('pending');
            $table->string('transaction_id')->nullable();
            $table->enum('payment_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
