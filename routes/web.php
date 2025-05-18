<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SendMsgController;

Route::middleware('lang')->group(function(){
    Route::get('/',[HomeController::class,'home'])->name('index');
    Route::get('/log',[HomeController::class,'login'])->name('log');
    Route::get('/contactUs',[HomeController::class,'contactUs'])->name('contactUs');
    Route::get('/terms',[HomeController::class,'termAndCondition'])->name('terms');
    Route::get('/policy',[HomeController::class,'policy'])->name('policy');
    Route::get('/company',[HomeController::class,'company'])->name('company');
    Route::resource('product', productController::class);
    Route::get('/continue/shop',[HomeController::class,'continueShop'])->name('con');
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
    Route::get('/pay/fail',[HomeController::class,'fail'])->name('fail');///////////ready
    Route::get('/pay/success',[HomeController::class,'success'])->name('success');///////////ready
    
    Route::middleware('auth')->group(function () {
        //admin
        
        Route::get('/orders/notComplete',[adminController::class,'ordersNotComplete']);
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
Route::get('/send-email', [SendMsgController::class, 'sendEmail']);

Route::fallback(function(){
    return view('awtar.notFound');
});

// use Telegram\Bot\Laravel\Facades\Telegram;
// Route::get('/get-updates', function () {
//     $updates = Telegram::getUpdates();
//     return $updates;
//     });
// use App\Models\Country;
// Route::get('/create', function(){
//             $countries=[
//                 [
//                     "name"=>"استلام من متجر أواتار",
//                     "enName"=>"United Arab Emirates",
//                     "type"=>"awtar",
//                     "price_id"=>3
//                 ],[   
//                     "name"=>"الإمارات",
//                     "enName"=>"United Arab Emirates",
//                     "type"=>"khalieg",
//                     "price_id"=>3
//                 ],[
//                     "name"=>"السعوديّة",
//                     "enName"=>"Saudi Arabia",
//                     "type"=>"khalieg",
//                     "price_id"=>3
//                 ],[
//                     "name"=>"الكويت",
//                     "enName"=>"Kuwait",
//                     "type"=>"khalieg",
//                     "price_id"=>3
//                 ],[
//                     "name"=>"قطر",
//                     "enName"=>"Qatar",
//                     "type"=>"khalieg",
//                     "price_id"=>3
//                 ],[
//                     "name"=>"سلطنة عُمان",
//                     "enName"=>"Oman",
//                     "type"=>"oman",
//                     "price_id"=>8
//                 ],[
//                     "name"=>"البحرين",
//                     "enName"=>"Bahrain",
//                     "type"=>"khalieg",
//                     "price_id"=>3
//                 ],[
//                     "name"=>"مصر",
//                     "enName"=>"Egypt",
//                     "type"=>"eg_jo",
//                     "price_id"=>5
//                 ],[
//                     "name"=>"الاردن",
//                     "enName"=>"Jordan",
//                     "type"=>"eg_jo",
//                     "price_id"=>5
//                 ],[
//                     "name"=>"العراق",
//                     "enName"=>"Iraq",
//                     "type"=>"iraq",
//                     "price_id"=>6
//                 ],[
//                     "name"=>"استراليا",
//                     "enName"=>"Australia",
//                     "type"=>"australia",
//                     "price_id"=>7
//                 ],[
//                     "name"=>"بريطانيا",
//                     "enName"=>"Britain",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[   
//                     "name"=>"ألبانيا",
//                     "enName"=>"Albania",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"أندورا",
//                     "enName"=>"Andorra",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"النمسا",
//                     "enName"=>"Austria",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"بلجيكا",
//                     "enName"=>"Belgium",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"بلغاريا",
//                     "enName"=>"Bulgaria",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"كرواتيا",
//                     "enName"=>"Croatia",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"قبرص",
//                     "enName"=>"Cyprus",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"التشيك",
//                     "enName"=>"Czech Republic",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"الدنمارك",
//                     "enName"=>"Denmark",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"استونيا",
//                     "enName"=>"Estonia",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"فنلندا",
//                     "enName"=>"Finland",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"فرنسا",
//                     "enName"=>"France",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"ألمانيا",
//                     "enName"=>"Germany",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"اليونان",
//                     "enName"=>"Greece",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"المجر",
//                     "enName"=>"Hungary",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"أيسلندا",
//                     "enName"=>"Iceland",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"إيطاليا",
//                     "enName"=>"Italy",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"لاتفيا",
//                     "enName"=>"Latvia",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"ليتوانيا",
//                     "enName"=>"Lithuania",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"لوكسمبورغ",
//                     "enName"=>"Luxembourg",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"مالطا",
//                     "enName"=>"Malta",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"مولدوفا",
//                     "enName"=>"Moldova",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"موناكو",
//                     "enName"=>"Monaco",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"النرويج",
//                     "enName"=>"Norway",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"بولندا",
//                     "enName"=>"Poland",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"البرتغال",
//                     "enName"=>"Portugal",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"رومانيا",
//                     "enName"=>"Romania",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"سان مارينو",
//                     "enName"=>"San Marino",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"صربيا",
//                     "enName"=>"Serbia",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"سلوفاكيا",
//                     "enName"=>"Slovakia",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"سلوفينيا",
//                     "enName"=>"Slovenia",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"إسبانيا",
//                     "enName"=>"Spain",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"السويد",
//                     "enName"=>"Sweden",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"سويسرا",
//                     "enName"=>"Switzerland",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"المملكة المتحدة",
//                     "enName"=>"United Kingdom",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"أوكرانيا",
//                     "enName"=>"Ukraine",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"فاتيكان",
//                     "enName"=>"Vatican",
//                     "type"=>"auroba",
//                     "price_id"=>1
//                 ],[
//                     "name"=>"أنتيغوا وبربودا",
//                     "enName"=>"Antigua and Barbuda",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"باهاماس",
//                     "enName"=>"Bahamas",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"هندوراس",
//                     "enName"=>"Honduras",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"بربادوس",
//                     "enName"=>"Barbados",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"بنما",
//                     "enName"=>"Panama",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"امريكا",
//                     "enName"=>"america",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"بيليز",
//                     "enName"=>"Belize",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"ترينيداد وتوباج",
//                     "enName"=>"Trinidad and Tobago",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"غواتيمالا",
//                     "enName"=>"Guatemala",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"دومينيكا",
//                     "enName"=>"Dominica",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"الدومينيكان",
//                     "enName"=>"Dominican",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"سانت فينسنت والغرينادينز",
//                     "enName"=>"RepublicSaint Vincent and the Grenadines",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"سانت كيتس ونيفيس",
//                     "enName"=>"Saint Kitts and Nevis",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"سانت لوسيا",
//                     "enName"=>"Saint Lucia",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"السلفادور",
//                     "enName"=>"ElSalvador",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"غرينادا",
//                     "enName"=>"Grenada",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"كندا",
//                     "enName"=>"Canada",
//                     "type"=>"canada",
//                     "price_id"=>4
//                 ],[
//                     "name"=>"كوبا",
//                     "enName"=>"Cuba",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"كوستاريكا",
//                     "enName"=>"Costarica",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"المكسيك",
//                     "enName"=>"Mexico",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"نيكارجوا",
//                     "enName"=>"Nicaragua",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"هاييتي",
//                     "enName"=>"Haiti",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"الأرجنتين",
//                     "enName"=>"Argentina",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"بوليفيا",
//                     "enName"=>"Bolivia",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"البرازيل",
//                     "enName"=>"Brazil",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"تشيلي ",
//                     "enName"=>"Chile",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"كولومبيا",
//                     "enName"=>"Colombia",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"الإكوادور",
//                     "enName"=>"Ecuador",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"غيانا",
//                     "enName"=>"Guyana",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"باراجواي",
//                     "enName"=>"Paraguay",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"بيرو",
//                     "enName"=>"Peru",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"سورينام",
//                     "enName"=>"Suriname",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"أوروغواي",
//                     "enName"=>"Uruguay",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ],[
//                     "name"=>"فنزويلا",
//                     "enName"=>"Venezuela",
//                     "type"=>"america",
//                     "price_id"=>2
//                 ]      
//             ];
//             foreach($countries as $i)
//                 Country::create($i);
//             return;
// });