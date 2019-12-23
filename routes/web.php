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

Route::get('/welcome', function () {
    return view('welcome');
});  

Route::get('/', 'IndexController@index');

Route::get('/placeDetails/{id}','IndexController@placeDetails');
Route::get('/hotelDetails/{id}','IndexController@hotelDetails');

Route::get('/hotels', 'IndexController@hotels');
Route::get('/places', 'IndexController@places');
Route::get('/allAddedPlace', 'PlaceController@allAddedPlace');


Route::POST('/search', 'IndexController@getSearchedPlace');



Auth::routes(['verify'=> true]);                 

Route::POST('/addComment', 'IndexController@addComment')->middleware(['auth']);
Route::get('/deleteComment/{id}','CommentsController@deleteComment')->middleware(['auth']);
Route::POST('/editedComment','CommentsController@editComment')->middleware(['auth']);
Route::GET('/editedComment/{id}','CommentsController@getComment')->middleware(['auth']);



Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth']);


Route::get('/admin', function(){

    return "You are an admin";
    
})->middleware(['auth', 'auth.admin']);

Route::get('/addNewPlace', function () {
    return view('/admin.addNewPlace');
})->middleware(['auth', 'auth.admin']);

Route::get('/addNewRestaurant', function () {
    return view('/admin.addNewRestaurant');
})->middleware(['auth', 'auth.admin']);

Route::get('/addNewHotel', function () {
    return view('/admin.addNewHotel');
})->middleware(['auth', 'auth.admin']);



/*Route::get('/editPlace/{id}', function () {
    return view('/admin.editPlace');
})->middleware(['auth', 'auth.admin']);
*/
Route::get('/editPlace/{id}','PlaceController@editPlace')->middleware(['auth', 'auth.admin']);
Route::POST('/updatePlace/{id}','PlaceController@updatePlace')->middleware(['auth', 'auth.admin']);
Route::POST('/updatePlace/{id}','PlaceController@updatePlace')->middleware(['auth', 'auth.admin']);
Route::get('/delete_place/{id}','PlaceController@delete_place')->middleware(['auth', 'auth.admin']);
Route::POST('/addNewPlace','PlaceController@addPlace')->middleware(['auth', 'auth.admin']);


Route::get('/restaurants', 'RestaurantController@restaurants');
Route::get('/restaurantDetails/{id}','RestaurantController@restaurantDetails');
Route::POST('/addNewRestaurant','RestaurantController@addRestaurant')->middleware(['auth', 'auth.admin']);

Route::get('/allAddedRestaurant','RestaurantController@allAddedRestaurant')->middleware(['auth', 'auth.admin']);
Route::get('/editRestaurant/{id}','RestaurantController@editRestaurant')->middleware(['auth', 'auth.admin']);
Route::POST('/updateRestaurant/{id}','RestaurantController@updateRestaurant')->middleware(['auth', 'auth.admin']);
Route::get('/delete_restaurant/{id}','RestaurantController@delete_restaurant')->middleware(['auth', 'auth.admin']);

Route::POST('/addNewHotel','HotelController@addHotel')->middleware(['auth', 'auth.admin']);

Route::get('/allAddedHotel','HotelController@allAddedHotel')->middleware(['auth', 'auth.admin']);
Route::get('/editHotel/{id}','HotelController@editHotel')->middleware(['auth', 'auth.admin']);
Route::POST('/updateHotel/{id}','HotelController@updateHotel')->middleware(['auth', 'auth.admin']);
Route::get('/delete_hotel/{id}','HotelController@delete_hotel')->middleware(['auth', 'auth.admin']);
