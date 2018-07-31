<?php

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

//Testing


//Search
// Route::get('/getsearchstores','SearchController@getstores_bysearch');
// Route::get('/getstores','SearchController@getstores');

Route::get('/searchstores','SearchController@indexstore');
Route::get('/searchfood', 'SearchController@indexfood');

Route::get('/search','SearchController@search');
Route::get('/search_get_store','SearchController@search_get_store');
Route::get('/search_get_food', 'SearchController@search_get_food');


//Favorite
Route::resource('favorite','FavoriteController');
Route::get('/addfavorite/{id_store}', 'FavoriteController@add_favorite');

//BlogComment
Route::resource('blog','BlogController');

//Map
Route::resource('location','LocationController');

//Stores
Route::resource('stores','StoreController');
Route::get('/store', function () {
    return view('stores.store');
});
Route::get('/storeslist', 'StoreController@storelist');

//Foods
Route::resource('myfoods', 'FoodController');
Route::get('/food/{id}','FoodController@formlist');
Route::get('/foodslist', 'FoodController@foodlist');
Route::get('/create_food/{id_store}', 'FoodController@create_food');

//General
Route::get('/', function () {
    return redirect()->action('DashboardController@dashboardshow');
});
Route::get('/dashboard', 'DashboardController@dashboardshow');
Route::get('/promotions', function () {
    return view('promotions');
});

Route::get('/about', function () {
    return view('about');
});

//Profile
Route::resource('profile', 'UserController');

//Auth
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

//AuthAdminstrator
Route::group(['middleware' => ['auth','admin']], function(){
    Route::get('/admin',function(){
        return view('admin');
    });
    Route::resource('/typestore','TypestoreController');
    Route::resource('/typefood','TypefoodController');
    Route::resource('/managestore','ManagestoreController');
    Route::get('/confirm_store/{id}','ManagestoreController@confirm_store');
    Route::get('/confirm_show/{id}','ManagestoreController@confirm_show');
    Route::get('/delete_store/{id}','ManagestoreController@delete_store');
    Route::get('/delete_show/{id}','ManagestoreController@delete_show');
    Route::get('/sendmailshow/{id}','ManagestoreController@sendmailshow');
    Route::get('/sendmail/{id}','ManagestoreController@sendmail');
});


