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
//use App\Http\Controllers\Admin\bookingController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('admin/booking', 'Admin\bookingController');
//Route::resource('admin/booking', bookingController::class);



Route::resource('admin/product', 'Admin\productController');
Route::resource('admin/timess', 'Admin\timessController');
Route::resource('admin/users', 'Admin\usersController');
Route::resource('admin/users', 'Admin\usersController');
Route::resource('admin/sizeimage', 'Admin\sizeimageController');
Route::resource('admin/printphotodetail', 'Admin\printphotodetailController');
Route::resource('admin/payment', 'Admin\paymentController');
Route::resource('admin/printphoto', 'Admin\printphotoController');
Route::resource('admin/formatss', 'Admin\formatssController');

Route::resource('admin/product', 'Admin\productController');
Route::resource('admin/receiving', 'dmin\receivingController');
Route::resource('admin/paper', 'Admin\paperController');
Route::resource('admin/paper', 'Admin\paperController');
Route::resource('admin/paper', 'Admin\paperController');
Route::resource('admin/receiving', 'dmin\receivingController');
Route::resource('admin/receiving', 'dmin\receivingController');
Route::resource('admin/formatprint', 'Admin\formatprintController');
Route::resource('admin/formatss', 'Admin\formatssController');
Route::resource('admin/sizeimage', 'Admin\sizeimageController');
Route::resource('admin/booking', 'Admin\BookingController');
Route::resource('admin/printphoto', 'Admin\printphotoController');
Route::resource('admin/printphotodetail', 'Admin\printphotodetailController');
Route::resource('admin/timess', 'Admin\TimessController');
Route::resource('admin/formatprint', 'Admin\formatprintController');
Route::resource('admin/editpayment', 'Admin\editpaymentController');
Route::resource('admin/deposit', 'Admin\depositController');
Route::resource('admin/editdeposit', 'Admin\editdepositController');