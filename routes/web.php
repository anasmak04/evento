<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\category\CategoryController;
use App\Http\Controllers\admin\event\EventAdminController;
use App\Http\Controllers\admin\user\AdminUserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\organizer\category\OrganizerCategoryController;
use App\Http\Controllers\organizer\event\OrganizerEventController;
use App\Http\Controllers\organizer\OrganizerController;
use App\Http\Controllers\organizer\reservation\ReservationController;
use App\Http\Controllers\organizer\statistique\OrganizerStatistiqueController;
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
Route::post('/user/update-role', [AdminController::class, 'updateRole'])->name('user.update.role');

Route::resource("/home", EventController::class)->middleware("auth");


Route::prefix("admin/dashboard")->group(function (){
    Route::get("/", [AdminController::class, "index"])->name("statistique");
    Route::resource("category", CategoryController::class);
    Route::resource("user", AdminUserController::class);
    Route::resource("events", EventAdminController::class);
    Route::patch('/admin/events/{event}/approve', [\App\Http\Controllers\admin\event\EventAdminController::class, 'update'])->name('events.approve');
});



Route::prefix("organizer")->group(function () {
    Route::resource("/reservation", ReservationController::class);
    Route::get("dashboard", [OrganizerStatistiqueController::class, 'index'])->name("organizer.statistique");
    Route::get("dashboard/events", [OrganizerEventController::class, 'index'])->name("organizer.events");
    Route::get("dashboard/categories", [OrganizerCategoryController::class, 'index'])->name("organizer.categories");
    Route::resource("event", OrganizerEventController::class);
    Route::post('/become-organizer', [OrganizerController::class, 'becomeOrganizer'])->name('become.organizer');
    Route::patch('/events/{event}/auto-accept', [ReservationController::class, 'updateAutoAccept'])->name('events.updateAutoAccept');
//    Route::get('/home/{userId}/{eventId}', [ReservationController::class, 'generatePDF']);

});





Route::prefix("organizer")->group( function (){
    Route::resource("organizer", OrganizerController::class);
    Route::post('/reserve-event', [ReservationController::class, 'reserveEvent'])->name('reserve.event');
    Route::get('/mes-reservations', [ReservationController::class, 'index'])->name('reservations.index');
})->middleware("auth");




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
