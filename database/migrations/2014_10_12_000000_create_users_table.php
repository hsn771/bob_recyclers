<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('contact_no')->unique();
            $table->unsignedBigInteger('role_id')->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('password');
            $table->string('language')->default('en');
            $table->string('image')->nullable();
            $table->boolean('full_access')->default(false)->comment('1=>yes 0=>no');
            $table->integer('status')->default(0)->comment('0=>inactive 1=>active 2=>Hold 3=>Cancel');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
