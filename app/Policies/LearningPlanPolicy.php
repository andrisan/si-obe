<?php

namespace App\Policies;

use App\Models\LearningPlan;
use App\Models\Syllabus;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LearningPlanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user, Syllabus $syllabus)
    {
        return $user->id === $syllabus->creator_user_id;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LearningPlan  $learningPlan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, LearningPlan $learningPlan)
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
     * @param  \App\Models\LearningPlan  $learningPlan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, LearningPlan $learningPlan)
    {
        return $user->id === $learningPlan->syllabus->creator_user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LearningPlan  $learningPlan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, LearningPlan $learningPlan)
    {
        return $user->id === $learningPlan->syllabus->creator_user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LearningPlan  $learningPlan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, LearningPlan $learningPlan)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\LearningPlan  $learningPlan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, LearningPlan $learningPlan)
    {
        //
    }
}
