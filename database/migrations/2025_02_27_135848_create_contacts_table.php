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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('vk');
            $table->string('telegram');
            $table->string('phone');
            $table->string('email');
            $table->string('address_office');
            $table->string('address_place');
            $table->string('mail_index');
            $table->string('operator');

            $table->text('map');
            $table->text('map_route');

            $table->boolean('vis')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
