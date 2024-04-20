<?php

namespace App\Http\Services\role_user;

use App\Models\Role;
use App\Models\User;

class RoleUserService
{
    public function create($userId, $roleId)
    {
        $user = User::find($userId);
        $role = Role::find($roleId);

        if ($user && $role) {
            $user->roles()->attach($roleId);
            return true;
        }

        return false;
    }

    public function update($userId, $roleId)
    {
        $user = User::find($userId);
        $role = Role::find($roleId);

        if ($user && $role) {
            $user->roles()->sync([$roleId]);
            return true;
        }

        return false;
    }

    public function delete($userId, $roleId)
    {
        $user = User::find($userId);
        $role = Role::find($roleId);

        if ($user && $role) {
            $user->roles()->detach($roleId);
            return true;
        }

        return false;
    }
}
