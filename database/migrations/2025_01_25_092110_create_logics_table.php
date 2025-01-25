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
            $table->integer('winter_sprots')->default(2)->comment("(w + 100) / 100");
            $table->integer('adventure_sprots_multi')->default(2)->comment("(am + 100) / 100");
            $table->integer('adventure_sprots_single')->default(2)->comment("(as + 100) / 100");
            $table->integer('cancel_cost')->default(2)->comment("(c + 100) / 100");
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
