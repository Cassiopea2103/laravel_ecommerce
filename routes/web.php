<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ HomeController::class , 'home' ] ) -> name ( 'home' ) ;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])-> middleware(['auth' , 'user'])->name('dashboard');

Route::middleware('auth')->group(function () { 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Admin routes : 
Route::middleware (['auth' , 'admin'] )-> group ( function () {
    Route::get ( '/admin/dashboard' , [ AdminController::class , 'dashboard' ] ) -> name ('admin.dashboard') ; 
    Route::get ('admin/category' , [ AdminController::class , 'view_category' ] )->name ('admin.view_category') ; 
    Route::post ( 'admin/category' , [AdminController::class , 'create_category' ] )->name ('admin.create_category') ;
    Route::get ('admin/delete_category/{id}' , [AdminController::class , 'delete_category' ] )->name ('admin.delete_category') ;
});

        