<?php

namespace App\Policies;

use App\Models\CriteriaLevel;
use App\Models\Rubric;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CriteriaLevelPolicy
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
     * @param  \App\Models\CriteriaLevel  $criteriaLevel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CriteriaLevel $criteriaLevel)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, Rubric $rubric)
    {
        return $user->id === $rubric->assignmentPlan->syllabus->creator_user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CriteriaLevel  $criteriaLevel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CriteriaLevel $criteriaLevel)
    {
        return $user->id === $criteriaLevel->criteria->rubric->assignmentPlan->syllabus->creator_user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CriteriaLevel  $criteriaLevel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, CriteriaLevel $criteriaLevel)
    {
        return $user->id === $criteriaLevel->criteria->rubric->assignmentPlan->syllabus->creator_user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CriteriaLevel  $criteriaLevel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CriteriaLevel $criteriaLevel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CriteriaLevel  $criteriaLevel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CriteriaLevel $criteriaLevel)
    {
        //
    }
}
