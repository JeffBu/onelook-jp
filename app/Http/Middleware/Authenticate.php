<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */



    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('home');
        }

        $is_admin = Auth::user()->is_admin;

        switch($is_admin)
        {
            case 1:
                return route('admin-home');
                break;
            case 0:
                return route('dashboard');
                break;
            default:
                return route('home');
                break;
        }
    }
}
