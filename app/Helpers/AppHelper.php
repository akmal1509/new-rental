<?php

namespace App\Helpers;

use App\Http\Requests\Auth;
use App\Models\CustomLog;
use App\Models\Menu;
use Illuminate\Support\Facades\Request;

class AppHelper
{
    // public static function setActive($route)
    // {
    //     if (is_array($route)) {
    //         return in_array(Request::path(), $route) ? 'active' : '';
    //     }
    //     return Request::path() == $route ? 'active' : '';
    // }

    public static function getMenus()
    {
        return Menu::with('subMenus')->whereNull('mainMenu')->orderBy('sort', 'asc')->get();
    }

    public static function getRoute()
    {
        return Menu::with('subMenus')->whereNull('mainMenu')->orderBy('sort', 'asc')->get();
        // return Menu::with('subMenus')->whereNotIn('slug', ['dashboard'])->whereNull('mainMenu')->orderBy('sort', 'asc')->get();
    }

    public static function getNotif()
    {
        return CustomLog::whereHas('userNotif')->count();
    }

    public static function isAuth()
    {
        if (Auth::check()) {
            return true;
        }
    }
}
