<?php

namespace App\Policies;

use App\Models\Assignment;
use App\Models\CourseClass;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssignmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Assignment $assignment)
    {
        // if user haven't joined the class, return false
        if ($user->role == "student") {
            return $user->joinedClasses()->where('course_class_id', $assignment->course_class_id)->exists();
        }

        // if user is not the creator of the class, return false
        if ($user->role == "teacher") {
            return $user->id == $assignment->courseClass->creator_user_id;
        }

        if ($user->role == "admin") {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, CourseClass $courseClass)
    {
        // if user is not the creator of the class, return false
        if ($user->role == "teacher") {
            return $user->id == $courseClass->creator_user_id;
        }

        if ($user->role == "admin") {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Assignment $assignment)
    {
        // if user is not the creator of the class, return false
        if ($user->role == "teacher") {
            return $user->id == $assignment->courseClass->creator_user_id;
        }

        if ($user->role == "admin") {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Assignment $assignment)
    {
        // if user is not the creator of the class, return false
        if ($user->role == "teacher") {
            return $user->id == $assignment->courseClass->creator_user_id;
        }

        if ($user->role == "admin") {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Assignment $assignment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Assignment $assignment)
    {
        //
    }
}
