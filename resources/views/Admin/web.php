<?php

use App\Models\Permission;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
// Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes(['register' => false]);
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/','HomeController@index')->name('home');

    // User
    Route::delete('users/destroy', 'UserController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UserController');

    //Profile
    Route::get('user_info/index', function () {
        return view('admin.usersetting.index');
    })->name('user_info.index');
    Route::put('user_info/edit/profile/{id}', 'ProfileController@updateProfile')->name('user_info.updateProfile');
    Route::put('user_info/updatePassword/{id}', 'ProfileController@updatePassword')->name('user_info.updatePassword');

    // Permission
    Route::delete('permissions/destroy', 'PermissionController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionController');

    // Roles
    Route::delete('roles/destroy', 'RoleController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RoleController');

    // SaleCategory
    Route::resource('sale_category', 'SaleCategoryController');

    // City
    Route::resource('city', 'CityController');

    // Country
    Route::resource('country', 'CountryController');

    // Currency
    Route::resource('currency', 'CurrencyController');

    // Source
    Route::resource('source', 'SourceController');

    // Township
    Route::post('townships/import', 'TownshipController@uplodeTownShips')->name('townships.import');
    Route::resource('township', 'TownshipController');

    // Street
    Route::get('street/export', 'StreetController@exportCsv')->name('street.export');
    Route::delete('street/destory/{id}', 'StreetController@destroy')->name('street.destroy');
    Route::get('street/getTownships/{id}','StreetController@getTownship')->name('street.getTownships');
    Route::get('street/search', 'StreetController@searchstreet')->name('street.search');
    Route::post('streets/import', 'StreetController@uploadStreets')->name('streets.import');
    Route::resource('street', 'StreetController');

    // Road
    Route::resource('road', 'RoadController');

    // Customer
    // Route::get('customers/customer-listing', 'CustomerController@getCustomerListing')->name('customers.customer-listing');
    Route::delete('customers/destory/{id}', 'CustomerController@destroy')->name('customers.destroy');
    Route::get('customers/pdf/{id}', 'CustomerController@generatePDF')->name('customers.printPDF');
    Route::get('customers/customer-listing/search', 'CustomerController@searchCustomerListing')->name('customers.search-customer-listing');
    Route::get('customers/getTownships/{id}', 'CustomerController@getTownship')->name('customers.getTownships');
    Route::get('customers/getStreets/{id}', 'CustomerController@getStreet')->name('customers.getStreets');
    Route::get('customers/export', 'CustomerController@exportCsv')->name('customers.export');
    Route::resource('customers', 'CustomerController');

    // Property
    Route::resource('property', 'PropertyController');

    // Customer Type
    Route::resource('customer-type', 'CustomerTypeController');

    // Customer Type Detail
    Route::resource('customerTypes-detail', 'CustomerTypeDetailController');

    // AuditLogs
    Route::resource('audit_logs', 'AuditLogsController');

    // Housing
    Route::get('housing/export', 'HousingController@exportCsv')->name('housing.export');
    Route::get('housing/pdf/{id}', 'HousingController@generatePDF')->name('housing.printPDF');
    Route::get('housing/showTrash','HousingController@showTrash')->name('housing.showTrash');
    Route::get('housing/restoreTrash/{id}', 'HousingController@restoreTrash')->name('housing.restoreTrash'); 
    Route::delete('housing/trashDelete/{id}','HousingController@trashDelete')->name('housing.trashDelete');
    Route::get('housing/getTownships/{id}','HousingController@getTownship')->name('housing.getTownships');
    Route::get('housing/getStreets/{id}','HousingController@getStreets')->name('housing.getStreets');
    Route::get('housing/getWards/{id}','HousingController@getWards')->name('housing.getWards');
    Route::get('housing/getRoads/{id}','HousingController@getRoads')->name('housing.getRoads');
    Route::get('housing/housing-listing','HousingController@getHousingListing')->name('housing.housing-listing');
    Route::get('housing/select-housing/search','HousingController@search')->name('housing.search');
    Route::get('housing/show/{id}','HousingController@show')->name('housing.show');
    Route::resource('housing', 'HousingController')->except(['show']);

    // Unit
    Route::resource('unit', 'UnitController');

    // Customer Request
    Route::get('customer-request/getTownships/{id}', 'CustomerRequestController@getTownship')->name('customer-request.getTownships');
    Route::get('customer-request/getRoads/{id}', 'CustomerRequestController@getRoads')->name('customer-request.getRoads');
    Route::resource('customer-request', 'CustomerRequestController');

    // Ward
    Route::delete('ward/destory/{id}', 'WardController@destroy')->name('ward.destroy');
    Route::post('ward/import', 'WardController@uploadWards')->name('ward.import');
    Route::get('ward/export', 'WardController@exportCsv')->name('ward.export');
    Route::get('ward/getTownships/{id}','WardController@getTownship')->name('ward.getTownships');
    Route::get('ward/search', 'WardController@searchward')->name('ward.search');
    Route::resource('ward', 'WardController');

    // WorkingDetail
    Route::delete('working-detail/destory/{id}', 'WorkingDetailController@destroy')->name('working-detail.destroy');
    Route::get('working-detail/export', 'WorkingDetailController@exportCsv')->name('working-detail.export');
    Route::get('working-detail/select-housing', "WorkingDetailController@selectHousing")->name('working-detail.selectHousing');
    Route::get('working-detail/select-housing/search', 'WorkingDetailController@searchHousing')->name('working-detail.search');
    Route::get('working-detail/search', 'WorkingDetailController@searchWorkingDetail')->name('working-detail.search');
    Route::post('working-detail/create', 'WorkingDetailController@create')->name('working-detail.create');
    Route::get('working-detail/customer-listing/search', 'WorkingDetailController@searchCustomerListing')->name('working-detail.search-customer-listing');
    // Route::get('working-detail/working-detail-listing', 'WorkingDetailController@getWorkingDetailListing')->name('working-detail.working-detail-listing');
    Route::resource('working-detail', 'WorkingDetailController');


    // Succeed
    Route::delete('succeed/destory/{id}', 'SucceedController@destroy')->name('succeed.destroy');
    Route::get('succeed/export', 'SucceedController@exportCsv')->name('succeed.export');
    Route::get('succeed/select-housing', "SucceedController@selectHousing")->name('succeed.selectHousing');
    Route::get('succeed/select-housing/search', 'SucceedController@searchHousing')->name('succeed.search');
    Route::get('succeed/search', 'SucceedController@searchSucceed')->name('succeed.search');
    Route::get('succeed/customer-listing/search', 'SucceedController@searchCustomerListing')->name('succeed.search-customer-listing');
    // Route::get('succeed/succeed-listing', 'SucceedController@getsucceedListing')->name('succeed.succeed-listing');
    Route::post('succeed/create', 'SucceedController@create')->name('succeed.create');
    Route::resource('succeed', 'SucceedController');

    // Enquiry Status
    Route::resource('enquiry-status', 'EnquiryStatusController');

    Route::post('posts/media', 'PostController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::resource('posts', 'PostController');


    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
