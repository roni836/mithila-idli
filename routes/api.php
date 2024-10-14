<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CareerController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/order',[OrderController::class,'store'])->name('order.store');
Route::get('/order',[OrderController::class,'index'])->name('order.index');
Route::get('/pending-order',[OrderController::class,'pendingOrder'])->name('order.pending.index');
Route::delete('/register/delete/{id}',[OrderController::class,'destroy']);
Route::get('/order/view/{id}',[OrderController::class,'orderShow']);
Route::put('/order/edit/{id}',[OrderController::class,'orderUpdate']);
Route::delete('/order/delete/{id}',[OrderController::class,'orderDestroy']);
Route::get('/order/trash',[OrderController::class,'trash']);
Route::delete('/order/forceDelete/{id}',[OrderController::class,'forceDelete']);
Route::patch('/order/restore/{id}',[OrderController::class,'restore']);

Route::post('/franchise-enquiry',[FranchiseController::class,'franchiseStore'])->name('franchise.store');
Route::get('/franchise-enquiry',[FranchiseController::class,'franchiseIndex'])->name('franchise.index');
Route::get('/franchise-enquiry/view/{id}',[FranchiseController::class,'show']);
Route::put('/franchise-enquiry/edit/{id}',[FranchiseController::class,'update']);
Route::delete('/franchise-enquiry/delete/{id}',[FranchiseController::class,'destroy']);
Route::get('/franchise-enquiry/trash',[FranchiseController::class,'trash']);
Route::delete('/franchise-enquiry/forceDelete/{id}',[FranchiseController::class,'forceDelete']);
Route::patch('/franchise-enquiry/restore/{id}',[FranchiseController::class,'restore']);

Route::post('/blog',[CommonController::class,'blogStore'])->name('blog.store');
Route::get('/blog-admin',[CommonController::class,'blogIndex'])->name('blog.index');
Route::get('/blog',[CommonController::class,'homeBlogIndex'])->name('home.blog.index');
Route::put('/blog/edit/{id}',[CommonController::class,'updateBlog']);
Route::get('/blog/view/{id}',[CommonController::class,'showBlog']);

Route::post('/book-event',[EventController::class,'eventBooking'])->name('book.event.store');
Route::get('/book-event',[EventController::class,'eventIndex'])->name('book.event.index');
Route::get('/book-event/view/{id}',[EventController::class,'eventShow']);
Route::put('/book-event/edit/{id}',[EventController::class,'eventUpdate']);
Route::delete('/book-event/delete/{id}',[EventController::class,'eventDestroy']);
Route::get('/book-event/trash',[EventController::class,'trash']);
Route::delete('/book-event/forceDelete/{id}',[EventController::class,'forceDelete']);
Route::patch('/book-event/restore/{id}',[EventController::class,'restore']);


Route::post('/rating',[CommonController::class,'ratingStore'])->name('rate.store');
Route::get('/rating',[CommonController::class,'ratingIndex'])->name('rate.index');
Route::put('/rating/edit/{id}',[CommonController::class,'updateRating']);
Route::get('/rating/view/{id}',[CommonController::class,'showRating']);

Route::post('/career',[CareerController::class,'careerStore'])->name('career.store');
Route::get('/career',[CareerController::class,'careerIndex'])->name('career.index');
Route::get('/career/view/{id}',[CareerController::class,'careerShow']);
Route::put('/career/edit/{id}',[CareerController::class,'careerUpdate']);
Route::delete('/career/delete/{id}',[CareerController::class,'careerDestroy']);
Route::get('/career/trash',[CareerController::class,'trash']);
Route::delete('/career/forceDelete/{id}',[CareerController::class,'forceDelete']);
Route::patch('/career/restore/{id}',[CareerController::class,'restore']);


Route::post('/job-applied',[JobController::class,'jobAppliedStore'])->name('job.applied.store');
Route::get('/job-applied',[JobController::class,'jobAppliedIndex'])->name('job.applied.index');
Route::get('/job-applied/view/{id}',[JobController::class,'show']);
Route::put('/job-applied/edit/{id}',[JobController::class,'update']);
Route::delete('/job-applied/delete/{id}',[JobController::class,'destroy']);
Route::get('/job-applied/trash',[JobController::class,'trash']);
Route::delete('/job-applied/forceDelete/{id}',[JobController::class,'forceDelete']);
Route::patch('/job-applied/restore/{id}',[JobController::class,'restore']);


Route::post('/gallery',[GalleryController::class,'store'])->name('gallery.store');
Route::get('/gallery',[GalleryController::class,'index'])->name('gallery.index');
Route::get('/home/gallery',[CommonController::class,'galleryIndex'])->name('home.gallery.all');
Route::put('/gallery/edit/{id}',[GalleryController::class,'update']);
Route::get('/gallery/view/{id}',[GalleryController::class,'show']);
Route::delete('/gallery/delete/{id}',[GalleryController::class,'destroy']);



Route::put('/job-form/status/{id}',[JobController::class,'updateStatus']);


