<?php

namespace App\Policies;

use App\Models\Assignment;
use App\Models\CourseClass;
use App\Models\StudentGrade;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class StudentGradePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @param CourseClass $courseClass
     * @return bool
     */
    public function viewAny(User $user, CourseClass $courseClass)
    {
        return $user->role == "teacher" && $user->id == $courseClass->creator_user_id;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param StudentGrade $studentGrade
     * @return void
     */
    public function view(User $user, StudentGrade $studentGrade)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @param Assignment $assignment
     * @param User $student
     * @return bool
     */
    public function create(User $user, Assignment $assignment, User $student)
    {
        $courseClass = $assignment->courseClass;

        // check if student is in the class
        $isStudentInClass = $courseClass->students->contains($student);
        if (!$isStudentInClass) {
            return false;
        }

        return $user->role == "teacher" && $user->id == $courseClass->creator_user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Assignment $assignment
     * @param User $student
     * @return bool
     */
    public function update(User $user, Assignment $assignment, User $student)
    {
        $courseClass = $assignment->courseClass;

        // check if student is in the class
        $isStudentInClass = $courseClass->students->contains($student);
        if (!$isStudentInClass) {
            return false;
        }

        return $user->role == "teacher" && $user->id == $courseClass->creator_user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Assignment $assignment
     * @param User $student
     * @return bool
     */
    public function delete(User $user, Assignment $assignment, User $student)
    {
        $courseClass = $assignment->courseClass;

        // check if student is in the class
        $isStudentInClass = $courseClass->students->contains($student);
        if (!$isStudentInClass) {
            return false;
        }

        return $user->role == "teacher" && $user->id == $courseClass->creator_user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param StudentGrade $studentGrade
     * @return Response|bool
     */
    public function restore(User $user, StudentGrade $studentGrade)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param StudentGrade $studentGrade
     * @return Response|bool
     */
    public function forceDelete(User $user, StudentGrade $studentGrade)
    {
        //
    }
}
