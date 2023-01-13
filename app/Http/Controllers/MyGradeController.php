<?php

namespace App\Http\Controllers;

use App\Models\CourseClass;
use App\Models\StudentGrade;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyGradeController extends Controller
{
    public function index(){
        $user = User::findOrfail(Auth::user()->id);
        $allGradesForCurrentUser = StudentGrade::select('assignments.course_class_id', 'assignments.id',
            DB::raw('SUM(criteria_levels.point) as point'))
            ->join('student_grade_details', 'student_grade_details.student_grade_id', '=', 'student_grades.id')
            ->join('assignments', 'student_grades.assignment_id', '=', 'assignments.id')
            ->join('criteria_levels', 'student_grade_details.criteria_level_id', '=', 'criteria_levels.id')
            ->groupBy('assignments.course_class_id', 'assignments.id')
            ->where('student_user_id', $user->id)
            ->get();

        $userClasses = $user->joinedClasses()->get();
        foreach ($userClasses as $userClass){
            $courseAssignmentGrades = $allGradesForCurrentUser->filter(function ($grade) use ($userClass) {
                return $grade->course_class_id == $userClass->id;
            });
            $gradedAssignmentCount = $courseAssignmentGrades->count();
            $totalAssignmentCount = $userClass->assignments()->count();
            $userClass->gradingProgress = $gradedAssignmentCount / $totalAssignmentCount * 100;
            $userClass->grade = $courseAssignmentGrades->sum('point');
            $userClass->letterGrade = $this->_getLetterGrade($userClass->grade);
        }

        return view('mygrade.index', compact('userClasses'));
    }

    public function show(CourseClass $courseClass){

        $courseClass->load('assignments');

        $studentGrades = StudentGrade::where('student_user_id', Auth::user()->id)
            ->with(['assignment' => function ($query) use ($courseClass) {
                $query->with('assignmentPlan.assignmentPlanTasks.criteria')
                    ->where('course_class_id', $courseClass->id);
            }])
            ->with('studentGradeDetails.criteriaLevel.criteria.lessonLearningOutcome.courseLearningOutcome')
            ->orderBy('assignment_id', 'asc')
            ->get();

        // Assignments Grades
        $assignmentGrades = $courseClass->assignments->map(function ($assignment) use ($studentGrades) {
            $studentGrade = $studentGrades->firstWhere('assignment_id', $assignment->id);
            if ($studentGrade) {
                $assignment->isGraded = true;
                $assignment->collectedPoints = $studentGrade->studentGradeDetails->sum('criteriaLevel.point');
                $assignment->maxPoints = $assignment->assignmentPlan->assignmentPlanTasks->sum('criteria.max_point');
            } else {
                $assignment->isGraded = false;
                $assignment->collectedPoints = 0;
            }

            return $assignment;
        });

        // LLOs
        $studentGradeDetails = $studentGrades->map(function ($studentGrade) {
            return $studentGrade->studentGradeDetails;
        })->flatten();

        $lessonLearningOutcomes = $courseClass->syllabus->lessonLearningOutcomes()->get();
        foreach ($lessonLearningOutcomes as $llo){
            $llo->collectedPoints = $studentGradeDetails->filter(function ($studentGradeDetail) use ($llo) {
                return $studentGradeDetail->criteriaLevel->criteria->lessonLearningOutcome->id == $llo->id;
            })->sum('criteriaLevel.point');

            $llo->maxPoint = $llo->criterias()->sum('max_point');
        }

        // CLOs
        $courseLearningOutcomes = $courseClass->syllabus->courseLearningOutcomes()->get();
        foreach ($courseLearningOutcomes as $clo){
            $clo->collectedPoints = $studentGradeDetails->filter(function ($studentGradeDetail) use ($clo) {
                return $studentGradeDetail->criteriaLevel->criteria->lessonLearningOutcome->clo_id == $clo->id;
            })->sum('criteriaLevel.point');

            $aggregatedCriteriaMaxPointForLLOs = $clo->lessonLearningOutcomes()
                ->withSum('criterias', 'max_point')->get();

            $clo->maxPoint = $aggregatedCriteriaMaxPointForLLOs->sum('criterias_sum_max_point');
        }

        // ILOs
        $intendedLearningOutcomes = $courseClass->syllabus->intendedLearningOutcomes()->get();
        foreach ($intendedLearningOutcomes as $ilo){
            $ilo->collectedPoints = $studentGradeDetails->filter(function ($studentGradeDetail) use ($ilo) {
                return $studentGradeDetail->criteriaLevel->criteria->lessonLearningOutcome->courseLearningOutcome->ilo_id == $ilo->id;
            })->sum('criteriaLevel.point');

            $aggregatedCriteriaMaxpointForCLOs = $ilo->courseLearningOutcomes()->
                with(['lessonLearningOutcomes' => function ($query) {
                    $query->withSum('criterias', 'max_point');
                }])->get();

            $ilo->maxPoint = $aggregatedCriteriaMaxpointForCLOs->map(function ($clo) {
                return $clo->lessonLearningOutcomes->sum('criterias_sum_max_point');
            })->sum();
        }

        return view('mygrade.show', [
            'courseClass' => $courseClass,
            'assignments' => $assignmentGrades,
            'lessonLearningOutcomes' => $lessonLearningOutcomes,
            'courseLearningOutcomes' => $courseLearningOutcomes,
            'intendedLearningOutcomes' => $intendedLearningOutcomes,
        ]);
    }

    public function _getLetterGrade($point)
    {
        if ($point > 80) {
            return 'A';
        } elseif ($point > 75) {
            return 'B+';
        } elseif ($point > 69) {
            return 'B';
        } elseif ($point > 60) {
            return 'C+';
        } elseif ($point > 55) {
            return 'C';
        } elseif ($point > 50) {
            return 'D+';
        } elseif ($point > 44) {
            return 'D';
        } else {
            return 'E';
        }
    }
}
