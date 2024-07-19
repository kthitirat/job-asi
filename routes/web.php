<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AnnouncementController;
use Laravel\Fortify\Features;
use App\Http\Controllers\SubjectController;


//Route::get('/login', [PageController::class, 'login'])
//   ->name('login');
//Route::post('/login', [PageController::class, 'doLogin']);
if (Features::enabled(Features::registration())) {
    Route::get('/register', [PageController::class, 'userRegister'])
        ->name('register');
    Route::post('/register', [PageController::class, 'storeRegister']);
}

Route::get('/form', [PageController::class, 'form'])->name('form');
Route::post('/form/save-draft', [PageController::class, 'saveDraft'])->name('save_draft');
Route::patch('/form/{performance}/submit', [PageController::class, 'submitForm'])->name('submit_form');

Route::post('/form/upload-image', [PageController::class, 'uploadImage'])->name('upload_image');
Route::delete('/form/{performance}/delete-image', [PageController::class, 'deleteImage'])->name('delete_image');
Route::get('/performances/{performance}/view', [PageController::class, 'performanceView'])->name('performance_view');


Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/print', [PageController::class, 'print'])->name('print');
Route::get('/export', [PageController::class, 'export'])->name('export');

Route::get('/performances/{performance}/pdf', [PageController::class, 'performancePdfView'])
    ->name('performance_pdf_view');
Route::get('/performances/{performance}/pdf-download', [PageController::class, 'performancePdfDownload'])
    ->name('performance_pdf_download');

Route::get('/performances/{performance}/excel-download', [PageController::class, 'performanceExcelDownload'])->name('performance_excel_download');








//Route::resource('/subjects', SubjectController::class);
//Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
//Route::get('/get-all-announcements-type', [AnnouncementController::class, 'getAllAnnouncementTypes'])->name(
//    'announcements.get_all_announcement_types'
//);
//Route::get('/get-all-announcements-categories', [AnnouncementController::class, 'getAllAnnouncementCategories'])->name(
//    'announcements.get_all_announcement_categories'
//);



