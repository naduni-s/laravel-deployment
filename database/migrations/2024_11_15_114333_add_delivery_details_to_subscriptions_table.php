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
    Schema::table('subscriptions', function (Blueprint $table) {
        $table->string('name'); // Full name
        $table->string('phone'); // Phone number
        $table->text('address'); // Address
    });
}

public function down()
{
    Schema::table('subscriptions', function (Blueprint $table) {
        $table->dropColumn(['name', 'phone', 'address']);
    });
}
};
