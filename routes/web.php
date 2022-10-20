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
// Welcome Route
Route::get('/', function () {
    return view('welcome');
});
// farmer Routes
Route::get('/farmer/login', function () {
    return view('farmer/login');
})->name('farmer.login');
Route::get('/farmer/register', function () {
    return view('farmer/register');
})->name('farmer.register');

Route::get('/customer/login', function () {
    return view('customer/login');
})->name('customer.login');

Route::get('/customer/register', function () {
    return view('customer/register');
})->name('customer.register');


Route::get('/farmer/home', [App\Http\Controllers\farmer\HomeController::class, 'index'])->name('farmer.home');
Route::get('/farmer/productCategories', [App\Http\Controllers\farmer\ProductCategoriesController::class, 'index'])->name('farmer.productCategories');
Route::get('/farmer/addCategory', [App\Http\Controllers\farmer\ProductCategoriesController::class, 'addCategory'])->name('farmer.addCategory');
Route::post('/farmer/submitCategory', [App\Http\Controllers\farmer\ProductCategoriesController::class, 'create'])->name('farmer.submitCategory');
Route::get('/farmer/editCategory/{id}', [App\Http\Controllers\farmer\ProductCategoriesController::class, 'editCategory']);
Route::post('/farmer/updateCategory', [App\Http\Controllers\farmer\ProductCategoriesController::class, 'update'])->name('farmer.category.edit');


//Product Items Routes
Route::get('/farmer/items', [App\Http\Controllers\farmer\ProductItemsController::class, 'index'])->name('farmer.items');
Route::get('/farmer/addItems', [App\Http\Controllers\farmer\ProductItemsController::class, 'addItems'])->name('farmer.addItems');
Route::post('/farmer/submitItem', [App\Http\Controllers\farmer\ProductItemsController::class, 'create'])->name('farmer.item.add');
Route::get('/farmer/editItem/{id}', [App\Http\Controllers\farmer\ProductItemsController::class, 'editItem']);
Route::post('/farmer/updateItem', [App\Http\Controllers\farmer\ProductItemsController::class, 'update'])->name('farmer.item.edit');
Route::get('/farmer/deleteItem/{id}', [App\Http\Controllers\farmer\ProductItemsController::class, 'deleteItem'])->name('farmer.deleteItem');

Route::get('/farmer/buyingproducts', [App\Http\Controllers\farmer\buyingController::class, 'index'])->name('farmer.buying.products');
Route::get('/farmer/buyingorders', [App\Http\Controllers\farmer\buyingController::class, 'getFarmerBuyingOrders'])->name('farmer.buyingorders');
Route::get('/farmer/orderlist', [App\Http\Controllers\farmer\orderController::class, 'index'])->name('farmer.orders');
Route::get('/farmer/activeorders', [App\Http\Controllers\farmer\orderController::class, 'activeOrders'])->name('farmer.activeorders');
Route::get('/farmer/completedorders', [App\Http\Controllers\farmer\orderController::class, 'completedOrders'])->name('farmer.completedorders');
Route::get('/farmer/rejectedorders', [App\Http\Controllers\farmer\orderController::class, 'cancelledOrders'])->name('farmer.cancelledorders');
Route::get('/farmer/orderhistory', [App\Http\Controllers\farmer\orderController::class, 'orderHistory'])->name('farmer.orderhistory');

Route::get('/farmer/changestatus/{id}/{status}', [App\Http\Controllers\farmer\orderController::class, 'changeStatus'])->name('farmer.order.changestatus');

Route::get('/farmer/showcart', [App\Http\Controllers\farmer\buyingController::class, 'showCart'])->name('farmer.cart.show');
Route::get('/farmer/deletecartitem/{id}', [App\Http\Controllers\farmer\buyingController::class, 'deleteCartItem'])->name('farmer.cart.delete');

Route::get('/farmer/checkout', [App\Http\Controllers\farmer\buyingController::class, 'checkout'])->name('farmer.cart.checkout');
Route::post('/farmer/checkout/submit', [App\Http\Controllers\farmer\buyingController::class, 'placeOrder'])->name('farmer.checkout.submit');
Route::get('/farmer/deleteCategory/{id}', [App\Http\Controllers\farmer\ProductCategoriesController::class, 'deleteCategory']);


///Retailor Routes

Route::get('/retailor/login', function () {
    return view('retailor/login');
})->name('retailor.login');
Route::get('/retailor/register', function () {
    return view('retailor/register');
})->name('retailor.register');


Route::get('/retailor/changestatus/{id}/{status}', [App\Http\Controllers\retailor\orderController::class, 'changeStatus'])->name('retailor.order.changestatus');
Route::get('/retailor/productCategories', [App\Http\Controllers\retailor\ProductCategoriesController::class, 'index'])->name('retailor.productCategories');
Route::get('/retailor/addCategory', [App\Http\Controllers\retailor\ProductCategoriesController::class, 'addCategory'])->name('retailor.addCategory');
Route::post('/retailor/submitCategory', [App\Http\Controllers\retailor\ProductCategoriesController::class, 'create'])->name('retailor.submitCategory');
Route::get('/retailor/editCategory/{id}', [App\Http\Controllers\retailor\ProductCategoriesController::class, 'editCategory']);
Route::post('/retailor/updateCategory', [App\Http\Controllers\retailor\ProductCategoriesController::class, 'update'])->name('retailor.category.edit');
Route::get('/retailor/orderlist', [App\Http\Controllers\retailor\orderController::class, 'index'])->name('retailor.orders');
Route::get('/retailor/sellingOrders', [App\Http\Controllers\retailor\orderController::class, 'index'])->name('retailor.orders');
Route::get('/retailor/deleteCategory/{id}', [App\Http\Controllers\retailor\ProductCategoriesController::class, 'deleteCategory']);



