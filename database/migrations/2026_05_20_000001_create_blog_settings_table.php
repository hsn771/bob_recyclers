<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_settings', function (Blueprint $table) {
            $table->id();
            $table->string('banner_image')->nullable();
            $table->string('page_title')->default('Blog');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_settings');
    }
};
