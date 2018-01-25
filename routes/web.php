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


use App\Jobs\SendNewsletterJob;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/message', function () {
    return view('message');
});
Route::resource('subscribe', 'SubscriberController');

/*Route::get('send', function(){
    $job = (new SendNewsletterJob())
        ->delay(Carbon::now()->addSeconds(10));

    dispatch($job);
    return('sent');
});*/

Route::get('send', 'NewsletterController@send')->name('send');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
