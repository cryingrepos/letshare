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
        Schema::create('ideas', function (Blueprint $table) {
            $table->id();
            $table->mediumText('title');
            $table->longText('description');
            $table->string('image');
            $table->string('slug')->nullable();
            $table->json('related_image')->nullable();
            $table->foreignId('user_id')->constrained('users')->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
            $table->enum('status', ['0', '1'])->default('0');
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
        Schema::dropIfExists('ideas');
    }
};
