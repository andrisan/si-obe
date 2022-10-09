<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ('student_info', function (Blueprint $table){
            $table->foreignId('id')->primary()->constrained('users');
            $table->string('student_id_number')->nullable();
        });

        Schema::create('faculty', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
        });

        Schema::create('department', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id')->constrained('faculty');
            $table->string('name')->nullable();
        });

        Schema::create('study_program', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('department');
            $table->string('name');
        });

        Schema::create('course', function (Blueprint $table) {
            $table->id();
            $table->foreignId('study_program_id')->constrained('study_program');
            $table->foreignId('creator_user_id')->constrained('users');
            $table->string('name')->nullable();
            $table->string('code')->unique()->nullable();
            $table->integer('course_credit')->nullable();
            $table->integer('lab_credit')->nullable();
            $table->enum('type', array('mandatory', 'elective'))->nullable();
            $table->text('short_description')->nullable();
            $table->string('minimal_requirement', 1024)->nullable();
            $table->text('study_material_summary')->nullable();
            $table->text('learning_media')->nullable();
            $table->timestampsTz();
        });

        Schema::create('syllabus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('course');
            $table->string('title');
            $table->text('author')->nullable();
            $table->string('head_of_study_program', 512)->nullable();
        });

        Schema::create('intended_learning_outcome', function (Blueprint $table) {
            $table->id();
            $table->foreignId('syllabus_id')->constrained('syllabus');
            $table->integer('position')->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('course_learning_outcome', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ilo_id')->constrained('intended_learning_outcome');
            $table->integer('position')->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('lesson_learning_outcome', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clo_id')->constrained('course_learning_outcome');
            $table->integer('position')->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('learning_plan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('syllabus_id')->constrained('syllabus');
            $table->integer('week_number')->nullable();
            $table->foreignId('llo_id')->constrained('lesson_learning_outcome');
            $table->text('study_material')->nullable();
            $table->text('learning_method')->nullable();
            $table->string('estimated_time',1024)->nullable();
            $table->timestampsTz();
        });

        Schema::create('assignment_plan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('syllabus_id')->constrained('syllabus');
            $table->text('objective')->nullable();
            $table->string('title', 2048)->nullable();
            $table->boolean('is_group_assignment')->nullable();
            $table->string('assignment_style', 1024)->nullable();
            $table->text('description')->nullable();
            $table->text('output_instruction')->nullable();
            $table->text('submission_instruction')->nullable();
            $table->text('deadline_instruction')->nullable();
            $table->timestampsTz();
        });

        Schema::create('rubric', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_plan_id')->constrained('assignment_plan');
            $table->string('title',1024);
            $table->timestampsTz();
        });

        Schema::create('criterion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rubric_id')->constrained('rubric');
            $table->foreignId('llo_id')->constrained('lesson_learning_outcome');
            $table->string('title', 1024)->nullable();
            $table->string('description', 1024)->nullable();
            $table->float('max_point')->nullable();
            $table->timestampsTz();
        });

        Schema::create('criterion_level', function (Blueprint $table) {
            $table->id();
            $table->foreignId('criterion_id')->constrained('criterion');
            $table->float('point');
            $table->string('title', 1024)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('assignment_plan_task', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_plan_id')->constrained('assignment_plan');
            $table->foreignId('criterion_id')->nullable()->constrained('criterion');
            $table->string('code', 512);
            $table->text('description');
        });

        Schema::create('grading_plan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('learning_plan_id')->constrained('learning_plan');
            $table->foreignId('assignment_plan_task_id')->constrained('assignment_plan_task');
        });

        Schema::create('course_class', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('course');
            $table->string('name', 1024);
            $table->string('thumbnail_img', 1024)->nullable();
            $table->string('class_code', 256)->nullable();
            $table->foreignId('creator_user_id')->constrained('users');
            $table->timestampsTz();
        });

        Schema::create('join_class', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_class_id')->constrained('course_class');
            $table->foreignId('student_user_id')->constrained('users');
        });

        Schema::create('assignment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_plan_id')->constrained('assignment_plan');
            $table->foreignId('course_class_id')->constrained('course_class');
            $table->timestamp('assigned_date')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->text('note')->nullable();
        });

        Schema::create('student_grade', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_user_id')->constrained('users');
            $table->foreignId('assignment_id')->constrained('assignment');
            $table->foreignId('assignment_plan_task_id')->constrained('assignment_plan_task');
            $table->foreignId('criterion_level_id')->constrained('criterion_level');
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_grade');
        Schema::dropIfExists('assignment');
        Schema::dropIfExists('join_class');
        Schema::dropIfExists('course_class');
        Schema::dropIfExists('grading_plan');
        Schema::dropIfExists('assignment_plan_task');
        Schema::dropIfExists('criterion_level');
        Schema::dropIfExists('criterion');
        Schema::dropIfExists('rubric');
        Schema::dropIfExists('assignment_plan');
        Schema::dropIfExists('learning_plan');
        Schema::dropIfExists('lesson_learning_outcome');
        Schema::dropIfExists('course_learning_outcome');
        Schema::dropIfExists('intended_learning_outcome');
        Schema::dropIfExists('syllabus');
        Schema::dropIfExists('course');
        Schema::dropIfExists('study_program');
        Schema::dropIfExists('department');
        Schema::dropIfExists('faculty');
        Schema::dropIfExists('student_info');
    }
};
