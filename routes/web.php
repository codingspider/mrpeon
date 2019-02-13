<?php



Route::get('/', function () {
    return view('welcome');
});


Route::get('/testsession', 'TestController@index');

Route::get('/get_details/{id}', 'RequestQuantity@get');


Route::post('/merchant/added/{id}', 'RequestQuantity@assign_agent');

Route::get('/merchant/request/accept', 'AcceptRequestController@getIndex');

RoutE::get('/get_details/accept/{id}', 'AcceptRequestController@getdetails');


Route::post('application/approve', 'AcceptRequestController@postApprove');
Route::post('application/reject/{id}', 'AcceptRequestController@postReject');


Route::get('/delivery/man/live/search', 'DeliveryManSearchController@index');

Route::get('/live_search/action', 'DeliveryManSearchController@action');
