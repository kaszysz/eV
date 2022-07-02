<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportMerchController;
use App\Http\Controllers\ReportMerchExportController;
use App\Http\Controllers\RetailerController;
use App\Http\Controllers\RetailerPricingController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\VoivodeshipController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::resource('categories', CategoryController::class);
Route::resource('components', ComponentController::class);
Route::resource('voivodeships', VoivodeshipController::class);
Route::resource('cities', CityController::class);
Route::resource('shops', ShopController::class);
Route::resource('retailers', RetailerController::class);
Route::resource('products', ProductController::class);
Route::resource('producers', ProducerController::class);
Route::resource('retailer-pricings', RetailerPricingController::class);
Route::resource('report-merches', ReportMerchController::class);

Route::post('/cities/get/cities/voivodeship/{id}', [CityController::class, 'getCitiesVoivodeship'])->name('cities.voivodeship');
Route::post('/products/get/products/category/{id}', [ProductController::class, 'getProductsCategory'])->name('products.category');
Route::post('/components/list/{name}', [ComponentController::class, 'getComponentsList'])->name('components.list');
Route::post('/shops/get/closest', [ShopController::class, 'getClosestShops'])->name('shops.get.closest');
Route::post('/retailer-pricings/get/indexes/retailer', [RetailerPricingController::class, 'getRetailerPricingsByIndexAndRetailerId'])->name('retailer-pricings.get.indexes.retailer');
Route::put('/retailer-pricings/update/wr/{retailerPricing}', [RetailerPricingController::class, 'updateWithoutRedirect'])->name('retailer-pricings.update.without.redirect');
Route::post('/report-merches/export/all', [ReportMerchExportController::class, 'export'])->name('report-merches.export');
