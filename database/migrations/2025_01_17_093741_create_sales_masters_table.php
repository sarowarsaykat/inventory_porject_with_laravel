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
        Schema::create('sales_masters', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->date('sale_date');
            $table->decimal('total_quantity', 10, 2);
            $table->decimal('total_amount', 15, 2);
            $table->string('payment_method');
            $table->decimal('payment', 15, 2);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_masters');
    }
};
