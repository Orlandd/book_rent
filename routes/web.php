<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\UserController;
use App\Models\RentLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::middleware('only_guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticating']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registerProcess']);
});

Route::resource('/books', BookController::class);

Route::get('/auth/redirect', [SocialiteController::class, 'redirect']);
Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);



Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    // Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['only_admin']);
    Route::resource('/profile', UserController::class);


    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->middleware('only_admin');

    // Route::get('/dashboard/rentLogs', function () {
    //     return view('dashboard.rentLogs.index', [
    //         'logs' => RentLog::all()
    //     ]);
    // });

    Route::resource('/dashboard/rentLogs', RentLogController::class)->middleware('only_admin');

    Route::resource('/rentLogs', RentLogController::class);

    Route::resource('/dashboard/books', BookController::class)->middleware('only_admin');

    Route::resource('/dashboard/users', UserController::class)->middleware('only_admin');

    Route::resource('/rentLogs', RentLogController::class);

    Route::get('/dashboard/logout', [AuthController::class, 'logout'])->middleware('only_admin');
});
