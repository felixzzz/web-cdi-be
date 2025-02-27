<?php

if (!function_exists('itcan')) {
    function itcan($action)
    {
        $user = auth()->user();
        if ($user->role && $user->role->is_superadmin) {
            return true;
        }

        $permission = $user->role->permissions;
        return in_array($action, $permission);
    }
}
