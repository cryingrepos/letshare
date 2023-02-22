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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('is_loggedin', ['1', '0'])->default('0');
            $table->enum('role', ['1', '2', '3'])->default('1');
            $table->longText('session_id')->nullable();
            $table->string('ip')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('language')->nullable();
            $table->enum('batter_permission', ['strike_one', 'arena'])->default('strike_one');
            $table->string('image')->nullable();
            $table->softDeletes();
            $table->integer('phone')->nullable();
            $table->enum('is_verified', ['0', '1'])->default('0');
            $table->enum('is_blocked', ['0', '1'])->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
