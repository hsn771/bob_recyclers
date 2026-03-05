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
        Schema::create('social_icons', function (Blueprint $table) {
            $table->id();
            $table->string('social_site');
            // $table->string('social_logo')->nullable();
            $table->string('social_address');
            // $table->unsignedBigInteger('setting_id');
            $table->timestamps();
            $table->softDeletes();
            // $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_icons');
    }
};
