<?php

namespace App\Policies;

use App\Models\IntendedLearningOutcome;
use App\Models\Syllabus;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IntendedLearningOutcomePolicy
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
     * @param  \App\Models\IntendedLearningOutcome  $intendedLearningOutcome
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, IntendedLearningOutcome $intendedLearningOutcome)
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
        // only owner of the syllabus can create ilo
        return $user->id === $syllabus->creator_user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\IntendedLearningOutcome  $intendedLearningOutcome
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, IntendedLearningOutcome $intendedLearningOutcome)
    {
        // only owner of the syllabus can update ilo
        return $user->id === $intendedLearningOutcome->syllabus->creator_user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\IntendedLearningOutcome  $intendedLearningOutcome
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, IntendedLearningOutcome $intendedLearningOutcome)
    {
        // only owner of the syllabus can delete ilo
        return $user->id === $intendedLearningOutcome->syllabus->creator_user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\IntendedLearningOutcome  $intendedLearningOutcome
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, IntendedLearningOutcome $intendedLearningOutcome)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\IntendedLearningOutcome  $intendedLearningOutcome
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, IntendedLearningOutcome $intendedLearningOutcome)
    {
        //
    }
}
