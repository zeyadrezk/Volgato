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
			$table->decimal('price',10,2)->required();
			$table->decimal('oldprice',10,2)->required();
	        $table->string('name')->required();
	        $table->string('image')->nullable();
	        $table->string('secondImage')->nullable();
	        $table->string('advantages')->nullable();
	        $table->string('Video')->nullable();
	        $table->text('short_description');
	        $table->text('description');
	        $table->text('details');
	        $table->integer('quantity');
	        $table->decimal('total_rate');
	        $table->foreignid('category_id')->constrained('categories')->ondelete('cascade');
	        $table->foreignid('country_id')->constrained('countries')->ondelete('cascade');
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
