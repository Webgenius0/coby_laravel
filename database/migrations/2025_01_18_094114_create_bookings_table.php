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
            $table->string('name')->nullable();
            $table->enum('policy_currency', ['British Pounds', 'US Dollar'])->default('British Pounds');
            $table->string('country_of_residence')->nullable();
            $table->enum('insurance_type', ['multi-trip', 'single-trip'])->default('single-trip');
            $table->enum('policy_type', ['standard', 'extended'])->nullable();
            $table->enum('coverage_type', ['standard', 'increased'])->nullable();
            $table->enum('area_of_travel', ['worldwide', 'ex_usa', 'europe'])->default('worldwide');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('number_of_adults')->nullable();
            $table->string('age')->nullable();
            $table->json('adults')->nullable();
            $table->integer('number_of_children')->nullable();
            $table->json('travel_type')->nullable();
            $table->json('children')->nullable();
            $table->string('address_one')->nullable();
            $table->string('address_two')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('how_know')->nullable();
            $table->longText('comments')->nullable();
            $table->float('total_price', 8, 2)->default(0.00);
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->string('transaction_id')->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'saved'])->default('pending');
            $table->string('unique_id');
            $table->foreignId('broker_id')->nullable()->constrained('brokers')->onDelete('cascade');
            $table->enum('currency', ['USD', 'GBP'])->default('GBP');
            $table->boolean('if_contact')->nullable();
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
