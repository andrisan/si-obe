<?php

use App\Models\CourseLearningOutcome;
use App\Models\IntendedLearningOutcome;
use App\Models\Syllabus;
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
        Schema::table('intended_learning_outcomes', function (Blueprint $table) {
            $table->string('code')->nullable();
        });
        Schema::table('course_learning_outcomes', function (Blueprint $table) {
            $table->string('code')->nullable();
            $table->foreignId('syllabus_id')->nullable()->constrained('syllabi');
            $table->unsignedBigInteger('ilo_id')->nullable()->change();
        });
        Schema::table('lesson_learning_outcomes', function (Blueprint $table) {
            $table->string('code')->nullable();
            $table->foreignId('syllabus_id')->nullable()->constrained('syllabi');
            $table->unsignedBigInteger('clo_id')->nullable()->change();
        });
        $ilos = IntendedLearningOutcome::with('syllabus',
            'courseLearningOutcomes', 'courseLearningOutcomes.lessonLearningOutcomes')->get();
        foreach ($ilos as $ilo) {
            $syllabus = $ilo->syllabus;
            $clos = $ilo->courseLearningOutcomes;
            foreach ($clos as $clo) {
                if ($clo->syllabus_id === null) {
                    $clo->syllabus_id = $syllabus->id;
                    $clo->save();
                }

                $llos = $clo->lessonLearningOutcomes;
                foreach ($llos as $llo) {
                    if ($llo->syllabus_id === null) {
                        $llo->syllabus_id = $syllabus->id;
                        $llo->save();
                    }
                }
            }
        }
        Schema::table('course_learning_outcomes', function (Blueprint $table) {
            $table->unsignedBigInteger('syllabus_id')->nullable(false)->change();
        });
        Schema::table('lesson_learning_outcomes', function (Blueprint $table) {
            $table->unsignedBigInteger('syllabus_id')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
