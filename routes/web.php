<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\category\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\organizer\OrganizerDashboardController;
use App\Http\Controllers\organizer\OrganizerEventController;
use App\Http\Controllers\ProfileController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource("/category", CategoryController::class);
Route::resource("/dashboard", AdminController::class);
Route::post('/user/update-role', [AdminController::class, 'updateRole'])->name('user.update.role');
Route::post('/become-organizer', [\App\Http\Controllers\Organizer\OrganizerController::class, 'becomeOrganizer'])->name('become.organizer');



Route::resource("/home", EventController::class)->middleware("auth");

Route::prefix("organizer")->group(function () {
    Route::get("dashboard", [OrganizerDashboardController::class, 'index']);
    Route::resource("event", OrganizerEventController::class);
});


Route::prefix("admin/dashboard")->group(function (){
   Route::resource("category", CategoryController::class);
   Route::resource("events", \App\Http\Controllers\admin\EventController::class);
   Route::patch('/admin/events/{event}/approve', [\App\Http\Controllers\admin\EventController::class, 'update'])->name('events.approve');
});

Route::resource("organizer", \App\Http\Controllers\organizer\OrganizerController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
