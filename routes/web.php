<?php

// use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;

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
Route::middleware(['auth','role:admin'])->group(function () {
    Route::prefix('admin')->controller(DashboardController::class)->group(function () {
        Route::get('/dashboard2', 'Dashboard')->name('admin.dashboard');
        Route::get('/messages', 'ContactMessage')->name('admin.messages');
        Route::get('/create-category', 'CreateCategory')->name('admin.create-category');
        Route::get('/all-category', 'AllCategory')->name('admin.all-category');
        Route::get('/create-subcategory', 'CreateSubCategory')->name('admin.create-subcategory');
        Route::get('/all-subcategory', 'AllSubCategory')->name('admin.all-subcategory');
        Route::get('/create-brand', 'CreateBrands')->name('admin.create-brands');
        Route::get('/all-brands', 'AllBrands')->name('admin.all.brands');
    });
    Route::prefix('admin/products')->controller(ProductController::class)->group(function () {
        Route::get('/create-product', 'create')->name('admin.product.create');
        Route::get('/all-products', 'index')->name('admin.product.index');
    });
});
// Route::middleware('auth','role.admin')->group(function(){
//     Route::prefix('admin')->Controller()->group(function(){

//     });
//});

require __DIR__ . '/auth.php';
