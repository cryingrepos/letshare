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
        Schema::create('application_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->longtext('address');
            $table->string('country');
            $table->string('country_id')->nullable();
            $table->string('state');
            $table->string('city');
            $table->string('postal_code');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('logo');
            $table->string('favicon');
            $table->string('language');
            $table->softdeletes();
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
        Schema::dropIfExists('application_settings');
    }
};
