<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/subscribers', [SubscriberController::class, 'store']);
Route::get('/subscribers', [SubscriberController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts', [PostController::class, 'index']);
Route::post('/websites', [WebsiteController::class, 'store']);
Route::get('/websites', [WebsiteController::class, 'index']);
