<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ HomeController::class , 'home' ] ) -> name ( 'home' ) ;

Route::get('/dashboard', function () {
    return view('home.index');
})->middleware(['auth', 'verified'])-> middleware(['auth' , 'user'])->name('user_home');

Route::middleware('auth')->group(function () { 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Admin routes : 
Route::middleware (['auth' , 'admin'] )-> group ( function () {
    Route::get ( '/admin/dashboard' , [ AdminController::class , 'dashboard' ] ) -> name ('admin.dashboard') ; 
    Route::get ('admin/categories' , [ AdminController::class , 'categories_list' ] )->name ('admin.categories_list') ; 
    Route::post ( 'admin/category' , [AdminController::class , 'create_category' ] )->name ('admin.create_category') ;
    Route::get ('admin/delete_category/{id}' , [AdminController::class , 'delete_category' ] )->name ('admin.delete_category') ;
    Route::get ( 'admin/view_category/{id}' , [AdminController::class , 'view_category' ] )-> name('admin.view_category') ;
    Route::get ('admin/edit_category/{id}' , [AdminController::class ,'edit_category' ] )-> name ('admin.edit_category');
    Route::post ( 'admin/update_category/{id}' , [AdminController::class ,'update_category']) -> name ('admin.update_category');


    // Products : 
    Route::get ( 'admin/products' , [AdminController::class , 'view_products']) -> name ('admin.view_products');
    Route::get ('/admin/add_product', [AdminController::class , 'add_product']) -> name ('admin.add_product');
    Route::post ( '/admin/add_product', [AdminController::class , 'upload_product']) -> name ('admin.upload_product');
    Route::get ('/admin/delete_product/{id}', [AdminController::class , 'delete_product']) -> name ('admin.delete_product');
    Route::get ( '/admin/edit_product/{id}', [AdminController::class , 'edit_product']) -> name ('admin.edit_product');
    Route::post ( '/admin/edit_product/{id}', [AdminController::class , 'update_product']) -> name ('admin.edit_product');
    Route::get ( '/admin/product_search' , [AdminController::class , 'product_search']) -> name ('admin.product_search');

});

        