<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('non_functional_requirement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->longText('description');
            $table->text('model_quality');
            $table->text('source');
            $table->text('recommendations');
            $table->longText('content');
            $table->longText('image');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('characteristics_id');
            $table->timestamps();
        });

        Schema::create('non_functional_requirement_for_specification', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('nfr_id');
            $table->timestamps();

            $table->foreign('nfr_id')
                ->references('id')
                ->on('non_functional_requirement')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('non_functional_requirement');
        Schema::dropIfExists('definition_nfr_for_specification');

    }
};
