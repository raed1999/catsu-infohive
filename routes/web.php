<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Dean\DeanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Clerk\ClerkController;
use App\Http\Controllers\Student\ResearchController;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Route::name('auth.')->group(function () {

    /**
     * Display login page
     */
    Route::view('/', 'auth.login')->name('login')
        ->middleware('prevent.if.logged.in');

    /**
     * Route for login process
     */
    Route::post('/login', [LoginController::class, 'authenticate'])
        ->name('login-process');


    /**
     * Logout
     */
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware(['use.faculty.guard','use.student.guard']);


    Route::view('/register', 'auth.register')->name('register');
});


/**
 *  Admin Routes
 */
Route::prefix('a')
    ->name('admin.')
    ->middleware(['is.logged.in','use.faculty.guard'])
    ->group(function () {
        Route::resource('/manage-dean', AdminController::class)->withTrashed();
        Route::delete('/manage-dean/{manage_dean}/restore', [AdminController::class, 'restore'])->withTrashed(['show'])->name('manage-dean.restore');
    });

/**
 * Dean Routes
 */
Route::prefix('d')
    ->name('dean.')
    ->middleware(['is.logged.in','use.faculty.guard'])
    ->group(function () {
        Route::resource('/manage-clerk', DeanController::class)->withTrashed(['show']);
        Route::delete('/manage-clerk/{manage_clerk}/restore', [DeanController::class, 'restore'])->withTrashed(['show'])->name('manage-clerk.restore');
    });

/**
 * Clerk Routes
 */
Route::prefix('c')
    ->name('clerk.')
    ->middleware(['is.logged.in','use.faculty.guard'])
    ->group(function () {
        Route::resource('/manage-student', ClerkController::class)->withTrashed();
        Route::delete('/manage-student/{manage_student}/restore', [ClerkController::class, 'restore'])->withTrashed()->name('manage-student.restore');
        Route::put('/manage-student/{manage_student}/verify', [ClerkController::class, 'verify'])->withTrashed()->name('manage-student.verify');
        Route::put('/manage-student/{manage_student}/unverifiy', [ClerkController::class, 'unverify'])->withTrashed()->name('manage-student.unverify');
    });

/**
 * Student Routes
 */
Route::prefix('s')
    ->name('student.')
    ->middleware(['use.student.guard','is.logged.in'])
    ->group(function () {

        /* Manage Account */
        Route::resource('/manage-account', StudentController::class)->except(['store'])->withTrashed();
        Route::resource('/manage-account', StudentController::class)->only(['store'])->withoutMiddleware('is.logged.in')->withTrashed();
        Route::delete('/manage-account/{manage_student}/restore', [StudentController::class, 'restore'])->name('manage-account.restore');
        Route::post('/manage-account/{manage_student}/avatar', [StudentController::class, 'avatar'])->name('manage-account.avatar');
        Route::view('/verification', 'student.unverified')->name('verification');

        /* Dashboard */
        Route::view('/d','student.dashboard.index')->name('dashboard.index');

        /* Research */
        Route::resource('/research', ResearchController::class);
        Route::get('/research/load-students',[ResearchController::class, 'loadStudents'])->name('research.load-students');
    });
