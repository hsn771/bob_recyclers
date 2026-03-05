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
        Schema::create('ships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            // $table->string('country');
            // $table->float('weight');
            $table->string('category')->comment('1=>Corporate, 2=>Project');
            // $table->string('type')->comment('1=>General Ship, 2=>Bulk Carrier');
            // $table->enum('status', ['Completed', 'Ongoing', 'Pending']); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ships');
    }
};
