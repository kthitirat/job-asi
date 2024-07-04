<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Dashboard\AnnouncementController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\Dashboard\SubjectController;
use App\Http\Controllers\Dashboard\ProfessorController;


Route::middleware(['auth:sanctum', 'role:admin,manager'])->group(function () {
    Route::prefix('dashboard')->as('dashboard.')->group(function () {
        Route::get('/', [PageController::class, 'dashboard'])->name('index');

        Route::resource('subjects', SubjectController::class);
        Route::resource('professors', ProfessorController::class);

//        Route::get('/announcements', [AnnouncementController::class, 'index'])
//            ->name('announcements.index');
//        Route::get('/announcements/create', [AnnouncementController::class, 'create'])
//            ->name('announcements.create');
//        Route::post('/announcements', [AnnouncementController::class, 'store'])
//            ->name('announcements.store');
//        Route::get('/announcements/{announcement}', [AnnouncementController::class, 'show'])
//            ->name('announcements.show');
//        Route::get('/announcements/{announcement}/edit', [AnnouncementController::class, 'edit'])
//            ->name('announcements.edit');
//        Route::patch('/announcements/{announcement}', [AnnouncementController::class, 'update'])
//            ->name('announcements.update');
//        Route::delete('/announcements/{announcement}', [AnnouncementController::class, 'destroy'])
//            ->name('announcements.destroy');
//
//
//        //Applicants
//        Route::get('/applicants', [ApplicantController::class, 'index'])
//            ->name('applicants.index');
//        // Route::get('/applicants/create', [ApplicantController::class, 'create'])
//        //     ->name('applicants.create');
//        Route::get('/applicants/{applicant}', [ApplicantController::class, 'show'])
//            ->name('applicants.show');
    });
});


