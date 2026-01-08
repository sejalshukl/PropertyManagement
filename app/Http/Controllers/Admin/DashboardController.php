<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{

    public function index()
    {
        $totalProperties = \App\Models\Property::count();
        $availableProperties = \App\Models\Property::where('status', 1)->count();
        $soldProperties = \App\Models\Property::where('status', 0)->count();

        return view('admin.dashboard', compact('totalProperties', 'availableProperties', 'soldProperties'));
    }

    public function changeThemeMode()
    {
        $mode = request()->cookie('theme-mode');

        if ($mode == 'dark')
            Cookie::queue('theme-mode', 'light', 43800);
        else
            Cookie::queue('theme-mode', 'dark', 43800);

        return true;
    }
}
