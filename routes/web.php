<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', function()
{
    return 'Users!';
});

Route::get('test/index', [TestController::class, 'index']);

Route::post('test/store', [TestController::class, 'store'])->name('test-store');

Route::group(['as' => 'authentication.'], function () {
    Route::prefix('login')->group(function () {
        Route::get('', [AuthenticateController::class, 'index'])->name('login');
        Route::post('', [AuthenticateController::class, 'authenticate'])->name('login');
    });

    Route::get('logout', [AuthenticateController::class, 'logout'])->name('logout');
});

Route::group(['as' => ''], function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
});

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/users', function () {
        // Matches the URL '/admin/users'
        return 'Admin Users';
    });

    Route::get('/settings', function () {
        // Matches the URL '/admin/settings'
        return 'Admin Settings';
    });
});
