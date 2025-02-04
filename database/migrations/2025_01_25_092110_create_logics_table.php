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
        Schema::create('logics', function (Blueprint $table) {
            $table->id();
            $table->integer('multi_trip_standard')->default(2)->comment("(w + 100) / 100");
            $table->integer('multi_trip_extended')->default(2)->comment("(w + 100) / 100");
            $table->integer('cancellation_coverage_standard')->default(2)->comment("(w + 100) / 100");
            $table->integer('cancellation_coverage_increased')->default(2)->comment("(w + 100) / 100");
            $table->integer('winter_sprots')->default(2)->comment("(w + 100) / 100");
            $table->integer('adventure_sprots_multi')->default(2)->comment("(am + 100) / 100");
            $table->integer('adventure_sprots_single')->default(2)->comment("(as + 100) / 100");
            $table->float('charge')->default(2)->comment("(100 * c) / 100");
            $table->float('tax')->default(2)->comment("(100 * c) / 100");
            $table->float('usd_to_gbp')->default(2)->comment(".8");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logics');
    }
};
