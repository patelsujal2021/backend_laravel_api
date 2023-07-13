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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('item_name',50);
            $table->string('item_code',50);
            $table->integer('quantity');
            $table->string('location');
            $table->unsignedBigInteger('store_id');
            $table->date('in_stock')->nullable();
            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('store')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
