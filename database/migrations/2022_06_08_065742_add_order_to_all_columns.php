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
        Schema::table('texts', function (Blueprint $table) {
            $table->smallInteger('order');
        });
        Schema::table('photos', function (Blueprint $table) {
            $table->smallInteger('order');
        });
        Schema::table('videos', function (Blueprint $table) {
            $table->smallInteger('order');
        });
        Schema::table('other_links', function (Blueprint $table) {
            $table->smallInteger('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('all_columns', function (Blueprint $table) {
            //
        });
    }
};
