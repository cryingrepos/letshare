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
        Schema::create('whoweare_pages', function (Blueprint $table) {
            $table->id();
            $table->longText('banner_text');
            $table->longText('banner_image');
            $table->longText('content_heading');
            $table->longText('content_description');
            $table->longText('content_image');
            $table->string('content_background')->nullbale();
            $table->string('section_heading');
            $table->string('section_sub_heading');
            $table->string('section_image');
            $table->string('section_button_text');
            $table->string('section_button_color')->nullable();
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
        Schema::dropIfExists('whoweare_pages');
    }
};
