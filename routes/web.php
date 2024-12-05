<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;

Route::get('/',[HomeController::class,'home'])->name('index');
Route::get('/log',[HomeController::class,'login'])->name('log');
Route::get('/contactUs',[HomeController::class,'contactUs'])->name('contactUs');
Route::get('/terms',[HomeController::class,'termAndCondition'])->name('terms');
Route::get('/policy',[HomeController::class,'policy'])->name('policy');
Route::resource('product', productController::class);
// http://localhost:8000/downloadAwtarContacts
Route::get('/downloadAwtarContacts',[HomeController::class,'contactsDownload']);
Route::get('/getBarcode/{string}/{id}',[adminController::class,'getBarcode']);

Route::middleware('auth')->group(function () {
    //admin
    Route::get('/adminHome',[adminController::class,'aHome'])->name('adminHome');
    Route::get('/viewUsers',[adminController::class,'viewUsers'])->name('viewUsers');
    Route::delete('/deleteUser/{id}',[adminController::class,'deleteUser']);
    Route::resource('category', CategoryController::class);
    //
    Route::post('/addToCard',[HomeController::class,'addToCard'])->name('addToCard');
    Route::get('/viewCard',[HomeController::class,'viewCard'])->name('viewCard');
    Route::get('/removeFromCard/{id}',[HomeController::class,'removeFromCard']);
    Route::post('/updateCard',[HomeController::class,'updateCard']);
    Route::get('/confirmOrder',[HomeController::class,'confirmOrder'])->name('confirmOrder');
    Route::post('/confirmOrder',[HomeController::class,'confirmOrderPost'])->name('confirmOrderPost');
    Route::get('/myOrders',[HomeController::class,'myOrders'])->name('myOrders');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';