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

    Route::get('/', function() {
        return view('layouts.reserveren.reservering');
    })->name('reserveren');

});    

    Route::post('/new', [
        'uses' => 'ReserveringController@postReservering',
        'as' => 'sendmailReservering'
    ]);





Route::group(['prefix' => 'aanmelding'], function() {

    Route::get('/', function() {
        return view('layouts.aanmelden.aanmelding');
    })->name('aanmelding');
    
    Route::get('/vervolg', function() {
        return view('layouts.aanmelden.vervolg');
    })->name('vervolg');

}); 

Route::group(['prefix' => 'organisator'], function(){

    Route::get('/login', function() {
       return view('layouts.organisator.login');
    })->name('login');
});

    Route::get('/contact', [
        'uses' => 'ContactMessageController@getContactIndex',
        'as' => 'contact'
        ]);
        
    Route::post('/contact/sendmail', [
        'uses' => 'ContactMessageController@postSendMessage',
        'as' => 'contact.send'
        ]);    

