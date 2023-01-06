<?php

namespace App\Policies;

use App\Models\Syllabus;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SyllabusPolicy
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
        // let middleware handle this
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Syllabus $sylabus
     * @return Response|bool
     */
    public function view(User $user, Syllabus $sylabus)
    {
        // only creator can view
        return $user->id === $sylabus->creator_user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        // let middleware handle this
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Syllabus $sylabus
     * @return Response|bool
     */
    public function update(User $user, Syllabus $sylabus)
    {
        // only creator can update
        return $user->id === $sylabus->creator_user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Syllabus $sylabus
     * @return Response|bool
     */
    public function delete(User $user, Syllabus $sylabus)
    {
        // only creator can delete
        return $user->id === $sylabus->creator_user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Syllabus $sylabus
     * @return Response|bool
     */
    public function restore(User $user, Syllabus $sylabus)
    {
        // only creator can restore
        return $user->id === $sylabus->creator_user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Syllabus $sylabus
     * @return Response|bool
     */
    public function forceDelete(User $user, Syllabus $sylabus)
    {
        //
    }
}
