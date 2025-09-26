<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Masters\LawyerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
})->name('/');




// Guest Users
Route::middleware(['guest', 'PreventBackHistory', 'firewall.all'])->group(function () {
    Route::get('login', [App\Http\Controllers\Registeration\AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [App\Http\Controllers\Registeration\AuthController::class, 'login'])->name('signin');
    Route::get('register', [App\Http\Controllers\Registeration\AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [App\Http\Controllers\Registeration\AuthController::class, 'register'])->name('signup');
});




// Authenticated users
Route::middleware(['auth', 'PreventBackHistory', 'firewall.all'])->group(function () {

    // Auth Routes
    Route::post('logout', [App\Http\Controllers\Registeration\AuthController::class, 'Logout'])->name('logout');
    Route::get('show-change-password', [App\Http\Controllers\Registeration\AuthController::class, 'showChangePassword'])->name('show-change-password');
    Route::post('change-password', [App\Http\Controllers\Registeration\AuthController::class, 'changePassword'])->name('change-password');
    Route::get('home', fn () => redirect()->route('dashboard'))->name('home');
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    //Masters
     Route::post('lawyer/{id}/change-status', [LawyerController::class, 'changeStatus'])
    ->name('lawyer.change-status');
    Route::resource('court',App\Http\Controllers\Admin\Masters\CourtController::class);
    Route::resource('lawyer',App\Http\Controllers\Admin\Masters\LawyerController::class);

    //forms
    Route::resource('court-cases-count',App\Http\Controllers\Admin\CourtCasesCountController::class);
    // Route::get('/get-lawyers/{court_id}',[App\Http\Controllers\Admin\CourtCasesCountController::class,'getLawyers']);
    Route::get('court-cases-count/getLawyers/{id}', [App\Http\Controllers\Admin\CourtCasesCountController::class,'getLawyers'])->name('court-cases-count.get-lawyers');
    // Route::post('lawyer/{id}/change-status', [LawyerController::class,'changeStatus'])->name('lawyer.change-status');

    // Users Roles n Permissions
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::get('users/{user}/toggle', [App\Http\Controllers\Admin\UserController::class, 'toggle'])->name('users.toggle');
    Route::get('users/{user}/retire', [App\Http\Controllers\Admin\UserController::class, 'retire'])->name('users.retire');
    Route::put('users/{user}/change-password', [App\Http\Controllers\Admin\UserController::class, 'changePassword'])->name('users.change-password');
    Route::get('users/{user}/get-role', [App\Http\Controllers\Admin\UserController::class, 'getRole'])->name('users.get-role');
    Route::put('users/{user}/assign-role', [App\Http\Controllers\Admin\UserController::class, 'assignRole'])->name('users.assign-role');
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
});




Route::get('/php', function (Request $request) {
    if (!auth()->check())
        return 'Unauthorized request';

    Artisan::call($request->artisan);
    return dd(Artisan::output());
});
