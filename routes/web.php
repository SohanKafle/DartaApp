<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserdetailController;
use Illuminate\Support\Facades\Route;

// In routes/web.php
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('user/index',[HomepageController::class,'index'])->name('user.index');
Route::get('user/userdetail',[HomepageController::class,'userdetail'])->name('user.userdetail');
Route::get('user/companydetail',[HomepageController::class,'companydetail'])->name('user.companydetail');
 Route::post('userdetail/store',[UserdetailController::class,'store'])->name('userdetail.store');
 Route::post('comapany/store',[CompanyController::class,'store'])->name('Company.store');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/customers', [AdminController::class, 'CustomerIndex'])->name('admin.customer.index');
    Route::post('customer/update-toggle/{customerId}', [AdminController::class, 'updateToggleStatus']);
    Route::get('delete/{id}',[AdminController::class,'delete'])->name('admin.customer.delete');
    Route::get('accepted/{id}',[AdminController::class,'accepted'])->name('customer.accepted');
    Route::get('rejected/{id}',[AdminController::class,'rejected'])->name('customer.rejected');

    

});

require __DIR__.'/auth.php';
