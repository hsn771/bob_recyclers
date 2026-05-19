<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('track_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('position')->unique();
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('track_section_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('track_section_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('photo')->nullable();
            $table->text('short_description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('track_section_items');
        Schema::dropIfExists('track_sections');
    }
};
