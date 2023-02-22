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
        Schema::create('applets', function (Blueprint $table) {
            $table->id();
            $table->string('applet_name');
            $table->integer('parent_id')->default(0);
            $table->integer('position');
            $table->longText('applet_slug');
            $table->enum('type',['A','M']);
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
        Schema::dropIfExists('applets');
    }
};
