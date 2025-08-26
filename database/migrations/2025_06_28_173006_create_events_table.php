<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('category');
            $table->boolean('is_recurring')->default(false);
            $table->enum('location_type', ['physical', 'online']);
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('event_url')->nullable();
            $table->string('image_path')->nullable();
            $table->enum('ticket_type', ['free', 'paid', 'donation']);
            $table->integer('max_attendees')->nullable();
            $table->dateTime('registration_deadline')->nullable();
            $table->enum('visibility', ['public', 'private', 'invite_only']);
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};