<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/admin-users',                            'Admin\AdminUsersController@index');
    Route::get('/admin/admin-users/create',                     'Admin\AdminUsersController@create');
    Route::post('/admin/admin-users',                           'Admin\AdminUsersController@store');
    Route::get('/admin/admin-users/{adminUser}/edit',           'Admin\AdminUsersController@edit')->name('admin/admin-users/edit');
    Route::post('/admin/admin-users/{adminUser}',               'Admin\AdminUsersController@update')->name('admin/admin-users/update');
    Route::delete('/admin/admin-users/{adminUser}',             'Admin\AdminUsersController@destroy')->name('admin/admin-users/destroy');
    Route::get('/admin/admin-users/{adminUser}/resend-activation','Admin\AdminUsersController@resendActivationEmail')->name('admin/admin-users/resendActivationEmail');
});

/* Auto-generated profile routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/profile',                                'Admin\ProfileController@editProfile');
    Route::post('/admin/profile',                               'Admin\ProfileController@updateProfile');
    Route::get('/admin/password',                               'Admin\ProfileController@editPassword');
    Route::post('/admin/password',                              'Admin\ProfileController@updatePassword');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/people',                                 'Admin\PersonController@index');
    Route::get('/admin/people/create',                          'Admin\PersonController@create');
    Route::post('/admin/people',                                'Admin\PersonController@store');
    Route::get('/admin/people/{person}/edit',                   'Admin\PersonController@edit')->name('admin/people/edit');
    Route::post('/admin/people/{person}',                       'Admin\PersonController@update')->name('admin/people/update');
    Route::delete('/admin/people/{person}',                     'Admin\PersonController@destroy')->name('admin/people/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/students',                               'Admin\StudentController@index');
    Route::get('/admin/students/create',                        'Admin\StudentController@create');
    Route::post('/admin/students',                              'Admin\StudentController@store');
    Route::get('/admin/students/{student}/edit',                'Admin\StudentController@edit')->name('admin/students/edit');
    Route::post('/admin/students/{student}',                    'Admin\StudentController@update')->name('admin/students/update');
    Route::delete('/admin/students/{student}',                  'Admin\StudentController@destroy')->name('admin/students/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/products',                               'Admin\ProductController@index');
    Route::get('/admin/products/create',                        'Admin\ProductController@create');
    Route::post('/admin/products',                              'Admin\ProductController@store');
    Route::get('/admin/products/{product}/edit',                'Admin\ProductController@edit')->name('admin/products/edit');
    Route::post('/admin/products/{product}',                    'Admin\ProductController@update')->name('admin/products/update');
    Route::delete('/admin/products/{product}',                  'Admin\ProductController@destroy')->name('admin/products/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/inventories',                            'Admin\InventoryController@index');
    Route::get('/admin/inventories/create',                     'Admin\InventoryController@create');
    Route::post('/admin/inventories',                           'Admin\InventoryController@store');
    Route::get('/admin/inventories/{inventory}/edit',           'Admin\InventoryController@edit')->name('admin/inventories/edit');
    Route::post('/admin/inventories/{inventory}',               'Admin\InventoryController@update')->name('admin/inventories/update');
    Route::delete('/admin/inventories/{inventory}',             'Admin\InventoryController@destroy')->name('admin/inventories/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/services',                               'Admin\ServiceController@index');
    Route::get('/admin/services/create',                        'Admin\ServiceController@create');
    Route::post('/admin/services',                              'Admin\ServiceController@store');
    Route::get('/admin/services/{service}/edit',                'Admin\ServiceController@edit')->name('admin/services/edit');
    Route::post('/admin/services/{service}',                    'Admin\ServiceController@update')->name('admin/services/update');
    Route::delete('/admin/services/{service}',                  'Admin\ServiceController@destroy')->name('admin/services/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/invoices',                               'Admin\InvoiceController@index');
    Route::get('/admin/invoices/create',                        'Admin\InvoiceController@create');
    Route::post('/admin/invoices',                              'Admin\InvoiceController@store');
    Route::get('/admin/invoices/{invoice}/edit',                'Admin\InvoiceController@edit')->name('admin/invoices/edit');
    Route::post('/admin/invoices/{invoice}',                    'Admin\InvoiceController@update')->name('admin/invoices/update');
    Route::delete('/admin/invoices/{invoice}',                  'Admin\InvoiceController@destroy')->name('admin/invoices/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/invoice-items',                          'Admin\InvoiceItemController@index');
    Route::get('/admin/invoice-items/create',                   'Admin\InvoiceItemController@create');
    Route::post('/admin/invoice-items',                         'Admin\InvoiceItemController@store');
    Route::get('/admin/invoice-items/{invoiceItem}/edit',       'Admin\InvoiceItemController@edit')->name('admin/invoice-items/edit');
    Route::post('/admin/invoice-items/{invoiceItem}',           'Admin\InvoiceItemController@update')->name('admin/invoice-items/update');
    Route::delete('/admin/invoice-items/{invoiceItem}',         'Admin\InvoiceItemController@destroy')->name('admin/invoice-items/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/ranks',                                  'Admin\RankController@index');
    Route::get('/admin/ranks/create',                           'Admin\RankController@create');
    Route::post('/admin/ranks',                                 'Admin\RankController@store');
    Route::get('/admin/ranks/{rank}/edit',                      'Admin\RankController@edit')->name('admin/ranks/edit');
    Route::post('/admin/ranks/{rank}',                          'Admin\RankController@update')->name('admin/ranks/update');
    Route::delete('/admin/ranks/{rank}',                        'Admin\RankController@destroy')->name('admin/ranks/destroy');
});