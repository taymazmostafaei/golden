<?php

use App\Http\Controllers\BlogClientController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Manager\MeltedController as ManagerMeltedController;
use App\Http\Controllers\Manager\RetailOrderController as ManagerRetailOrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Manager\UserController;
use App\Http\Controllers\MeltedController;
use App\Http\Controllers\Myprofile;
use App\Http\Controllers\RetailCategoryController;
use App\Http\Controllers\RetailController;
use App\Http\Controllers\RetailMediaController;
use App\Http\Controllers\RetailOrderController;
use App\Http\Controllers\SettingController;

Route::prefix('/panel/user')->middleware('auth')->group(function () {

  # retails
  Route::get('/retails/categories', [RetailCategoryController::class, 'index'])->name('panel.user.retails.categories');
  Route::get('/retails/category/{retailCategory}', [RetailCategoryController::class, 'show'])->name('panel.user.retails.category');
  Route::resource('/retails/orders', RetailOrderController::class);

  # melted
  Route::get('/melted/json', [MeltedController::class, 'indexJson'])->name('panel.user.melted.json');
  Route::resource('/melted', MeltedController::class);

  Route::post('/myProfile/usercert/', [Myprofile::class, 'certUpdate'])->name('profile-cert-upload');
  Route::get('/myProfile', [Myprofile::class, 'index'])->name('user.profile');
  Route::put('/myProfile/update', [Myprofile::class, 'update'])->name('myprofile.update');
});

Route::prefix('/panel/manager')
  ->middleware('auth')
  ->group(function () {

    # dashboard
    Route::view('/', 'manager.dashboard')->name('manager.dashboard')->middleware('check.access:admin_dashboard');

    # setting
    Route::middleware('check.access:setting')->group(function () {
      # users
      Route::resource('/setting', SettingController::class);
    });

    Route::middleware('check.access:users')->group(function () {
      # users
      Route::get('/users/list/json', [UserController::class, 'indexJson'])->name('user-list-json');
      Route::get('/users/change/{user}/status/{status}', [UserController::class, 'changeStatus'])->name('user-change-status');
      Route::post('/usercert/{user}', [UserController::class, 'certUpdate'])->name('user-cert-upload');
      Route::put('/users/access/{user}', [UserController::class, 'accessUpdate'])->name('users.access.update');
      Route::resource('/users', UserController::class);
    });

    Route::middleware('check.access:retails')->group(function () {
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
    });

    Route::middleware('check.access:news')->group(function () {
      # blog
      Route::post('/blog/media/upload/{blog}', [BlogController::class, 'mediaUpload'])->name('blog-media-upload');
      Route::resource('/blog', BlogController::class);
    });

    Route::middleware('check.access:orders')->group(function () {
      # orders
      Route::get('/orders/melted/json', [ManagerMeltedController::class, 'indexJson'])->name('orders.melted.json');
      Route::get('/orders/melted/ignore/{melted}', [ManagerMeltedController::class, 'ignore'])->name('orders.melted.ignore');
      Route::get('/orders/melted/accept/{melted}', [ManagerMeltedController::class, 'accept'])->name('orders.melted.accept');
      Route::resource('/orders/melted', ManagerMeltedController::class, ['as' => 'orders']);
      Route::get('/orders/retail/json', [ManagerRetailOrderController::class, 'indexJson'])->name('orders.retail.json');
      Route::resource('/orders/retail', ManagerRetailOrderController::class, ['as' => 'orders']);
    });
    
  });

Auth::routes();

# client
Route::get('/news', [BlogClientController::class, 'index'])->name('news');
Route::get('/news/{blog}', [BlogClientController::class, 'show'])->name('news.show');
Route::get('/', [LandingController::class, 'index'])->name('index');
