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
            $table->string('email')->unique();
            $table->text('address')->nullable();
            $table->enum('level', ['admin', 'seller', 'user'])->default('user');
            $table->enum('status', ['active', 'ban'])->default('active');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->double('nik')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('ayah')->nullable();
            $table->string('a_pekerjaan')->nullable();
            $table->string('ibu')->nullable();
            $table->string('i_pekerjaan')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
