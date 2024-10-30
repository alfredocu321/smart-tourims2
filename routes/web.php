<?php

use App\Http\Controllers\BuyController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Photo360Controller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Models\Category;
use App\Models\Photo360;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    $categories = Category::all();
    return view('web-page.index',compact('categories'));    
});
Route::get('/logout', function () {
    return back()->withInput();
});

Route::get('/buy', function (Request $request) {
    $checkout = $request->user()->checkout('pri_deluxe_album')
        ->returnTo(route('web-page/index'));

    return view('buy', ['checkout' => $checkout]);
})->name('checkout');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return back()->withInput();
    })->name('dashboard');
});

Route::controller(BuyController::class)->group(function(){
    Route::get('payment','payment')->name('payment');
});

Route::controller(PageController::class)->group(function () {
    Route::get('Catalogo', 'Catalogo')->name('Catalogo');
    Route::get('index', 'index')->name('index');
    Route::get('about_us', 'about_us')->name('about_us');
    Route::get('details/{id}', 'details_product')->name('details_product');
    Route::get('Contact-us', 'contact')->name('contact');
    Route::get('Virtual', 'virtual')->name('virtual');
    Route::get('prueba', 'prueba')->name('prueba');
});

Route::controller(Photo360Controller::class)->group(function () {
    Route::get('Photo-306°', 'photo')->name('photo');
    Route::get('image360/{id}', 'image360')->name('image360');
});


Route::controller(CartController::class)->group(function () {
    Route::get('cart', 'index')->name('cart.index');
    Route::post('cart/store','AddToCart')->name('cart.store');
    Route::put('/carr/update','Updatecart')->name('cart.update');
    Route::delete('/cart/delete','RemoveItem')->name('cart.remove');
    Route::delete('/cart/clear', 'ClearItem')->name('cart.clear');
   
});


Route::post('/payment', [PaymentController::class, 'processPayment']);
Route::post('/processar-pago', [PaymentController::class, 'processarPago']);
