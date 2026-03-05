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
        Schema::create('management', function (Blueprint $table) {
            $table->id();
            $table->string('top_management_title');
            $table->text('top_description');
            $table->string('mid_management_title');
            $table->text('mid_description');
            $table->string('yard_management_title');
            $table->text('yard_description');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('management');
    }
};
