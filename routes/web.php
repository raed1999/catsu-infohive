<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\AdminClerkController;
use App\Http\Controllers\Admin\AdminCollegeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminFacultyController;
use App\Http\Controllers\Admin\AdminProgramController;
use App\Http\Controllers\Admin\AdminResearchController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Dean\DeanController;
use App\Http\Controllers\Dean\DeanDashboardController;
use App\Http\Controllers\Dean\DeanProgramController;
use App\Http\Controllers\Dean\DeanResearchController;
use App\Http\Controllers\Dean\FacultyController;
use App\Http\Controllers\Dean\StudentController as DeanStudentController;
use App\Http\Controllers\Clerk\ClerkController;
use App\Http\Controllers\Clerk\ClerkDashboardController;
use App\Http\Controllers\Clerk\ClerkResearchController;
use App\Http\Controllers\Student\ResearchController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Research\ResearchController as SearchResearchController;



/**
 *  Auth Routes
 */
Route::name('auth.')->group(function () {

    Route::view('/', 'auth.login')->name('login')->middleware('prevent.if.logged.in');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login-process');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware(['use.faculty.guard', 'use.student.guard']);
    Route::view('/register', 'auth.register')->name('register');
});

Route::view('change-password', 'auth.change-password')->name('change-password');


/**
 *  Admin Routes
 */
Route::prefix('a')
    ->name('admin.')
    ->middleware(['use.faculty.guard', 'auth.session', 'is.logged.in'/* , 'change.password' */])
    ->group(function () {


        Route::resource('/manage-dean', AdminController::class)->withTrashed();

        Route::delete('/manage-dean/{manage_dean}/restore', [AdminController::class, 'restore'])->withTrashed(['show'])->name('manage-dean.restore');
        Route::resource('/manage-research', AdminResearchController::class);
        Route::resource('/manage-college', AdminCollegeController::class);
        Route::resource('/manage-program', AdminProgramController::class);
        Route::resource('/manage-clerk', AdminClerkController::class);
        Route::resource('/manage-faculty', AdminFacultyController::class);
        Route::resource('/manage-student', AdminStudentController::class);
        Route::resource('/manage-dashboard', AdminDashboardController::class);
    });

/**
 * Dean Routes
 */
Route::prefix('d')
    ->name('dean.')
    ->middleware(['use.faculty.guard', 'auth.session', 'is.logged.in'/* , 'change.password' */])
    ->group(function () {
        Route::resource('/manage-clerk', DeanController::class)->withTrashed(['show']);
        Route::delete('/manage-clerk/{manage_clerk}/restore', [DeanController::class, 'restore'])->withTrashed(['show'])->name('manage-clerk.restore');
        Route::resource('/manage-faculty', FacultyController::class)->withTrashed(['show']);
        Route::resource('/manage-student', DeanStudentController::class)->withTrashed(['show']);
        Route::resource('/manage-research', DeanResearchController::class);
        Route::resource('/manage-program', DeanProgramController::class);
        Route::resource('/manage-dashboard', DeanDashboardController::class);
    });

/**
 * Clerk Routes
 */
Route::prefix('c')
    ->name('clerk.')
    ->middleware(['use.faculty.guard', 'auth.session', 'is.logged.in'/* , 'change.password' */])
    ->group(function () {

        Route::resource('/manage-student', ClerkController::class)->withTrashed();
        Route::delete('/manage-student/{manage_student}/restore', [ClerkController::class, 'restore'])->withTrashed()->name('manage-student.restore');
        Route::put('/manage-student/{manage_student}/verify', [ClerkController::class, 'verify'])->withTrashed()->name('manage-student.verify');
        Route::put('/manage-student/{manage_student}/unverifiy', [ClerkController::class, 'unverify'])->withTrashed()->name('manage-student.unverify');
        Route::resource('/manage-research', ClerkResearchController::class);
        Route::resource('/manage-dashboard', ClerkDashboardController::class);
    });

/**
 * Student Routes
 */
Route::prefix('s')
    ->name('student.')
    ->middleware(['use.student.guard', 'auth.session', 'is.logged.in', 'change.password'])
    ->group(function () {

        /* Manage Account */
        Route::resource('/manage-account', StudentController::class)->except(['store'])->withTrashed();
        Route::resource('/manage-account', StudentController::class)->only(['store'])->withoutMiddleware(['is.logged.in','change.password'])->withTrashed();
        Route::delete('/manage-account/{manage_student}/restore', [StudentController::class, 'restore'])->name('manage-account.restore');
        Route::post('/manage-account/{manage_student}/avatar', [StudentController::class, 'avatar'])->name('manage-account.avatar');
        Route::view('/verification', 'student.unverified')->name('verification');

        /* Dashboard */
        Route::view('/d', 'student.dashboard.index')->name('dashboard.index');

        /* Research */
        Route::resource('/research', ResearchController::class);
        Route::get('/research/load-students', [ResearchController::class, 'loadStudents'])->name('research.load-students');
    });

/**
 * Research Routes (Public)
 */
Route::prefix('research')
    ->name('research.')
    ->middleware(['is.guard.present'])
    ->group(function () {

        /* Manage Account */
        Route::resource('/search', SearchResearchController::class)->withTrashed();
    });
