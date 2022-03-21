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
            $table->increments('id');
            $table->string('uuid');
            $table->string('first_name');
            $table->string('last_name');
            $table->boolean('is_admin')->default(0)->change();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable()->change();
            $table->string('address');
            $table->string('phone_number');
            $table->boolean('is_marketing')->default(0)->nullable()->change();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('last_login_at')->nullable()->change();
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
