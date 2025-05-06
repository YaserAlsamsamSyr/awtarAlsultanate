<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;

Route::middleware('lang')->group(function(){
    Route::get('/',[HomeController::class,'home'])->name('index');
    Route::get('/log',[HomeController::class,'login'])->name('log');
    Route::get('/contactUs',[HomeController::class,'contactUs'])->name('contactUs');
    Route::get('/terms',[HomeController::class,'termAndCondition'])->name('terms');
    Route::get('/policy',[HomeController::class,'policy'])->name('policy');
    Route::get('/company',[HomeController::class,'company'])->name('company');
    Route::resource('product', productController::class);
    // http://localhost:8000/downloadAwtarContacts
    Route::get('/AwtarContacts',[HomeController::class,'contactsDownload']);
    Route::get('/getBarcode/{string}/{id}',[adminController::class,'getBarcode']);
    // for card
    Route::post('/addToCard',[HomeController::class,'addToCard'])->name('addToCard');///////////////ready
    Route::get('/viewCard',[HomeController::class,'viewCard'])->name('viewCard');////////////////ready
    Route::get('/removeFromCard/{id}',[HomeController::class,'removeFromCard']);/////////////////ready
    Route::post('/updateCard',[HomeController::class,'updateCard']);///////////////ready
    Route::get('/confirmOrder',[HomeController::class,'confirmOrder'])->name('confirmOrder');/////////////ready
    Route::post('/confirmOrder',[HomeController::class,'confirmOrderPost'])->name('confirmOrderPost');///////////ready
    
    Route::middleware('auth')->group(function () {
        //admin
        
        Route::get('/orders/noAccounts',[adminController::class,'ordersNoAccounts']);
        Route::get('/adminHome',[adminController::class,'aHome'])->name('adminHome');
        Route::get('/viewUsers',[adminController::class,'viewUsers'])->name('viewUsers');
        Route::delete('/deleteUser/{id}',[adminController::class,'deleteUser']);
        Route::resource('category', CategoryController::class);
        Route::post('/updateUserPassword',[adminController::class,'updateUserPassword'])->name('user.update.password');
        Route::get('viewOrders/{id}', [adminController::class,'viewOrders'])->name('viewOrders');
        Route::get('getMoney', [adminController::class,'getMoney'])->name('money');
        //
        Route::get('/myOrders',[HomeController::class,'myOrders'])->name('myOrders');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    require __DIR__.'/auth.php';
});
Route::get('/langToggle',[HomeController::class,'langToggle'])->name('toggle.lang');

use Telegram\Bot\Laravel\Facades\Telegram;
Route::get('/get-updates', function () {
    $updates = Telegram::getUpdates();
    return $updates;
    });
       