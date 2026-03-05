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
        Schema::create('track_records', function (Blueprint $table) {
            $table->id();
            $table->string('title_1');
            $table->string('title_2');
            $table->string('title_3');
            $table->string('title_4');
            $table->string('number_1');
            $table->string('number_2');
            $table->string('number_3');
            $table->string('number_4');
            $table->text('short_description');
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
        Schema::dropIfExists('track_records');
    }
};
