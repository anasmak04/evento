<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\category\CategoryController;
use App\Http\Controllers\admin\event\EventAdminController;
use App\Http\Controllers\admin\user\AdminUserController;
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

//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource("/category", CategoryController::class)->middleware("banned");
Route::post('/user/update-role', [AdminController::class, 'updateRole'])->name('user.update.role')->middleware("banned");
Route::resource("/home", \App\Http\Controllers\home\EventController::class)->middleware(["auth", "banned"]);



Route::prefix("admin/dashboard")->middleware(["auth","banned"])->group(function (){
    Route::get("/", [AdminController::class, "index"])->name("statistique");
    Route::resource("category", CategoryController::class);
    Route::resource("user", AdminUserController::class);
    Route::resource("events", EventAdminController::class);
    Route::patch('/admin/events/{event}/approve', [EventAdminController::class, 'update'])->name('events.approve');
    Route::patch('/user/{user}/status', [AdminUserController::class, 'updateStatus'])->name('user.updateStatus');

});



Route::prefix("organizer")->middleware(["auth", "banned"])->group(function () {
    Route::resource("/reservation", ReservationController::class);
    Route::get("dashboard", [OrganizerStatistiqueController::class, 'index'])->name("organizer.statistique");
    Route::get("dashboard/events", [OrganizerEventController::class, 'index'])->name("organizer.events");
    Route::delete("dashboard/events", [OrganizerEventController::class, 'delete'])->name("organizer.events.delete");
    Route::get("dashboard/event/edit/{id}", [OrganizerEventController::class, 'edit'])->name("organizer.events.edit");
    Route::put('dashboard/events/{id}', [OrganizerEventController::class, 'update'])->name('organizer.events.update');

    Route::get("dashboard/categories", [OrganizerCategoryController::class, 'index'])->name("organizer.categories");
    Route::resource("event", OrganizerEventController::class);
    Route::patch('/events/{event}/auto-accept', [ReservationController::class, 'updateAutoAccept'])->name('events.updateAutoAccept');
    //Route::get('/home/{userId}/{eventId}', [ReservationController::class, 'generatePDF']);
    Route::post('/reserve-event', [ReservationController::class, 'reserveEvent'])->name('reserve.event');
});



Route::resource("organizer", OrganizerController::class)->middleware(["auth", "banned"]);
Route::post('/become-organizer', [OrganizerController::class, 'becomeOrganizer'])->name('become.organizer')->middleware(["auth", "banned"]);




//Route::prefix("organizer")->group( function (){
//    Route::get('/mes-reservations', [ReservationController::class, 'index'])->name('reservations.index');
//})->middleware("auth");


Route::middleware(['auth', "banned"])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
