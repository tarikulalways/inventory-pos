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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->string('productSlug');
            $table->foreignId('categoryId')->constrained('categories')->onDelete('cascade');
            $table->string('productCode')->nullable();
            $table->string('purchasePrice');
            $table->string('salePrice');
            $table->string('minQty');
            $table->string('maxQty');
            $table->foreignId('supplierId')->constrained('suppliers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
