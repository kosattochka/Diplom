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
        Schema::create('paragraphs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id');
            $table->string('table');

            $table->string('title')->nullable();
            $table->text('text');

            $table->integer('sort')->default(0);
            $table->boolean('vis')->default(true);

            // $table->foreign('parent_id', 'fk_paragraphs_rooms')->references('id')->on('rooms')->cascadeOnDelete();
            // $table->foreign('parent_id', 'fk_paragraphs_rules')->references('id')->on('rules')->cascadeOnDelete();
            // $table->foreign('parent_id', 'fk_paragraphs_events')->references('id')->on('events')->cascadeOnDelete();
            // $table->foreign('parent_id', 'fk_paragraphs_news')->references('id')->on('news')->cascadeOnDelete();
        });

        Schema::table('paragraphs', function (Blueprint $table) {
            $table->unsignedBigInteger('table_id')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paragraphs');

        Schema::table('paragraphs', function (Blueprint $table) {
            $table->dropColumn('table_id');
        });
    }
};
