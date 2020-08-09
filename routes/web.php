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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', 'AdminController@index');
//////Route::get('conv', function (){
//////    $users=App\users::all();
//////    foreach ($users as $user){
//////        $a = App\users::find($user->id);
//////        $a->password=bcrypt('12345678');
//////        $a->save();
//////    }
//////});
Route::get('/', 'HomeController@index');
Route::get('/product-categories/{id}', 'HomeController@getCategory')->name('Category');
Route::get('/products/{id}', 'HomeController@getProduct');
Route::get('/about','HomeController@about');
Route::get('/contacts','HomeController@contacts');
Route::get('/cart/{id}/add','CartController@add');
Route::get('/cart/','CartController@index')->name("cart.index");

Route::prefix('admin')
    ->namespace('Admin')
    ->group(function () {
//        Route::get('/login','LoginController@getLogin')->name('get_login');
//        Route::post('/login', 'LoginController@postLogin')->name('post_login');
        Route::get('/index', 'AdminController@index');
    Route::resource('product-categories','ProductCategoryController');
    Route::resource('products','ProductController');
});
