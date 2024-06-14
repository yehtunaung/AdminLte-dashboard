<?php

use Illuminate\Support\Facades\Route;
// Route::get('/',[\App\Http\Controllers\Admin\HomeController::class,'index'])->name('home');

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
    // return view('home');
});

Auth::routes(['register' => true]);
Route::get('/test-500', function () {
    abort(500);
});
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // User
    Route::delete('users/destroy', 'UserController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UserController');

    //Profile
    Route::get('user_info/index', function () { return view('admin.usersetting.index'); })->name('user_info.index');
    Route::put('user_info/edit/profile/{id}', 'ProfileController@updateProfile')->name('user_info.updateProfile');
    Route::put('user_info/updatePassword/{id}','ProfileController@updatePassword')->name('user_info.updatePassword');

    // Permission
    Route::delete('permissions/destroy', 'PermissionController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionController');

    // Roles
    Route::delete('roles/destroy', 'RoleController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RoleController');

    //  Media
    Route::post('media/photo', 'MediaController@storeMedia')->name('media.storeMedia');
    Route::resource('media', 'MediaController');
});
