<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->integer('amount');
            $table->date('transaction_date');
            $table->enum('transaction_type', ['in', 'out']);
    
            // Foreign key ke item_name di tabel items
            $table->foreign('item_name')->references('item_name')->on('items')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
