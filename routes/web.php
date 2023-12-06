<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Auth::routes();
// Route::get('/', 'HomeController@index')->name('home');


Auth::routes();
Route::group(['namespace'=> 'Auth'], function () {
    Route::get('dang-ky', [App\Http\Controllers\Auth\RegisterController::class, 'getRegister'])->name('get.register');
    Route::post('dang-ky',[App\Http\Controllers\Auth\RegisterController::class, 'postRegister'])->name('post.register');

    Route::get('dang-nhap',[App\Http\Controllers\Auth\LoginController::class, 'getLogin'])->name('get.login');
    Route::post('dang-nhap',[App\Http\Controllers\Auth\LoginController::class, 'postLogin'])->name('post.login');

    Route::get('dang-xuat',[App\Http\Controllers\Auth\LoginController::class, 'getLogout'])->name('get.logout.user');

    


});
Route::get('quen-mat-khau',[App\Http\Controllers\Auth\ResetPasswordController::class, 'forgetpassword'])->name('forget.password');
Route::post('quen-mat-khau', [App\Http\Controllers\Auth\ResetPasswordController::class, 'sendMail']);

use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('mat-khau-moi', [ResetPasswordController::class, 'changepa'])->name('mat-khau-moi');

Route::post('mat-khau-moi/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('mat-khau-moi.post');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::post('danh-muc/sapxep', [App\Http\Controllers\CategoryController::class, 'sortProduct'])->name('sortproduct');

Route::get('danh-muc/{slug}-{id}', [App\Http\Controllers\CategoryController::class, 'getListProduct'])->name('get.list.product');


Route::get('danh-muc/', [App\Http\Controllers\CategoryController::class, 'getListProductall'])->name('get.list.product.all');
Route::get('danh-muc/search/{search}', [App\Http\Controllers\CategoryController::class, 'getListProductsearch'])->name('get.list.product.search');

Route::get('san-pham/{slug}-{id}', [App\Http\Controllers\ProductDetailController::class, 'productDetail'])->name('get.detail.product');


// Route::prefix('shopping')->group(function (){
   
//     // Route::get('/add/{id}', [App\Http\Controllers\ShoppingCartController::class, 'addProduct'])->name('add.shopping.cart');
//     Route::get('/delete/{id}', [App\Http\Controllers\ShoppingCartController::class, 'deleteProduct'])->name('delete.shopping.cart');
    

//     Route::get('danh-sach', [App\Http\Controllers\ShoppingCartController::class, 'getListShoppingCart'])->name('get.list.shopping.cart');

// });

Route::group(['prefix' => 'gio-hang', 'middleware' => 'CheckLoginUser'], function () {
    Route::get('/add/{id}', [App\Http\Controllers\ShoppingCartController::class, 'addProduct'])->name('add.shopping.cart');
    Route::post('/thanh-toan/dat-hang', [App\Http\Controllers\ShoppingCartController::class, 'PostFormPay'])->name('post.form.pay');
    // Route::post('/thanh-toan', [App\Http\Controllers\ShoppingCartController::class, 'saveInfoShoppingCart']);
    Route::post('/update-quantity', [App\Http\Controllers\ShoppingCartController::class, 'updatesoluong'])->name('updatesoluong');

    Route::prefix('shopping')->group(function (){
   
        // Route::get('/add/{id}', [App\Http\Controllers\ShoppingCartController::class, 'addProduct'])->name('add.shopping.cart');
        Route::get('/delete/{id}', [App\Http\Controllers\ShoppingCartController::class, 'deleteProduct'])->name('delete.shopping.cart');
        
    
        Route::get('danh-sach', [App\Http\Controllers\ShoppingCartController::class, 'getListShoppingCart'])->name('get.list.shopping.cart');
        Route::post('don-hang', [App\Http\Controllers\ShoppingCartController::class, 'taodonhang'])->name('taodonhang');

        
   
        


    });

});
Route::get('payment-successful', [App\Http\Controllers\ShoppingCartController::class, 'showpayment']);

Route::get('lien-he', [App\Http\Controllers\ContactController::class, 'getContact'])->name('get.contact');
Route::post('lien-he', [App\Http\Controllers\ContactController::class, 'saveContact'])->name('save.contact');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
  

use App\Http\Controllers\Auth\LoginController;




// Routes for Facebook
Route::get('/dang-nhap/facebook', [LoginController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('/dang-nhap/facebook/callback', [LoginController::class, 'handleFacebookCallback']);

// Routes for Google
Route::get('/dang-nhap/google', [LoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/dang-nhap/callback', [LoginController::class, 'handleGoogleCallback']);



Route::get('/news',[App\Http\Controllers\NewController::class, 'returnview'])->name('returnview');
Route::get('/news/{slug}-{id}',[App\Http\Controllers\NewController::class, 'detailnew'])->name('detailnew');


Route::get('/quanlytaikhoan',[App\Http\Controllers\AccountManager::class, 'accountmanager'])->name('accountmanager');

Route::get('/changepassword',[App\Http\Controllers\AccountManager::class, 'changepasss'])->name('changepasss');
Route::get('/billing',[App\Http\Controllers\AccountManager::class, 'billing'])->name('billing');

Route::post('/changepassword' ,[App\Http\Controllers\AccountManager::class, 'changepassword'] );

Route::get('/DeleteAccount' , [App\Http\Controllers\AccountManager::class, 'delete'] )->name('deleteAccount');

Route::post('/quanlytaikhoan',[App\Http\Controllers\AccountManager::class, 'saveprofile'])->name('saveprofile');

Route::post('/post-comment',[App\Http\Controllers\CommentController::class, 'postcomment'])->name('postcomment');
Route::get('/post-comment',[App\Http\Controllers\CommentController::class, 'getcomment']);
