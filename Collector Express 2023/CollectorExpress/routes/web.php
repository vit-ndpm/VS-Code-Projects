<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
// --------------------Admin Routes -----------------------------------
Route::prefix('admin')->group(function(){
    Route::get('/login',[AdminController::class,'index'])->name('admin.loginfrom');
    Route::post('/login',[AdminController::class,'adminLogin'])->name('admin.login');
    Route::get('/logout',[AdminController::class,'adminLogout'])->name('admin.logout');
Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard')->middleware('admin');
});
// --------------------Admin Routes  End -----------------------------------

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
