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
        Schema::create ('student_data', function (Blueprint $table){
            $table->foreignId('id')->primary()->constrained('users');
            $table->string('student_id_number')->nullable();
        });

        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id')->constrained('faculties');
            $table->string('name')->nullable();
        });

        Schema::create('study_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('departments');
            $table->string('name');
        });

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('study_program_id')->constrained('study_programs');
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

        Schema::create('syllabi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses');
            $table->string('title');
            $table->text('author')->nullable();
            $table->string('head_of_study_program', 512)->nullable();
        });

        Schema::create('intended_learning_outcomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('syllabus_id')->constrained('syllabi');
            $table->integer('position')->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('course_learning_outcomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ilo_id')->constrained('intended_learning_outcomes');
            $table->integer('position')->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('lesson_learning_outcomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clo_id')->constrained('course_learning_outcomes');
            $table->integer('position')->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('learning_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('syllabus_id')->constrained('syllabi');
            $table->integer('week_number')->nullable();
            $table->foreignId('llo_id')->constrained('lesson_learning_outcomes');
            $table->text('study_material')->nullable();
            $table->text('learning_method')->nullable();
            $table->string('estimated_time',1024)->nullable();
            $table->timestampsTz();
        });

        Schema::create('assignment_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('syllabus_id')->constrained('syllabi');
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

        Schema::create('rubrics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_plan_id')->constrained('assignment_plans');
            $table->string('title',1024);
            $table->timestampsTz();
        });

        Schema::create('criterias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rubric_id')->constrained('rubrics');
            $table->foreignId('llo_id')->constrained('lesson_learning_outcomes');
            $table->string('title', 1024)->nullable();
            $table->string('description', 1024)->nullable();
            $table->float('max_point')->nullable();
            $table->timestampsTz();
        });

        Schema::create('criteria_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('criteria_id')->constrained('criterias');
            $table->float('point');
            $table->string('title', 1024)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('assignment_plan_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_plan_id')->constrained('assignment_plans');
            $table->foreignId('criteria_id')->nullable()->constrained('criterias');
            $table->string('code', 512);
            $table->text('description');
        });

        Schema::create('grading_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('learning_plan_id')->constrained('learning_plans');
            $table->foreignId('assignment_plan_task_id')->constrained('assignment_plan_tasks');
        });

        Schema::create('course_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses');
            $table->string('name', 1024);
            $table->string('thumbnail_img', 1024)->nullable();
            $table->string('class_code', 256)->nullable();
            $table->foreignId('creator_user_id')->constrained('users');
            $table->timestampsTz();
        });

        Schema::create('join_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_class_id')->constrained('course_classes');
            $table->foreignId('student_user_id')->constrained('users');
        });

        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_plan_id')->constrained('assignment_plans');
            $table->foreignId('course_class_id')->constrained('course_classes');
            $table->timestamp('assigned_date')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->text('note')->nullable();
        });

        Schema::create('student_grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_user_id')->constrained('users');
            $table->foreignId('assignment_id')->constrained('assignments');
            $table->foreignId('assignment_plan_task_id')->constrained('assignment_plan_tasks');
            $table->foreignId('criteria_level_id')->constrained('criteria_levels');
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
        Schema::dropIfExists('student_grades');
        Schema::dropIfExists('assignments');
        Schema::dropIfExists('join_classes');
        Schema::dropIfExists('course_classes');
        Schema::dropIfExists('grading_plans');
        Schema::dropIfExists('assignment_plan_tasks');
        Schema::dropIfExists('criteria_levels');
        Schema::dropIfExists('criterias');
        Schema::dropIfExists('rubrics');
        Schema::dropIfExists('assignment_plans');
        Schema::dropIfExists('learning_plans');
        Schema::dropIfExists('lesson_learning_outcomes');
        Schema::dropIfExists('course_learning_outcomes');
        Schema::dropIfExists('intended_learning_outcomes');
        Schema::dropIfExists('syllabi');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('study_programs');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('faculties');
        Schema::dropIfExists('student_data');
    }
};
