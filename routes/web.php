<?php

// use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//, 'role:admin'
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('admin')->controller(DashboardController::class)->group(function () {
        Route::get('/dashboard2', 'Dashboard')->name('admin.dashboard');
        Route::get('/messages', 'ContactMessage')->name('admin.messages');

    });
    Route::prefix('admin/messages')->controller(MessagesController::class)->group(function () {
        Route::get('/index', 'index')->name('admin.messages.index');
    });
    Route::prefix('admin/category')->controller(CategoryController::class)->group(function () {
        Route::get('/create', 'create')->name('admin.category.create');
        Route::post('/store', 'store')->name('admin.category.store');
        Route::get('/index', 'index')->name('admin.category.index');
        Route::get('/edit/{id}', 'edit')->name('admin.category.edit');
        Route::post('/update/{id}', 'update')->name('admin.category.update');
        Route::get('/delete/{id}', 'destroy')->name('admin.category.delete');
        Route::post('/activate/{id}', 'activate')->name('admin.category.activate');
        Route::post('/deactivate/{id}', 'deactivate')->name('admin.category.deactivate');
    });
    Route::prefix('admin/sub/category')->controller(SubCategoryController::class)->group(function () {
        Route::get('/create', 'create')->name('admin.sub.category.create');
        Route::get('/index', 'index')->name('admin.sub.category.index');
    });
    Route::prefix('admin/brands')->controller(BrandsController::class)->group(function () {
        Route::get('/create', 'create')->name('admin.brands.create');
        Route::get('/index', 'index')->name('admin.brands.index');
    });
    Route::prefix('admin/products')->controller(ProductController::class)->group(function () {
        Route::get('/create', 'create')->name('admin.product.create');
        Route::get('/index', 'index')->name('admin.product.index');
    });
});

require __DIR__ . '/auth.php';
