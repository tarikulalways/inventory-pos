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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customerId')->constrained('customers')->onDelete('cascade');
            $table->string('subTotal');
            $table->string('discount')->nullable()->default(0);
            $table->string('totalPayAble');
            $table->string('receiveMoney');
            $table->string('dueMoney')->nullable()->default(0);
            $table->string('duePaymentDate')->nullable()->default(0);
            $table->string('customerGPN')->nullable();
            $table->string('customerGPQty')->nullable();
            $table->string('customerGPP')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
