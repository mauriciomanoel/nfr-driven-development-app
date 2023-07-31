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
        
        Schema::create('steps_framework', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('code');
            $table->text('name');
            $table->text('description');
            $table->text('output');
            $table->timestamps();
        });
        
        Schema::create('steps_framework_project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('steps_framework_id');
            $table->unsignedBigInteger('project_id');
            $table->text('status'); 
            $table->timestamps();

            $table->foreign('steps_framework_id')
                ->references('id')
                ->on('steps_framework')
                ->onDelete('cascade');

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');
        });


        Schema::create('steps1_framework', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('steps_framework_project_id');
            $table->unsignedBigInteger('legal_requirements_id');
            $table->timestamps();

            $table->foreign('steps_framework_project_id')
                ->references('id')
                ->on('steps_framework_project')
                ->onDelete('cascade');

                $table->foreign('legal_requirements_id')
                ->references('id')
                ->on('legal_requirements')
                ->onDelete('cascade');
        });

        Schema::create('steps2_framework', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('steps_framework_project_id');
            $table->unsignedBigInteger('stakeholder_id');
            $table->text('identified_needs')->nullable();
            $table->text('expectations')->nullable();
            $table->text('experiences')->nullable();
            $table->timestamps();

            $table->foreign('steps_framework_project_id')
                ->references('id')
                ->on('steps_framework_project')
                ->onDelete('cascade');

                $table->foreign('stakeholder_id')
                ->references('id')
                ->on('stakeholders')
                ->onDelete('cascade');
        });


        Schema::create('data_collection_techniques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('description');
            $table->text('insights');
            $table->timestamps();
        });
        
        Schema::create('steps3_1_framework', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('data_collection_technique_id');
            $table->timestamps();

            $table->foreign('project_id')
            ->references('id')
            ->on('projects')
            ->onDelete('cascade');

            $table->foreign('data_collection_technique_id')
                ->references('id')
                ->on('data_collection_techniques')
                ->onDelete('cascade');
        });

        Schema::create('steps3_2_framework', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('steps_framework_project_id');
            $table->unsignedBigInteger('stakeholder_id');
            $table->text('description');
            $table->text('factors_impact_acceptability');
            $table->text('factors_impact_usability');
            $table->text('proposed_improvements');
            $table->text('recommendations');
            $table->timestamps();

            $table->foreign('steps_framework_project_id')
                ->references('id')
                ->on('steps_framework_project')
                ->onDelete('cascade');

                $table->foreign('stakeholder_id')
                ->references('id')
                ->on('stakeholders')
                ->onDelete('cascade');
        });

        Schema::create('steps4_framework', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('steps_framework_project_id');
            $table->unsignedBigInteger('nfr_id');
            $table->timestamps();

            $table->foreign('steps_framework_project_id')
                ->references('id')
                ->on('steps_framework_project')
                ->onDelete('cascade');

            $table->foreign('nfr_id')
                ->references('id')
                ->on('non_functional_requirement')
                ->onDelete('cascade');
        });

        Schema::create('steps5_framework', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('steps_framework_project_id');
            $table->text('description');
            $table->longText('content')->nullable();
            $table->longText('image')->nullable();
            $table->timestamps();

            $table->foreign('steps_framework_project_id')
                ->references('id')
                ->on('steps_framework_project')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('steps_framework');
        Schema::dropIfExists('data_collection_techniques');
        Schema::dropIfExists('steps_framework_project');
        Schema::dropIfExists('steps1_framework');
        Schema::dropIfExists('steps2_framework');
        Schema::dropIfExists('steps3_1_framework');
        Schema::dropIfExists('steps3_2_framework');
        Schema::dropIfExists('steps4_framework');
        Schema::dropIfExists('steps5_framework');
    }
};
