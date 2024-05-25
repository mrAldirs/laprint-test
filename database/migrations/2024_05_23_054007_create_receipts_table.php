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
        Schema::create('receipts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('contact_id')->references('id')->on('contacts')->onDelete('cascade');
            $table->foreignUuid('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignUuid('purchase_id')->references('id')->on('purchase_orders')->onDelete('cascade');
            $table->string('no_penerimaan')->nullable();
            $table->date('tanggal_diterima')->nullable();
            $table->integer('qty')->nullable();
            $table->string('total')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
