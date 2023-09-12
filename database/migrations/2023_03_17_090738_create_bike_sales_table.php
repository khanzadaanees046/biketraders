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
        Schema::create('bike_sales', function (Blueprint $table) {
            $table->id();
            $table->string('bike_id')->nullable();
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->integer('cnic')->nullable();
            $table->string('address')->nullable();
            $table->integer('payment_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bike_sales');
    }
};
