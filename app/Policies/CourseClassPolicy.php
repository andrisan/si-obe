<?php

namespace App\Policies;

use App\Models\CourseClass;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CourseClassPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param CourseClass $courseClass
     * @return Response|bool
     */
    public function view(User $user, CourseClass $courseClass)
    {
        // if user haven't joined the class, return false
        if ($user->role == "student" && !$user->joinedClasses()->where('course_class_id', $courseClass->id)->exists()) {
            return false;
        }

        // if user is not the creator of the class, return false
        if ($user->role == "teacher" && $user->id != $courseClass->creator_user_id) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        // if user is not a teacher, return false
        if ($user->role != "teacher" && $user->role != "admin") {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param CourseClass $courseClass
     * @return Response|bool
     */
    public function update(User $user, CourseClass $courseClass)
    {
        if ($user->role != "teacher" && $user->role != "admin") {
            return false;
        }

        if ($user->id != $courseClass->creator_user_id) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param CourseClass $courseClass
     * @return bool
     */
    public function delete(User $user, CourseClass $courseClass)
    {
        if ($user->role != "teacher" && $user->role != "admin") {
            return false;
        }

        return $user->id == $courseClass->creator_user_id;
    }

    /**
     * @param User $user
     * @param CourseClass $courseClass
     * @return bool
     */
    public function removeStudent(User $user, CourseClass $courseClass)
    {
        if ($user->role != "teacher" && $user->role != "admin") {
            return false;
        }

        return $user->id == $courseClass->creator_user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param CourseClass $courseClass
     * @return Response|bool
     */
    public function restore(User $user, CourseClass $courseClass)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param CourseClass $courseClass
     * @return Response|bool
     */
    public function forceDelete(User $user, CourseClass $courseClass)
    {
        //
    }
}
