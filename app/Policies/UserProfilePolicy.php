<?php

namespace App\Policies;

use App\Models\User;
<<<<<<< HEAD
use App\Models\User_profile;
=======
use App\Models\UserProfile;
>>>>>>> dev
use Illuminate\Auth\Access\HandlesAuthorization;

class UserProfilePolicy
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
<<<<<<< HEAD
     * @param  \App\Models\User_profile  $userProfile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, User_profile $userProfile)
=======
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, UserProfile $userProfile)
>>>>>>> dev
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
<<<<<<< HEAD
     * @param  \App\Models\User_profile  $userProfile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User_profile $userProfile)
=======
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, UserProfile $userProfile)
>>>>>>> dev
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
<<<<<<< HEAD
     * @param  \App\Models\User_profile  $userProfile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User_profile $userProfile)
=======
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, UserProfile $userProfile)
>>>>>>> dev
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
<<<<<<< HEAD
     * @param  \App\Models\User_profile  $userProfile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User_profile $userProfile)
=======
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, UserProfile $userProfile)
>>>>>>> dev
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
<<<<<<< HEAD
     * @param  \App\Models\User_profile  $userProfile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User_profile $userProfile)
=======
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, UserProfile $userProfile)
>>>>>>> dev
    {
        //
    }
}
