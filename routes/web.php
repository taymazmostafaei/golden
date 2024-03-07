<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Manager\UserController;
use App\Http\Controllers\RetailCategoryController;
use App\Http\Controllers\RetailController;
use App\Http\Controllers\RetailMediaController;

Route::view('/', 'manager.dashboard')->name('manager-dashboard');

Route::prefix('/panel/user')->middleware('auth')->group(function () {

  Route::get('/retails/categories', [RetailCategoryController::class, 'index'])->name('panel.user.retails.categories');
  Route::get('/retails/category/{retailCategory}', [RetailCategoryController::class, 'show'])->name('panel.user.retails.category');
});

Route::prefix('/panel/manager')
  ->middleware('auth')
  ->group(function () {
    Route::view('/', 'manager.dashboard')->name('manager-dashboard');
    // manager / user
    Route::view('/user/show', 'manager.user.show');
    // manager / setting
    Route::view('/setting/possibilities', 'manager.setting.possibilities');
    Route::view('/setting/setFy', 'manager.setting.setFy')->name('manager-setting');
    // manager / order
    Route::view('/order/melted', 'manager.order.melted')->name('manager-order-melted');
    Route::view('/order/bonakDary', 'manager.order.bonakDary')->name('manager-order-bonakDary');
    // manager / bonakdaryProduct

    Route::get('/users/list/json', [UserController::class, 'indexJson'])->name('user-list-json');
    Route::get('/users/change/{user}/status/{status}', [UserController::class, 'changeStatus'])->name('user-change-status');
    Route::post('/usercert/{user}', [UserController::class, 'certUpdate'])->name('user-cert-upload');
    Route::resource('/users', UserController::class);

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

    Route::view('/bonakdary_product/create_pro', 'manager.bonakdary_product.create_pro')->name(
      'manager-bonak-pro-create'
    );
    Route::view('/bonakdary_product/list', 'manager.bonakdary_product.list')->name('manager-bonak-list');
    // manager / blog
    Route::view('/blog/list', 'manager.blog.list')->name('manager-order-list');
    Route::view('/blog/create', 'manager.blog.create')->name('manager-order-create');

    // User Part
    // user / melted
    Route::view('/user/melted', 'user.melted')->name('user-melted');
    // user / bonakDary
    Route::view('/user/bonakDary/category', 'user.bonakDary.category')->name('user-bonakDary-category');
    Route::view('/user/bonakDary/products_list', 'user.bonakDary.products_list')->name('user-bonakDary-products_list');
    // user / my profile
    Route::view('/user/myProfile', 'user.myProfile')->name('user-myProfile');

    // landing page
  });
// Manager Part
// manager / dashboard
Auth::routes();

Route::view('/index', 'index', ['pageConfigs' => ['myLayout' => 'front']])->name('index');
Route::view('/blog', 'blog', ['pageConfigs' => ['myLayout' => 'front']])->name('blog');
