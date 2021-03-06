<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\TruckMakeController;
use App\Http\Controllers\TruckTypeController;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

//...............................Spatie Roles and Permissions Routes.....................//
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

//...............................FrontEnd Routes.....................//
Route::get('/', [FrontEndController::class, 'index'])->name('index');
Route::get('/about', [FrontEndController::class, 'about'])->name('about');
Route::get('/blog', [FrontEndController::class, 'blog'])->name('blog');
Route::get('/contact', [FrontEndController::class, 'contact'])->name('contact');
Route::get('/fleet-safety-policy', [FrontEndController::class, 'fleet_safety_policy'])->name('fleet-safety-policy');
Route::get('/intergrated-solutions', [FrontEndController::class, 'intergrated_solutions'])->name('intergrated-solutions');
Route::get('/management-services', [FrontEndController::class, 'management_services'])->name('management-services');
Route::get('/solutions', [FrontEndController::class, 'solutions'])->name('solutions');
Route::get('/transport', [FrontEndController::class, 'transport'])->name('transport');




Route::get('/home', [HomeController::class, 'index'])->name('home');

//..............................Trucks......................................//

Route::get('/truck/index', [TruckController::class, 'index'])->name('truck.index');
Route::post('/truck/store', [TruckController::class, 'store'])->name('truck.store');
Route::get('/truck/edit/{id}', [TruckController::class, 'edit'])->name('truck.edit');
Route::get('/truck/show/{id}', [TruckController::class, 'show'])->name('truck.show');
Route::put('/truck/store', [TruckController::class, 'update'])->name('truck.update');
Route::get('/truck/delete/{id}', [TruckController::class, 'destroy'])->name('truck.delete');

// .............................Truck make............................//

Route::post('/make/store', [TruckMakeController::class, 'store'])->name('make.store');
Route::get('/make/show/{id}', [TruckMakeController::class, 'show'])->name('make.show');
Route::put('/make/store', [TruckMakeController::class, 'update'])->name('make.update');
Route::get('/make/delete/{id}', [TruckMakeController::class, 'destroy'])->name('make.delete');

// .............................Truck type............................//
Route::post('/type/store', [TruckTypeController::class, 'store'])->name('type.store');
Route::get('/type/show/{id}', [TruckTypeController::class, 'show'])->name('type.show');
Route::put('/type/store', [TruckTypeController::class, 'update'])->name('type.update');
Route::get('/type/delete/{id}', [TruckTypeController::class, 'destroy'])->name('type.delete');

//..............................Customers......................................//

Route::get('/customer/index', [CustomerController::class, 'index'])->name('customer.index');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::get('/customer/show/{id}', [CustomerController::class, 'show'])->name('customer.show');
Route::put('/customer/store', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');

//..............................Locations......................................//

Route::get('/location/index', [LocationController::class, 'index'])->name('location.index');
Route::post('/location/store', [LocationController::class, 'store'])->name('location.store');
Route::get('/location/edit/{id}', [LocationController::class, 'edit'])->name('location.edit');
Route::get('/location/show/{id}', [LocationController::class, 'show'])->name('location.show');
Route::put('/location/store', [LocationController::class, 'update'])->name('location.update');
Route::get('/location/delete/{id}', [LocationController::class, 'destroy'])->name('location.delete');

//..............................Shipment......................................//

Route::get('/shipment/index', [ShipmentController::class, 'index'])->name('shipment.index');
Route::get('/shipment/create', [ShipmentController::class, 'create'])->name('shipment.create');
Route::post('/shipment/store', [ShipmentController::class, 'store'])->name('shipment.store');
Route::get('/shipment/edit/{id}', [ShipmentController::class, 'edit'])->name('shipment.edit');
Route::get('/shipment/show/{id}', [ShipmentController::class, 'show'])->name('shipment.show');
Route::put('/shipment/update', [ShipmentController::class, 'update'])->name('shipment.update');
Route::get('/shipment/delete/{id}', [ShipmentController::class, 'destroy'])->name('shipment.delete');

//..............................Reports......................................//

Route::get('/report/index', [ReportController::class, 'index'])->name('report.index');
Route::get('/report/data', [ReportController::class, 'get_report_data']);


Route::get('clear_cache', function () {

    \Artisan::call('cache:clear');

    dd("Cache is cleared");

});
Route::get('optimize_clear', function () {

    \Artisan::call('optimize:clear');

    return "Cache is cleared";

});
Route::get('composer', function () {

    \Artisan::call('composer dumpautoload');

    return "Composer dump";

});
