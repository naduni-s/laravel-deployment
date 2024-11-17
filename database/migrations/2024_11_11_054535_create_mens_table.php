<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mens', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->startingValue(1)->comment('ID range: 1-100');
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->text('description');
            $table->string('image_url');
            $table->timestamps();
        });

        // Set the auto-increment starting value to 1 and maximum value to 100
        DB::statement('ALTER TABLE mens AUTO_INCREMENT = 1');
        DB::statement('ALTER TABLE mens AUTO_INCREMENT = 100');
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mens');
    }
};
