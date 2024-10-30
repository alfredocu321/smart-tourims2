<?php

if (!function_exists('hasRole')) {
    function hasRole($user, $role)
    {
        return $user->roles->contains('name', $role);
    }
}


