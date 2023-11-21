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
        Schema::create('product_rates', function (Blueprint $table) {
            $table->id();
			$table->string('name');
	        $table->foreignid('product_id')->constrained('products')->ondelete('cascade');
			$table->string('productEvaluation');
			$table->text('comment')->nullable();
			$table->integer('rate');
			$table->date('commentDate');
	        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_rates');
    }
};
