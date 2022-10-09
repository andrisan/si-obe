<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\AssignmentPlan;
use App\Models\AssignmentPlanTask;
use App\Models\Course;
use App\Models\CourseClass;
use App\Models\CourseLearningOutcome;
use App\Models\Criterion;
use App\Models\CriterionLevel;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\GradingPlan;
use App\Models\IntendedLearningOutcome;
use App\Models\LearningPlan;
use App\Models\LessonLearningOutcome;
use App\Models\Rubric;
use App\Models\StudentGrade;
use App\Models\StudentInfo;
use App\Models\StudyProgram;
use App\Models\Syllabus;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class FakeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TruncateAllTables::class);

        $admin = User::factory()->create([
            'email' => 'admin@siobe.com',
            'name' => 'Admin',
        ]);

        Faculty::factory(1)->create()->each(function ($faculty) use ($admin) {
            Department::factory(1)->create([
                'faculty_id' => $faculty->id
            ])->each(function ($department) use ($admin) {
                StudyProgram::factory(1)->create([
                    'department_id' => $department->id
                ])->each(function ($study_program) use ($admin) {
                    $teachers = User::factory(5)->create();

                    // Create Syllabus, ILO, CLO, and LLO for each course
                    Course::factory(1)->create([
                        'study_program_id' => $study_program->id,
                        'creator_user_id' => $admin->id,
                    ])->each(function ($course) use ($teachers) {
                        Syllabus::factory(1)->create([
                            'course_id' => $course->id,
                        ])->each(function ($syllabus) {
                            $nIntendedOutcome = 5;
                            $ilos = IntendedLearningOutcome::factory($nIntendedOutcome)->create([
                                'syllabus_id' => $syllabus->id,
                            ]);

                            $nCourseOutcome = 6;
                            $courceOutcomeMap = $this->rangeWithN(0, count($ilos) - 1, $nCourseOutcome);
                            $clos = array();
                            foreach ($courceOutcomeMap as $idx) {
                                $clos[] = CourseLearningOutcome::factory()->create([
                                    'ilo_id' => $ilos[$idx]->id,
                                ]);
                            }

                            $nLessonOutcome = 10;
                            $lessonOutcomeMap = $this->rangeWithN(0, count($clos) - 1, $nLessonOutcome);
                            $llos = array();
                            foreach ($lessonOutcomeMap as $idx) {
                                $llos[] = LessonLearningOutcome::factory()->create([
                                    'clo_id' => $clos[$idx]->id,
                                ]);
                            }
                            // convert array to laravel collection
                            $llos = collect($llos);

                            $nLearningPlan = 16;
                            $learningPlanMap = $this->rangeWithN(0, count($llos) - 1, $nLearningPlan);
                            $learningPlans = array();
                            foreach ($learningPlanMap as $idx) {
                                $learningPlans[] = LearningPlan::factory()->create([
                                    'syllabus_id' => $syllabus->id,
                                    'llo_id' => $llos[$idx]->id,
                                ]);
                            }
                            $learningPlans = collect($learningPlans);

                            $numberOfAssignments = 8;
                            $learningPlanIdx = 0;
                            AssignmentPlan::factory($numberOfAssignments)->create([
                                'syllabus_id' => $syllabus->id,
                            ])->each(function ($assignmentPlan) use ($learningPlans, &$learningPlanIdx, $numberOfAssignments) {
                                $numberOfAssignmentPlanTasks = 2;
                                $assignmentPlanTasks = AssignmentPlanTask::factory($numberOfAssignmentPlanTasks)->create([
                                    'assignment_plan_id' => $assignmentPlan->id,
                                ]);

                                $rubric = Rubric::factory()->create([
                                    'assignment_plan_id' => $assignmentPlan->id,
                                ]);

                                $numberOfAssignmentPlanTasks = count($assignmentPlanTasks);
                                $criterionMaxPoint = 100/$numberOfAssignments;
                                $criterionMaxPoint /= $numberOfAssignmentPlanTasks;

                                foreach ($assignmentPlanTasks as $assignmentPlanTask) {
                                    GradingPlan::factory()->create([
                                        'learning_plan_id' => $learningPlans[$learningPlanIdx]->id,
                                        'assignment_plan_task_id' => $assignmentPlanTask->id,
                                    ]);

                                    $criterion = Criterion::factory()->create([
                                        'rubric_id' => $rubric->id,
                                        'llo_id' => $learningPlans[$learningPlanIdx]->llo_id,
                                        'max_point' => $criterionMaxPoint,
                                    ]);

                                    $point = range($criterionMaxPoint, 1);
                                    foreach ($point as $p) {
                                        CriterionLevel::factory(1)->create([
                                            'criterion_id' => $criterion->id,
                                            'point' => $p,
                                        ]);
                                    }

                                    // assign each criterion to an assignment task
                                    $assignmentPlanTask->criterion_id = $criterion->id;
                                    $assignmentPlanTask->save();
                                    $learningPlanIdx++;
                                }
                            });
                        }); // END Syllabus

                        CourseClass::factory(2)->create([
                            'course_id' => $course->id,
                            'creator_user_id' => $teachers->random(1)->first()->id
                        ])->each(function ($course_class) use ($course, $teachers) {
                            $studentsJoinThisClass = User::factory(rand(30, 40))->create()
                                ->each(function ($student) {
                                    StudentInfo::factory()->create([
                                        'id' => $student->id
                                    ]);
                                });

                            $course_class->students()->attach($studentsJoinThisClass);

                            $assignmentPlans = $course->syllabuses->first()->assignmentPlans;
                            // 1/3 of students have good grade
                            $studentWithGoodGrade = $studentsJoinThisClass
                                ->random(count($studentsJoinThisClass) / 3)
                                ->all();

                            foreach ($assignmentPlans as $assignmentPlan) {
                                $assignment = Assignment::factory()->create([
                                    'assignment_plan_id' => $assignmentPlan->id,
                                    'course_class_id' => $course_class->id,
                                ]);

                                $assignmentPlanTasks = $assignmentPlan->assignmentPlanTasks;

                                foreach ($studentsJoinThisClass as $student){
                                    foreach ($assignmentPlanTasks as $assignmentPlanTask) {
                                        $criterion = $assignmentPlanTask->criterion;
                                        $criterionLevels = $criterion->criterionLevels;

                                        if (in_array($student, $studentWithGoodGrade)) {
                                            $criterionLevel = $criterionLevels->get(rand(0, 1));
                                        } else {
                                            $criterionLevel = $criterionLevels->random(1)->first();
                                        }

                                        StudentGrade::factory(1)->create([
                                            'student_user_id' => $student->id,
                                            'assignment_id' => $assignment->id,
                                            'assignment_plan_task_id' => $assignmentPlanTask->criterion_id,
                                            'criterion_level_id' => $criterionLevel->id,
                                        ]);
                                    }
                                }
                            }
                        });
                    }); // END Course
                });
            });
        });
    }

    private function rangeWithN($min, $max, $n) {
        $arr = range($min, $max, 1);
        $lessNumber = $n - $max;
        for ($i=0;$i<$lessNumber-1;$i++) {
            $addIdx = random_int(1, count($arr) - 1);
            array_splice( $arr, $addIdx, 0, $arr[$addIdx] );
        }
        return $arr;
    }
}
