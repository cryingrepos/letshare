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
        Schema::create('message_pages', function (Blueprint $table) {
            $table->id();
            $table->longText('banner_title');
            $table->longText('banner_subtitle');
            $table->string('banner_image');
            $table->longText('content_description');
            $table->longText('rap_title');
            $table->longText('rap_content');
            $table->longText('listen_title');
            $table->longText('listen_content');
            $table->string('listen_image')->nullable();
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
        Schema::dropIfExists('message_pages');
    }
};
