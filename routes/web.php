<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommonController;

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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/order-now',[HomeController::class,'orderPage']);
Route::get('/track-now',[HomeController::class,'trackNow']);
Route::get('/confirm-order/{token}', [OrderController::class, 'showConfirmOrder'])->name('order.confirm');
Route::post('/order/confirm', [OrderController::class, 'confirmOrder'])->name('order.confirm');
Route::get('/order/success/{token}', [HomeController::class, 'successOrder'])->name('order.success');

// Route::get('/track-order', [OrderController::class, 'showTrackForm'])->name('track.order.form');

// Handle the tracking request
Route::post('/track-order', [HomeController::class, 'trackOrder'])->name('track.order');


// Route::get('/confirm-order', [HomeController::class, 'showConfirmOrder'])->name('confirm.order');
Route::get('/blog-page',[HomeController::class,'blog']);
Route::get('/whyus',[HomeController::class,'whyUs']);
Route::get('/brand-story',[HomeController::class,'brandStory']);
Route::get('/franchise-query',[HomeController::class,'franchiseQuery']);
Route::get('/book-event-page',[HomeController::class,'bookEvent']);
Route::get('/cart-locator',[HomeController::class,'cartLocator']);
Route::get('/career-page',[HomeController::class,'career']);
Route::get('/career-applied/{id}',[HomeController::class,'appliedCareer']);



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('/admin',[AdminController::class,'manageOrder'])->name('admin.manage.order');
    Route::get('/admin/pending-order',[AdminController::class,'managePendingOrder'])->name('admin.manage-pending.order');
    Route::get('/admin/manage-order/insert',[AdminController::class,'insertOrder']);
    Route::get('/admin/view-order/{id}',[OrderController::class,'viewOrder']);
    // Route::put('/admin/order/update/{id}',[OrderController::class,'updateOrder']);
    Route::put('/admin/order/update/{id}', [OrderController::class, 'update'])->name('order.update');
    Route::get('/admin/manage-franchise',[AdminController::class,'manageFranchise']);
    Route::get('/admin/manage-franchise/insert',[AdminController::class,'insertFranchise']);
    Route::get('/admin/manage-event',[AdminController::class,'manageEvent']);
    Route::get('/admin/manage-event/insert',[AdminController::class,'insertEvent']);
    Route::get('/admin/manage-blog',[AdminController::class,'manageBlog']);
    Route::get('/admin/manage-blog/insert',[AdminController::class,'insertBlog']);
    Route::get('/admin/manage-career',[AdminController::class,'manageCareer']);
    Route::get('/admin/manage-career/insert',[AdminController::class,'insertCareer']);
    Route::get('/admin/manage-job-form',[AdminController::class,'manageJobForm']);
    Route::get('/admin/manage-job-form/insert',[AdminController::class,'insertJobForm']);
    Route::get('/admin/manage-job-form/{id}',[AdminController::class,'viewJobForm']);
    Route::get('/admin/manage-gallery',[AdminController::class,'manageGallery']);
    Route::get('/admin/manage-gallery/insert',[AdminController::class,'insertGallery']);
    Route::get('/admin/manage-rating',[AdminController::class,'viewRating']);
});

Route::get('/login-page', function () {
    return view('auth.login');
});

// Route::get('/register-page', function () {
//     return view('auth.register');
// });
// Route::post('/register',[UserController::class,"register"])->name("register");


Route::match(['get',"post"],'/admin-login',[UserController::class,"login"])->name("login");
Route::post('/logout',[UserController::class,"logout"])->name("logout");



