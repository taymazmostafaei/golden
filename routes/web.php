<?php

use App\Http\Controllers\Manager\MeltedController as ManagerMeltedController;
use App\Http\Controllers\Manager\RetailOrderController as ManagerRetailOrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Manager\UserController;
use App\Http\Controllers\MeltedController;
use App\Http\Controllers\RetailCategoryController;
use App\Http\Controllers\RetailController;
use App\Http\Controllers\RetailMediaController;
use App\Http\Controllers\RetailOrderController;

Route::prefix('/panel/user')->middleware('auth')->group(function () {

  # retails
  Route::get('/retails/categories', [RetailCategoryController::class, 'index'])->name('panel.user.retails.categories');
  Route::get('/retails/category/{retailCategory}', [RetailCategoryController::class, 'show'])->name('panel.user.retails.category');
  Route::resource('/retails/orders', RetailOrderController::class);

  # melted
  Route::get('/melted/json', [MeltedController::class, 'indexJson'])->name('panel.user.melted.json');
  Route::resource('/melted', MeltedController::class);

  Route::view('/myProfile', 'user.myProfile')->name('user.profile');
});

Route::prefix('/panel/manager')
  ->middleware('auth')
  ->group(function () {

    # dashboard
    Route::view('/', 'manager.dashboard')->name('manager.dashboard');

    # setting
    Route::view('/setting/possibilities', 'manager.setting.possibilities')->name('setting');

    # users
    Route::get('/users/list/json', [UserController::class, 'indexJson'])->name('user-list-json');
    Route::get('/users/change/{user}/status/{status}', [UserController::class, 'changeStatus'])->name('user-change-status');
    Route::post('/usercert/{user}', [UserController::class, 'certUpdate'])->name('user-cert-upload');
    Route::resource('/users', UserController::class);

    # retails
    Route::view('/retail/category', 'manager.retail.category.index')->name('retail.category');
    Route::get('/retail/category/list', [RetailCategoryController::class, 'indexJson'])->name('retail-category-list');
    Route::get('/retail/category/list/formated', [RetailCategoryController::class, 'formatedIndex'])->name(
      'retail-category-list-formated'
    );
    Route::get('/retail/list', [RetailController::class, 'list'])->name('retail-list');
    Route::post('/retailmedia', [RetailMediaController::class, 'store'])->name('retail-media-upload');
    Route::get('/retailmedia/delete/{retailMedia}', [RetailMediaController::class, 'destroy'])->name(
      'retail-media-destroy'
    );
    Route::resource('/retail', RetailController::class);

    # blog
    Route::view('/blog/list', 'manager.blog.list')->name('manager-order-list');
    Route::view('/blog/create', 'manager.blog.create')->name('manager-order-create');

    # orders
    Route::get('/orders/melted/json', [ManagerMeltedController::class, 'indexJson'])->name('orders.melted.json');
    Route::get('/orders/melted/ignore/{melted}', [ManagerMeltedController::class, 'ignore'])->name('orders.melted.ignore');
    Route::get('/orders/melted/accept/{melted}', [ManagerMeltedController::class, 'accept'])->name('orders.melted.accept');
    Route::resource('/orders/melted', ManagerMeltedController::class, ['as' => 'orders']);
    Route::get('/orders/retail/json', [ManagerRetailOrderController::class, 'indexJson'])->name('orders.retail.json');
    Route::resource('/orders/retail', ManagerRetailOrderController::class, ['as' => 'orders']);
  });

Auth::routes();

Route::view('/', 'index', ['pageConfigs' => ['myLayout' => 'front']])->name('index');
Route::view('/blog', 'blog', ['pageConfigs' => ['myLayout' => 'front']])->name('blog');
