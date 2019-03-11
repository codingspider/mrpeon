<?php




Route::get('/', function () {
    return view('welcome');
});



Route::get('/get_details/{id}', 'RequestQuantity@get');


Route::post('/merchant/added/{id}', 'RequestQuantity@assign_agent');

Route::get('/merchant/request/accept', 'AcceptRequestController@getIndex');

RoutE::get('/get_details/accept/{id}', 'AcceptRequestController@getdetails');


Route::post('application/approve', 'AcceptRequestController@postApprove');

Route::post('application/reject/{id}', 'AcceptRequestController@postReject');

Route::get('/update_status', 'AcceptRequestController@zonesupdate');


Route::get('/delivery/man/live/search', 'DeliveryManSearchController@index');

Route::get('/delivery/man/live/search/result', 'DeliveryManSearchController@action')->name('search');

Route::get('details/pages/barcode', 'BarcodeController@barcode');

Route::get('details/pages/barcode/view/{id}', 'BarcodeController@details');


Route::get('details/pages/barcode/view/', 'BarcodeController@search');


Route::get('pickup/request', 'PickUpController@index');








