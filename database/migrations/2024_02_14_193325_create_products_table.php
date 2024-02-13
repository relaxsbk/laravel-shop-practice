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

            $table->string('title')->nullable();

            $table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete();

            $table->string('model')->nullable();

            $table->foreignId('brand_id')->nullable()->constrained()->cascadeOnDelete();

            $table->text('description')->nullable();
            $table->text('img')->nullable();
            $table->double('price')->nullable();
            //stock_quality_id
//            $table->foreignId('stock_id')->nullable()->constrained()->cascadeOnDelete();

            $table->double('rating')->nullable();

            //provider_id
            $table->foreignId('provider_id')->nullable()->constrained()->cascadeOnDelete();
            //procurement_id
//            $table->foreignId('procurement_id')->nullable()->constrained()->cascadeOnDelete();

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
