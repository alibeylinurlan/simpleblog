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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('header');
            $table->string('slogan')->nullable();
            $table->string('header_photo_link')->nullable();
            $table->string('category')->nullable();
            $table->string('reference_link')->nullable();
            $table->unsignedBigInteger('look_count')->default(0);
            $table->enum('status', ['active', 'waiting'])->default('waiting');
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
        Schema::dropIfExists('items');
    }
};
