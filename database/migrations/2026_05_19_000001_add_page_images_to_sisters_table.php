<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sisters', function (Blueprint $table) {
            $table->string('banner_image')->nullable()->after('about_us');
            $table->string('image_1')->nullable()->after('banner_image');
            $table->string('image_2')->nullable()->after('image_1');
        });
    }

    public function down(): void
    {
        Schema::table('sisters', function (Blueprint $table) {
            $table->dropColumn(['banner_image', 'image_1', 'image_2']);
        });
    }
};
