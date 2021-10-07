<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;


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

//phân quyền đăng nhập login
Route::middleware(['guest'])->group(function () {
    Route::get('login',[LoginController::class,'index'])->name('login');
    Route::post('login',[LoginController::class,'login'])->name('login');
});

//kiểm tra đã đăng nhập mới đc đi tiếp
Route::middleware(['auth'])->group(function () {
    Route::get('/',[HomeController::class,'index']);
    Route::get('/home',[HomeController::class,'index']);
    //logout
    Route::get('logout',[LoginController::class,'logout']);
    //user
    Route::get('/users',[UserController::class,'index']);
    Route::get('/users/{id}',[UserController::class,'update']);
    Route::get('/add-user',[UserController::class,'insert']);

    Route::post('/addUser',[UserController::class,'insert_user']);
    Route::post('/update-user/{id}',[UserController::class,'update_user']);

    Route::get('/delete/{id}',[UserController::class,'delete']);

    Route::get('/chat',[ChatController::class,'index']);
    Route::post('/send-message',[ChatController::class,'sendMessage']);
});

// //imgae file-manager
// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });






