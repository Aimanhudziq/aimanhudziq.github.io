<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [
        //
        'maintenance',
        'site/shutdown',
        'site/up',

        //admin
        'admin_dashboard',
        'forgot_passwordAdmin',
        'admin_user_list',
        'admin_admin_list',
        'add_new_user',
        'admin_policy_list',
        'add_new_policy',
        'assign_bank_to_staff',
        'admin_user_bank_list',
        'changeStatus',
        '/',
        'logout'
    ];
}
