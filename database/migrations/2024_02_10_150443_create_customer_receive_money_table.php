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
        Schema::create('customer_receive_money', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customerId')->constrained('customers')->onDelete('cascade');
            $table->string('receiveMoney');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_receive_money');
    }
};
