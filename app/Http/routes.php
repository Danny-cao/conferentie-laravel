<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


    Route::get('/', function() {
      return view('index'); 
    })->name('index');


Route::group(['prefix' => 'agenda'], function() {

    Route::get('/', function() {
        return view('layouts.agenda.agenda');
    })->name('agenda');

    Route::get('/vervolg', function() {
       return view('layouts.agenda.vervolg');
    })->name('vervolg');    
    
});


Route::group(['prefix' => 'reservering'], function() {

    Route::get('/', [
        'uses' => 'ReserveringController@getReserveringIndex',
        'as' => 'reservering'
        ]);
     
    Route::post('/postreservering', [
        'uses' => 'ReserveringController@postReservering',
        'as' => 'postreservering'
        ]); 
    
    Route::get('reservering_compleet', [
        'uses' => 'ReserveringController@getReserveringCompleet',
        'as' => 'reservering.compleet'
        ]);    

});    


Route::group(['prefix' => 'aanmelding'], function() {
    
    Route::get('/', [
        'uses' => 'AanmeldingController@getAanmeldingIndex',
        'as' => 'Aanmelding'
        ]);
        
    Route::post('/postaanmelding', [
        'uses' => 'AanmeldingController@postAanmelding',
        'as' => 'postaanmelding'
        ]);    
    
    Route::get('/vervolg', function() {
        return view('layouts.aanmelden.vervolg');
    })->name('vervolg');
    
        Route::post('/contact/sendmail', [
        'uses' => 'ContactMessageController@postSendMessage',
        'as' => 'contact.send'
        ]);    

}); 




Route::group(['prefix' => 'organisator'], function(){
    

});




    Route::get('/organisator/login', [
        'uses' => 'UserController@getLogin',
        'as' => 'user.login'
        ]);
        
    Route::post('/organisator/login', [
        'uses' => 'UserController@postLogin',
        'as' => 'user.login'
        ]);
        
    Route::get('/organisator/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'user.logout'
        ]);    


    Route::group(['middleware' => 'auth'], function(){
        
    Route::get('/organisator/dashboard', [
        'uses' => 'UserController@getDashboard',
        'as' => 'user.dashboard'
        ]);
    });


        
    Route::get('/contact', [
        'uses' => 'ContactMessageController@getContactIndex',
        'as' => 'contact'
        ]);
        
    Route::post('/contact/sendmail', [
        'uses' => 'ContactMessageController@postSendMessage',
        'as' => 'contact.send'
        ]);    

