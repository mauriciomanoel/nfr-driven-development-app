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
            $table->text('alias')->nullable();
            $table->longText('description');
            $table->text('model_quality');
            $table->text('source');
            $table->text('recommendations');
            $table->longText('content')->nullable();
            $table->longText('image')->nullable();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('characteristics_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('non_functional_requirement');
    }
};
