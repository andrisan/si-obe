<?php

namespace App\Policies;

use App\Models\StudyProgram;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudyProgramPolicy
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
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StudyProgram  $studyProgram
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, StudyProgram $studyProgram)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StudyProgram  $studyProgram
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, StudyProgram $studyProgram)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StudyProgram  $studyProgram
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, StudyProgram $studyProgram)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StudyProgram  $studyProgram
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, StudyProgram $studyProgram)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StudyProgram  $studyProgram
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, StudyProgram $studyProgram)
    {
        //
    }
}
