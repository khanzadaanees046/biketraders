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
        Schema::create('bike_repairs', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('bike_chase_no');
            $table->string('bike_no');
            $table->date('receiving_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->integer('status');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bike_repairs');
    }
};