//Product Items Routes
Route::get('/retailor/items', [App\Http\Controllers\retailor\ProductItemsController::class, 'index'])->name('retailor.items');
Route::get('/retailor/addItems', [App\Http\Controllers\retailor\ProductItemsController::class, 'addItems'])->name('retailor.addItems');
Route::post('/retailor/submitItem', [App\Http\Controllers\retailor\ProductItemsController::class, 'create'])->name('retailor.item.add');
Route::get('/retailor/editItem/{id}', [App\Http\Controllers\retailor\ProductItemsController::class, 'editItem']);
Route::post('/retailor/updateItem', [App\Http\Controllers\retailor\ProductItemsController::class, 'update'])->name('retailor.item.edit');
Route::get('/retailor/deleteItem/{id}', [App\Http\Controllers\retailor\ProductItemsController::class, 'deleteItem'])->name('retailor.deleteItem');


Route::get('/retailor/home', [App\Http\Controllers\retailor\HomeController::class, 'index'])->name('retailor.home');
Route::post('/retailor/addtoCart', [App\Http\Controllers\retailor\HomeController::class, 'addToCart'])->name('cart.add');
Route::get('/retailor/showcart', [App\Http\Controllers\retailor\HomeController::class, 'showCart'])->name('cart.show');
Route::get('/retailor/deletecartitem/{id}', [App\Http\Controllers\retailor\HomeController::class, 'deleteCartItem'])->name('cart.delete');

Route::get('/retailor/checkout', [App\Http\Controllers\retailor\HomeController::class, 'checkout'])->name('cart.checkout');
Route::post('/retailor/checkout/submit', [App\Http\Controllers\retailor\HomeController::class, 'placeOrder'])->name('checkout.submit');
Route::get('/retailor/orders', [App\Http\Controllers\retailor\BuyingController::class, 'allOrders'])->name('retailor.buying.orders');
Route::get('/retailor/pendingorders', [App\Http\Controllers\retailor\BuyingController::class, 'pendingOrders'])->name('retailor.buying.pending.orders');
Route::get('/retailor/completedorders', [App\Http\Controllers\retailor\BuyingController::class, 'completedorders'])->name('retailor.buying.completed.orders');

Route::get('/retailor/orderDetail/{id}', [App\Http\Controllers\retailor\BuyingController::class, 'orderDetail']);
Route::get('/retailor/products', [App\Http\Controllers\retailor\productController::class, 'index'])->name('retailor.products');
Route::get('/retailor/addproduct', [App\Http\Controllers\retailor\productController::class, 'addproduct'])->name('retailor.addproduct');
Route::post('/retailor/submitproduct', [App\Http\Controllers\retailor\productController::class, 'create'])->name('retailor.product.add');



Route::get('/customer/home', [App\Http\Controllers\customer\HomeController::class, 'index'])->name('customer.home');
Route::get('/customer/farmer/products', [App\Http\Controllers\customer\farmerController::class, 'index'])->name('customer.farmer.products');
Route::get('/customer/retailor/products', [App\Http\Controllers\customer\retailorController::class, 'index'])->name('customer.retailor.products');
Route::post('/retailor/addtoCart', [App\Http\Controllers\retailor\HomeController::class, 'addToCart'])->name('cart.add');

Route::get('/customer/showcart', [App\Http\Controllers\customer\HomeController::class, 'showCart'])->name('customer.cart.show');

Route::get('/customer/checkout', [App\Http\Controllers\customer\farmerController::class, 'checkout'])->name('customer.cart.checkout');
Route::post('/customer/checkout/submit', [App\Http\Controllers\customer\farmerController::class, 'placeOrder'])->name('customer.checkout.submit');
Route::get('/customer/orders', [App\Http\Controllers\customer\HomeController::class, 'allOrders'])->name('customer.orders');


//Supplier routes

Route::get('/supplier/login', function () {
    return view('supplier/login');
})->name('supplier.login');
Route::get('/supplier/register', function () {
    return view('supplier/register');
})->name('supplier.register');

Route::get('/supplier/home', [App\Http\Controllers\GoogleMapController::class, 'index'])->name('supplier.home');
Route::get('/supplier/requests', [App\Http\Controllers\supplier\RequestController::class, 'index'])->name('supplier.requests');
Route::get('/supplier/updateStatus/{id}/{status}', [App\Http\Controllers\supplier\RequestController::class, 'changeStatus'])->name('supplier.order.changestatus');

Route::get('/supplier/activedeliveries', [App\Http\Controllers\supplier\RequestController::class, 'activeDeliveries'])->name('supplier.active.deliveries');

Route::get('/supplier/completeddeliveries', [App\Http\Controllers\supplier\RequestController::class, 'completedDeliveries'])->name('supplier.completed.deliveries');

// Login Routes
Auth::routes();
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'register'])->name('user.register');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
