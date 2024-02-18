<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('welcome');
});

// Route::middleware("guest")
//     ->prefix("auth")
//     ->group(function (){
//         Route::get("/login" , [\App\Http\Controllers\AuthController::class , "loginView"])->name("login");
//         Route::post("/login" , [\App\Http\Controllers\AuthController::class , "loginSubmit"])->name("loginSubmit");
//         Route::get("/register" , [\App\Http\Controllers\AuthController::class , "registerView"])->name("register");
//         Route::post("/register" , [\App\Http\Controllers\AuthController::class , "registerSubmit"])->name("registerSubmit");
//     });

// Route::get('/{pathMatch}', function () {
//     return view('welcome');
// })->where('pathMatch','.*');
Route::get("/" , [\App\Http\Controllers\Website\ProductController::class , "index"])->name("home");
Route::get("/mobile" , [\App\Http\Controllers\Website\ProductController::class , "mobile"])->name("mobile");
Route::get("/toys" , [\App\Http\Controllers\Website\ProductController::class , "toys"])->name("toys");
Route::get("/cover-glass" , [\App\Http\Controllers\Website\ProductController::class , "coverglass"])->name("coverglass");
Route::get("/charger-cable" , [\App\Http\Controllers\Website\ProductController::class , "chargercable"])->name("chargercable");
Route::get("/product/{product}" , [\App\Http\Controllers\Website\ProductController::class , "show"])->name("product.show");
Route::post("/add-to-cart/{product}" , [\App\Http\Controllers\Website\OrderController::class , "addToCart"])->name("addToCart");
Route::delete("/remove-from-cart/{product}" , [\App\Http\Controllers\Website\OrderController::class , "removeFromCart"])->name("removeFromCart");
Route::patch("/update-cart/{product}" , [\App\Http\Controllers\Website\OrderController::class , "updateCart"])->name("updateCart");


Route::get("/cart" , [\App\Http\Controllers\Website\OrderController::class , "cartShow"])->name("cartShow");
Route::post("/cart/address" , [\App\Http\Controllers\Website\OrderController::class , "addAddress"])->name("addAddress");
Route::get("/invoice" , [\App\Http\Controllers\Website\OrderController::class , "invoice"])->name("invoice");
Route::post("/order/store" , [\App\Http\Controllers\Website\OrderController::class , "store"])->name("orderStore")->middleware("auth");
Route::match(['get' , 'post'] , '/pay-result' , [\App\Http\Controllers\Website\OrderController::class , "payResult"])->name("payResult");



Route::middleware("dashboard")
    ->prefix("dashboard")
    ->name("dashboard.")
    ->group(function () {
        Route::get("/", [\App\Http\Controllers\Dashboard\DashboardController::class, "index"])->name("index");
        Route::resource("/product", \App\Http\Controllers\Dashboard\ProductController::class);
});

Route::get("/logout" , [\App\Http\Controllers\AuthController::class , "logout"])->name("logout");


require __DIR__.'/auth.php';
