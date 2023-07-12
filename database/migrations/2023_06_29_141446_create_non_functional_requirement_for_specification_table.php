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

        Schema::create('non_functional_requirement_for_specification', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('nfr_id');
            $table->unsignedBigInteger('is_recommendation');
            $table->text('legal_requirements_id');
            $table->text('description');
            $table->text('acceptance_criteria');
            $table->text('evaluation_metrics');
            $table->longText('content');
            $table->longText('image');

            $table->timestamps();

            $table->foreign('nfr_id')
                ->references('id')
                ->on('non_functional_requirement')
                ->onDelete('cascade');

            // $table->foreign('legal_id')
            // ->references('id')
            // ->on('legal_and_normative_requirement')
            // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('non_functional_requirement_for_specification');
    }
};
