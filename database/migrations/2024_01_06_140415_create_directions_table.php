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
        Schema::create('directions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('first_currency_id');
            $table->foreign('first_currency_id')->references('id')->on('currencies')->cascadeOnDelete();
            $table->unsignedBigInteger('second_currency_id');
            $table->foreign('second_currency_id')->references('id')->on('currencies')->cascadeOnDelete();
            $table->double('min_sum_for_exchange');
            $table->double('max_sum_for_exchange');
            $table->double('min_reserve_second_currency');
            $table->double('limit');
            $table->double('margin');
            $table->double('commission');
            $table->double('cashback');
            $table->double('ref_bonus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directions');
    }
};
