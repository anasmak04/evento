<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\category\CategoryController;
use App\Http\Controllers\EventController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource("/events", EventController::class);
Route::resource("/category", CategoryController::class);
Route::resource("/dashboard", AdminController::class);
Route::resource("/home", \App\Http\Controllers\user\HomeController::class);
Route::post('/user/update-role', [AdminController::class, 'updateRole'])->name('user.update.role');
Route::resource("organizer", \App\Http\Controllers\organizer\OrganizerController::class)->middleware("auth");
Route::post('/become-organizer', [\App\Http\Controllers\Organizer\OrganizerController::class, 'becomeOrganizer'])->name('become.organizer');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
