<?php

Route::group(['middleware' => ['web']], function () {

    Route::get("/", [
        "as" => "accueil",
        "uses" => "AccueilController@index"
    ]);

    Route::get("/projet/{slug}", [
        "as" => "projet",
        "uses" => "ProjetController@show"
    ]);

    Route::get("/sharp4", function() {
        return view("sharp");
    });

});

//Route::get("/25aout2017", function() {
//    return view("tmp");
//});