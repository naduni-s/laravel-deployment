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
        Schema::create('women', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->startingValue(100)->comment('ID range: 100-200');
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->text('description');
            $table->string('image_url');
            $table->timestamps();
        });

        // Set the auto-increment starting value to 100 and maximum value to 200
        DB::statement('ALTER TABLE women AUTO_INCREMENT = 100');
        DB::statement('ALTER TABLE women AUTO_INCREMENT = 200');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('women');
    }
};
