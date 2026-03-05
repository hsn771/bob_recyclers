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
        Schema::create('front_menus', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_type')->comment('1 page 2 list page')->nullable();
            $table->integer('rank')->nullable();
            $table->integer('parent_id')->default(0)->nullable();
            $table->string('menu_icon')->nullable();
            $table->string('name',500)->nullable();
            $table->string('href',500)->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('front_menus');
    }
};
