<?php

namespace App\Policies;

use App\Models\CourseLearningOutcome;
use App\Models\Syllabus;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CourseLearningOutcomePolicy
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
     * @param  \App\Models\CourseLearningOutcome  $courseLearningOutcome
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CourseLearningOutcome $courseLearningOutcome)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, Syllabus $syllabus)
    {
        return $user->id === $syllabus->creator_user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseLearningOutcome  $courseLearningOutcome
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CourseLearningOutcome $courseLearningOutcome)
    {
        return $user->id === $courseLearningOutcome->syllabus->creator_user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseLearningOutcome  $courseLearningOutcome
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, CourseLearningOutcome $courseLearningOutcome)
    {
        return $user->id === $courseLearningOutcome->syllabus->creator_user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseLearningOutcome  $courseLearningOutcome
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CourseLearningOutcome $courseLearningOutcome)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseLearningOutcome  $courseLearningOutcome
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CourseLearningOutcome $courseLearningOutcome)
    {
        //
    }
}
