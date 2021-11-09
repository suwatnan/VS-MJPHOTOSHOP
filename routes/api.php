<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user/login', 'API\UsersController@login');
Route::post('user', 'API\UsersController@Register');
Route::get('user/{id}', 'API\UsersController@view');
Route::put('user/{id}', 'API\UsersController@update');
Route::post('user/{id}', 'API\UsersController@update');//fake update
Route::put('user/{id}', 'API\UsersController@updatepassword');
//Route::post('user/{id}', 'API\UsersController@updatepassword');//fake update
Route::get('sizeimage', 'API\SizeimageController@index');
Route::get('formatprint', 'API\FormatprintController@index');
Route::get('paper', 'API\PaperController@index');
Route::get('qq', 'API\BookingController@q');
Route::post('payment', 'API\PaymentController@payment');
Route::post('booking', 'API\BookingController@addbooking');

Route::post('up/{bookingID}', 'API\BookingController@up');
Route::post('up1/{printphotoID}', 'API\PrintphotoController@up1');
Route::post('up2/{printphotoID}', 'API\PrintphotoController@up2');

Route::get('booking/{id}', 'API\BookingController@viewbooking');

Route::get('viewhistory/{id}', 'API\BookingController@viewhistory');
Route::get('viewhistory2/{id}', 'API\PrintphotoController@viewhistory2');
Route::get('viewhistory3/{id}', 'API\PrintphotoController@viewhistory3');
Route::get('viewhistory4/{id}', 'API\PrintphotoController@viewhistory4');
Route::get('viewhistory5/{id}', 'API\PrintphotoController@viewhistory5');

Route::delete('booking/{id}', 'API\BookingController@deletebooking');
Route::delete('deleteprintphotodetail/{id}', 'API\PrintphotoController@deleteprintphotodetail');
Route::get('formatss', 'API\FormatssController@index');
Route::get('timess', 'API\TimessController@index');
Route::get('receiving', 'API\ReceivingController@index');
Route::get('product', 'API\ProductController@index');
Route::get('viewprintphotodetail/{id}', 'API\PrintphotoController@viewprintphotodetail');
Route::post('printphoto', 'API\PrintphotoController@addprintphoto');
Route::post('AddPayment', 'API\PaymentController@AddPayment');

Route::post('AddDeposit', 'API\DepositController@AddDeposit');
Route::post('AddDeposit2', 'API\DepositController@AddDeposit2');

Route::post('Addeditpayment', 'API\EditpaymentController@Addeditpayment');

Route::get('view/{id}', 'API\PrintphotoController@view');
Route::get('viewprintphotoID', 'API\PrintphotoController@viewprintphotoID');

Route::get('viewDeposit/{id}', 'API\DepositController@viewDeposit');
Route::get('viewPayment/{id}', 'API\PaymentController@viewPayment');