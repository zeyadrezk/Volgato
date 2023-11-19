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
        Schema::create('product_trans', function (Blueprint $table) {
            $table->id();
	        $table->foreignid('product_id')->constrained('products')->ondelete('cascade');
	        $table->string('name',50)->required();
	        $table->string('image')->nullable();
	        $table->string('short_description');
	        $table->string('description');
	        $table->integer('quantity');
	        $table->string('lang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_trans');
    }
};
