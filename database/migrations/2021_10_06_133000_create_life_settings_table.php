<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLifeSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('life_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
        });

        Schema::create('life_settings_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('life_settings_id');


            $table->foreign('life_settings_id')
                ->references('id')
                ->on('life_settings')
                ->onUpdate('cascade');

        });

        Schema::create('life_settings_subcategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('life_settings_categories_id');

            $table->foreign('life_settings_categories_id')
                ->references('id')
                ->on('life_settings_categories')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('life_settings_subcategories');
        Schema::dropIfExists('life_settings_categories');
        Schema::dropIfExists('life_settings');
    }
}
