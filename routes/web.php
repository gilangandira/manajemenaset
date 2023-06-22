<?php


use App\Models\Assets;
use App\Http\Middleware\isLogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CRUDAssetsController;
use App\Http\Controllers\CRUDCategoryController;



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

Route::get('/', [AssetsController::class, 'index'])->middleware('isLogin');

// Route::get('/profile', [AssetsController::class,'index']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/registration', [RegisterController::class, 'index']);
Route::post('/registration', [RegisterController::class, 'regist']);

// Route::get('/assets', [CRUDAssetsController::class, 'index'])->middleware('isLogin');
// Route::get('/{asset:serial_number}',[AssetsController::class,'show'])->middleware('isLogin');
// Route::get('/categories/{category:slug}',[AssetsController::class,'category'])->middleware('isLogin');


Route::resource('/assets', CRUDAssetsController::class)->middleware('isLogin');
Route::resource('/categories', CRUDCategoryController::class)->middleware('isLogin');
Route::resource('/account', AccountController::class)->middleware('isAdmin');


Route::put('/profile/{{$serial_number}}/edit', [CRUDAssetsController::class, 'update']);
Route::get('/profile/{name}', [ProfileController::class, 'profile']);
Route::get('/profile/{name}/edit', [ProfileController::class, 'edit']);
Route::put('/profile/{name}/edit', [ProfileController::class, 'update']);