<?php

namespace App\Policies;

use App\Models\AssignmentPlan;
use App\Models\AssignmentPlanTask;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssignmentPlanTaskPolicy
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
     * @param  \App\Models\AssignmentPlanTask  $assignmentPlanTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AssignmentPlanTask $assignmentPlanTask)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, AssignmentPlan $assignmentPlan)
    {
        return $user->id === $assignmentPlan->syllabus->creator_user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AssignmentPlanTask  $assignmentPlanTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AssignmentPlanTask $assignmentPlanTask)
    {
        return $user->id === $assignmentPlanTask->assignmentPlan->syllabus->creator_user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AssignmentPlanTask  $assignmentPlanTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AssignmentPlanTask $assignmentPlanTask)
    {
        $syllabus = $assignmentPlanTask->assignmentPlan->syllabus ?? null;
        if (empty($syllabus)) {
            return false;
        }

        return $user->id === $syllabus->creator_user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AssignmentPlanTask  $assignmentPlanTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AssignmentPlanTask $assignmentPlanTask)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AssignmentPlanTask  $assignmentPlanTask
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AssignmentPlanTask $assignmentPlanTask)
    {
        //
    }
}
