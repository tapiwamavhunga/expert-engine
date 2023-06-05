<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\UserEmegencyContact;

class UserEmegencyContactPolicy {
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user) {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, UserEmegencyContact $userEmegencyContact) {
        return ($user->id > 0) && ($userEmegencyContact->user_id == $user->id);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user) {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, UserEmegencyContact $userEmegencyContact) {
        return ($user->id > 0) && ($userEmegencyContact->user_id == $user->id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, UserEmegencyContact $userEmegencyContact) {
        return ($user->id > 0) && ($userEmegencyContact->user_id == $user->id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, UserEmegencyContact $userEmegencyContact) {
        return ($user->id > 0) && ($userEmegencyContact->user_id == $user->id);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, UserEmegencyContact $userEmegencyContact) {
        return ($user->id > 0) && ($userEmegencyContact->user_id == $user->id);
    }
}
