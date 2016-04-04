<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
App::bind('Flash',
    App\Http\Flash::class);
Route::group(['middleware' => ['web']], function () {
    Route::get('downloadInvoice','PDFController@downloadInvoice');
    Route::get('/',['as' => 'welcome', function () {
        return view('welcome');
    }]);


    Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToAuthenticationServiceProvider');
    Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleAuthenticationServiceProviderCallback');
    Route::get('csstransitions', function(){
        return view('tinkering.csstransitions');
    });
    Route::get('plans', 'PlansController@index');
    Route::get('register_subsciption', function(){
        return view('auth.register_subsciption');
    });
    Route::post('sendContactEmail','ContactEmailController@send');
    Route::post('registerAndSubscribeToStripe', 'Auth\AuthController@registerAndSubscribeToStripe');
    Route::get('reports/dailySales', 'ReportsController@dailySales');
});