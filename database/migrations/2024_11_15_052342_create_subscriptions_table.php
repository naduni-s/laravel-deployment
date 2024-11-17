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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('gender'); // To store gender
            $table->text('perfumes'); // To store comma-separated perfume names
            $table->text('notes')->nullable(); // To store order notes (nullable)
            $table->boolean('agreed_to_terms')->default(false); // To store agreement status
            $table->timestamps(); // Created at & updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
