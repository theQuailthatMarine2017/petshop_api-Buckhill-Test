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
        Schema::create('jwt_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('unique_id');
            $table->string('token_title');
            $table->boolean('restrictions')->nullable()->change();
            $table->string('permissions')->nullable()->change();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('expires_at')->nullable()->change();
            $table->timestamp('last_used_at')->nullable()->change();
            $table->timestamp('refreshed_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jwt_tokens');
    }
};
