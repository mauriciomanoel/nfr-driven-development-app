<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtifactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('artifacts_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');    
            $table->string('mime_type');
        });

        Schema::create('artifacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('description');
            $table->longText('content');
            $table->integer('artifacts_type_id'); 
            $table->unsignedBigInteger('life_settings_subcategories_id');
            $table->integer('users_id')->unsigned();
            $table->timestamps();

            $table->foreign('life_settings_subcategories_id')
                ->references('id')
                ->on('life_settings_subcategories')
                ->onDelete('cascade');

        });

        Schema::create('artifact_has_life_settings', function (Blueprint $table) {
            $table->unsignedBigInteger('artifacts_id');
            $table->unsignedBigInteger('life_settings_id');

            $table->foreign('artifacts_id')
                ->references('id')
                ->on('artifacts')
                ->onDelete('cascade');

            $table->foreign('life_settings_id')
                ->references('id')
                ->on('life_settings')
                ->onDelete('cascade');

            $table->primary(['artifacts_id', 'life_settings_id'],
                    'artifact_has_life_settings_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artifacts_type');
        Schema::dropIfExists('artifact_has_life_settings');
        Schema::dropIfExists('artifacts');

    }
}
