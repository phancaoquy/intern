<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('banner/home', [BannerController::class, 'getHomeBanner']);
Route::get('user/ambassador', [UserController::class, 'getAmbassor']);
Route::get('product/newArrival', [ProductController::class, 'getNewArrival']);
Route::get('product/topSeller', [ProductController::class, 'getTopSeller']);
