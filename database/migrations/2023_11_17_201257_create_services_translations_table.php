<?php
	
	use App\Models\ServiceTrans;
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
        Schema::create('Service_trans', function (Blueprint $table) {
            $table->id();
			$table->foreignid('service_id')->constrained('services')->ondelete('cascade');
			$table->string('name');
			$table->text('description');
			$table->text('short_description');
			$table->string('lang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_translations');
    }
};
