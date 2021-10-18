<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Admin
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SlidesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDetailsController;
use App\Http\Controllers\Admin\ChatController;
//UI


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
Route::prefix('admin')->group(function () {
    
    Route::middleware(['guest'])->group(function () {
        Route::get('login',[LoginController::class,'index'])->name('login');
        Route::post('login',[LoginController::class,'login'])->name('login');
    });
    
    //kiểm tra đã đăng nhập mới đc đi tiếp
    Route::middleware(['auth'])->group(function () {
        Route::get('',[HomeController::class,'index']);
        Route::get('/home',[HomeController::class,'index']);
        //logout
        Route::get('logout',[LoginController::class,'logout']);
        //user
        Route::get('users',[UserController::class,'index']);
        Route::get('users/{id}',[UserController::class,'update']);
        Route::get('add-user',[UserController::class,'insert']);
    
        Route::post('addUser',[UserController::class,'insert_user']);
        Route::post('update-user/{id}',[UserController::class,'update_user']);
    
        Route::get('delete-user/{id}',[UserController::class,'delete']);
        

        //chat freature
        Route::get('chat',[ChatController::class,'index']);
        Route::post('send-message',[ChatController::class,'sendMessage']);

        //slides
        Route::get('slides',[SlidesController::class,'index']);
        Route::get('slides/{id}',[SlidesController::class,'update']);
        Route::get('add-slide',[SlidesController::class,'insert']);
    
        Route::post('addSlide',[SlidesController::class,'insert_slide']);
        Route::post('update-slide/{id}',[SlidesController::class,'update_slide']);
    
        Route::get('delete-slide/{id}',[SlidesController::class,'delete']);

        //Category
        Route::get('categories',[CategoriesController::class,'index']);
        Route::get('categories/{id}',[CategoriesController::class,'update']);
        Route::get('add-category',[CategoriesController::class,'insert']);
    
        Route::post('addCategory',[CategoriesController::class,'insert_category']);
        Route::post('update-category/{id}',[CategoriesController::class,'update_category']);
    
        Route::get('delete-category/{id}',[CategoriesController::class,'delete']);

        //Product
        Route::get('products',[ProductController::class,'index']);
        Route::get('products/{id}',[ProductController::class,'update']);
        Route::get('add-product',[ProductController::class,'insert']);
        Route::post('addProduct',[ProductController::class,'insert_product']);
        Route::post('update-product/{id}',[ProductController::class,'update_product']);
    
        Route::get('delete-product/{id}',[ProductController::class,'delete']);

        //Product
        Route::get('product-details',[ProductDetailsController::class,'index']);
        Route::get('product-details/{id}',[ProductDetailsController::class,'update']);
        Route::get('add-product-detail',[ProductDetailsController::class,'insert']);
        Route::post('addProductDetail',[ProductDetailsController::class,'insert_product_details']);
        Route::post('update-product-details/{id}',[ProductDetailsController::class,'update_product_details']);
    
        Route::get('delete-product-details/{id}',[ProductDetailsController::class,'delete']);
    });
    
    // //imgae file-manager
    // Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    //     \UniSharp\LaravelFilemanager\Lfm::routes();
    // });
});


//UI

Route::get('/',[App\Http\Controllers\UI\HomeController::class,'index']);

Route::get('/home',[App\Http\Controllers\UI\HomeController::class,'index'])->name('home');

Route::post('/register',[App\Http\Controllers\UI\RegisterController::class,'register']);

Route::post('/login',[App\Http\Controllers\UI\LoginController::class,'login']);

Route::get('/logout',[App\Http\Controllers\UI\LoginController::class,'logout']);








