<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('institution_head_name')->nullable();
            $table->string('institution_head_position')->nullable();
            $table->string('coordinator_position')->nullable();
            $table->string('name')->nullable();
            $table->json('type')->nullable();
            $table->text('description')->nullable();
            $table->string('duration')->nullable();
            $table->integer('number_of_performers')->nullable();
            $table->text('directors')->nullable();
            $table->text('performers')->nullable();
            $table->text('musicians_or_narrators')->nullable();
            $table->integer('number_of_musicians')->nullable();
            $table->text('opening_scene')->nullable();
            $table->text('stage_performance')->nullable();
            $table->text('ending_scene')->nullable();
            $table->text('costume_and_props')->nullable();
            $table->text('stage_lighting')->nullable();
            $table->text('sound_type')->nullable();
            $table->integer('number_of_microphones')->nullable();
            $table->integer('number_of_amplifiers')->nullable();
            $table->text('other_specifications')->nullable();
            $table->text('sound_control')->nullable();
            $table->text('institution_representatives')->nullable();
            $table->text('faculty_and_staff')->nullable();
            $table->text('students')->nullable();
            $table->text('vehicles')->nullable();
            $table->date('arrival_date')->nullable();
            $table->time('arrival_time')->nullable();
            $table->date('departure_date')->nullable();
            $table->time('departure_time')->nullable();
            $table->text('accommodation')->nullable();
            $table->text('ceremony_and_reception_details')->nullable();
            $table->integer('number_of_institution_heads')->nullable();
            $table->integer('number_of_faculty_and_staff')->nullable();
            $table->integer('number_of_students')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performances');
    }
};
