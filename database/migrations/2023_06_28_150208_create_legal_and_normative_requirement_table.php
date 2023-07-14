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
        
        Schema::create('legal_and_normative_requirement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('description');
            $table->text('legal_references');
            $table->text('recommendations');
            $table->longText('content');
            $table->unsignedBigInteger('life_settings_id');
            $table->integer('users_id')->unsigned();
            $table->timestamps();

            $table->foreign('life_settings_id')
                ->references('id')
                ->on('life_settings')
                ->onDelete('cascade');

        });

        Schema::create('legal_has_nfr_requirement', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('legal_id');
            $table->unsignedBigInteger('nfr_id');

            $table->foreign('legal_id')
                ->references('id')
                ->on('legal_and_normative_requirement');

            $table->foreign('nfr_id')
                ->references('id')
                ->on('non_functional_requirement');

            // $table->primary(['legal_id', 'nfr_id'], 'legal_has_nfr_requirement_primary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_and_normative_requirement');
        Schema::dropIfExists('legal_has_nfr_requirement');

    }
};
