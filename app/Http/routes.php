<?php

Route::get('/', function () {
    return view('welcome');
});

// API ROUTES
Route::group(array('prefix' => 'api'), function() {
    Route::resource('dvdstart', 'DVDStartController', array('only' => array('index')));
    Route::resource('moviestart', 'MovieStartController', array('only' => array('index')));
});
