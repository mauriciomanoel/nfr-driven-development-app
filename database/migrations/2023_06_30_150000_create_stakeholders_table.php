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
        
        Schema::create('stakeholders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('stakeholder_analysis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('stakeholder_id');
            $table->text('description');
            $table->text('identified_needs');
            $table->text('expectations');
            $table->text('experiences');
            $table->integer('users_id')->unsigned();
            $table->timestamps();

            $table->foreign('stakeholder_id')
                ->references('id')
                ->on('stakeholders')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stakeholder_analysis');
        Schema::dropIfExists('stakeholders');
    }
};
