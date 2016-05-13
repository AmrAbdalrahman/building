<?php

/*
 * admin root
 */
Route::group(['middleware' => ['web','admin']], function (){
    
    #datatable Ajax
    
   Route::get('/adminpanel/users/data','UserController@anydata');
   Route::get('/adminpanel/bu/data','BuController@anydata');
    Route::get('/adminpanel/contact/data','ContactController@anydata');
   //Route::get('adminpanel/users/data',['as'=>'adminpanel.users.data','users'=>'UserController@anydata']);
    
    #main admin /adminpanel/users/data
    Route::get('/adminpanel','AdminController@index');
    Route::get('/adminpanel/buYear/statistics','AdminController@showYearstatistics');
    Route::post('/adminpanel/buYear/statistics','AdminController@showthisyear');


    #users
    Route::resource('/adminpanel/users','UserController');
    Route::post('/adminpanel/users/changepassword/','UserController@UpdatePassword');
    Route::get('/adminpanel/users/{id}/delete','UserController@destroy');
    #settingsite
    Route::get('/adminpanel/sitesetting','SiteSettingController@index');
    Route::post('/adminpanel/sitesetting','SiteSettingController@store');
    
    #users
    Route::resource('/adminpanel/bu','BuController',['except' => ['index','show']]);

    Route::get('/adminpanel/bu/{id?}','BuController@index');


    Route::get('/adminpanel/bu/{id}/delete','BuController@destroy');


    Route::get('/adminpanel/change_status/{id}/{status}','BuController@changestatus');

    #users
    Route::resource('/adminpanel/contact','ContactController');
    Route::get('/adminpanel/contact/{id}/delete','ContactController@destroy');
    
});
/*
 * user root
 */
Route::group(['middleware' => 'web'], function (){
    Route::auth();
Route::get('/', function () {
    return view('welcome');
});
    Route::get('/ShowAllBuilding','BuController@showAllEnable');
    Route::get('/forRent','BuController@forRent');
    Route::get('/forBuy','BuController@forBuy');
    Route::get('/type/{type}','BuController@showByType');
    Route::get('/search','BuController@search');
    Route::get('/SingleBuilding/{id}','BuController@showSingle');
    Route::get('/ajax/bu/information','BuController@getAjaxInfo');


    Route::get('/contact', 'HomeController@contact');
    Route::post('/contact','ContactController@store');

    Route::get('/contact', 'HomeController@contact');

    Route::get('/user/create/building','BuController@userAddview');
    Route::post('/user/create/building','BuController@userstore');

    Route::get('/user/buildingshow','BuController@showuserBuilding')->middleware('auth');
    Route::get('/user/buildingshowwaiting','BuController@buildingshowwaiting')->middleware('auth');

    Route::get('/user/editsetting','UserController@usereditInfo')->middleware('auth');
    Route::patch('/user/editsetting',['as' => 'user.editsetting' , 'uses' => 'UserController@userupdateprofile'])->middleware('auth');

    Route::post('/user/changepassword','UserController@changepassword')->middleware('auth');

    Route::get('/user/edit/building/{id}','BuController@userEditBuilding')->middleware('auth');


    Route::patch('/user/update/building','BuController@userUpdateBuilding')->middleware('auth');












    Route::get('/home', 'HomeController@index');

});
