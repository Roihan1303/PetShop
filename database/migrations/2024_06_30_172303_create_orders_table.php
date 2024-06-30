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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('hewan_id');
            $table->string('alamat');
            $table->string('pembayaran');
            $table->integer('total_harga');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('hewan_id')->references('id')->on('hewan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
