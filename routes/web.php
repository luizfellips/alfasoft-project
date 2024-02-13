<?php

use App\Http\Controllers\ContactsController;
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
// define guest allowed routes for contact listing and show
Route::get('/', [ContactsController::class, 'index'])->name('home');
Route::get('contacts/{contact}', [ContactsController::class, 'index'])->name('contacts.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // group all routes with contact prefix, buttons are still available for clicking but if not authenticated user gets sent to login page.
    Route::prefix('contacts')->group(function () {
        Route::get('trashed', [ContactsController::class, 'trashed'])->name('contacts.trashed');
        Route::put('{contact}/restore', [ContactsController::class, 'restore'])->name('contacts.restore');
        Route::get('confirmDelete/{contact}', [ContactsController::class, 'confirmDelete'])->name('contacts.confirmDelete');

        Route::resource('contacts', ContactsController::class)
            ->parameter('contacts', 'contact')
            ->except(['index','show']);
    });
});

require __DIR__.'/auth.php';
