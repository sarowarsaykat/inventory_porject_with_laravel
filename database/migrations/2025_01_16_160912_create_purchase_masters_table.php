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
        Schema::create('purchase_masters', function (Blueprint $table) {
            $table->id();
            $table->integer('supplier_id');
            $table->date('purchase_date');
            $table->decimal('total_quantity', 10, 2);
            $table->decimal('total_amount', 15, 2);
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
        Schema::dropIfExists('purchase_masters');
    }
};
