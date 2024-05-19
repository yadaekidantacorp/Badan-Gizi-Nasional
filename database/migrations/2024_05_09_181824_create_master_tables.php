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
        Schema::create('ministries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('thumbnail')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('directorates', function (Blueprint $table) {
            $table->id();
            $table->integer('ministry_id');
            $table->integer('directorate_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('colour');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('type');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ministries');
        Schema::dropIfExists('directorates');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('labels');
        Schema::dropIfExists('statuses');
    }
};
