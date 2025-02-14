<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sale_logs', function (Blueprint $table) {
            $table->id();
            $table->date('payment_date');
            $table->string('customer_name', 100);
            $table->integer('customer_cpf');
            $table->json('cart_itens_j');
            $table->decimal('total_received', 15, 2);
            $table->decimal('total', 15, 2);
            $table->decimal('discount_value', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_logs');
    }
};
