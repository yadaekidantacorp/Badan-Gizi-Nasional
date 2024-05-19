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
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->integer('ministry_id');
            $table->string('title');
            $table->string('budget', 20)->default(0);
            $table->longText('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->longText('summary')->nullable();
            $table->longText('notes')->nullable();
            $table->string('file')->nullable();
            $table->integer('status_id');
            $table->tinyInteger('is_public')->default(1);
            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('board_labels', function (Blueprint $table) {
            $table->id();
            $table->integer('board_id');
            $table->string('name');
            $table->string('color');
            $table->timestamps();
        });
        Schema::create('board_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('board_id');
            $table->string('name');
            $table->tinyInteger('position');
            $table->timestamps();
        });
        Schema::create('board_members', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('board_id');
        });
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->integer('board_list_id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->timestamp('due_at')->nullable();
            $table->timestamp('reminder_at')->nullable();
            $table->timestamps();
        });
        Schema::create('card_activities', function (Blueprint $table) {
            $table->id();
            $table->integer('card_id');
            $table->integer('user_id');
            $table->longText('activity');
            $table->timestamps();
        });
        Schema::create('card_attachments', function (Blueprint $table) {
            $table->id();
            $table->integer('card_id');
            $table->string('name');
            $table->string('extension');
            $table->string('size');
            $table->string('path');
            $table->timestamps();
        });
        Schema::create('card_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('card_id');
            $table->longText('comment');
            $table->timestamps();
        });
        Schema::create('card_labels', function (Blueprint $table) {
            $table->integer('board_label_id');
            $table->integer('card_id');
        });
        Schema::create('card_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('card_id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->tinyInteger('is_checked')->default(0);
            $table->tinyInteger('position');
            $table->timestamps();
        });
        Schema::create('card_members', function (Blueprint $table) {
            $table->integer('card_id');
            $table->integer('user_id');
        });
        Schema::create('attachment_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('card_attachment_ids');
            $table->string('file');
            $table->tinyInteger('st');
            $table->timestamps();
        });
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->longText('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boards');
        Schema::dropIfExists('board_labels');
        Schema::dropIfExists('board_lists');
        Schema::dropIfExists('board_members');
        Schema::dropIfExists('cards');
        Schema::dropIfExists('card_activities');
        Schema::dropIfExists('card_attachments');
        Schema::dropIfExists('card_comments');
        Schema::dropIfExists('card_labels');
        Schema::dropIfExists('card_lists');
        Schema::dropIfExists('card_members');
        Schema::dropIfExists('attachment_histories');
        Schema::dropIfExists('notes');
    }
};
