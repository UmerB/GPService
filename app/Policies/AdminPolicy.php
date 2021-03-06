<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\AdminController;
use App\Models\User;
use App\Models\RequestPrescription;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */

    public function store(User $user, RequestPrescription $requestPrescription)
    {
        
        return $user->is_admin === 1;
                    
    } 

    public function viewAny(User $user)
    {
        if($user->is_admin==1 || Auth::user()->is_admin==1)
        {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AdminController  $adminController
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, RequestPrescription $requestPrescription)
    {
        return $user->is_admin === 1
                    ? Response::allow()
                    : Response::deny('You are not admin!');
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
     * @param  \App\Models\AdminController  $adminController
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AdminController $adminController)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AdminController  $adminController
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AdminController $adminController)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AdminController  $adminController
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AdminController $adminController)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AdminController  $adminController
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AdminController $adminController)
    {
        //
    }
}
