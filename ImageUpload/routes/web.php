<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\UserController;
use App\Imports\UsersImport;;


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

Route::post('save',[ImageUploadController::class,'save']);
Route::get('delete/{id?}',[ImageUploadController::class,'delete']);
Route::get('edit/{id?}',[ImageUploadController::class,'edit']);
Route::post('update',[ImageUploadController::class,'update']);
Route::get('show',[UserController::class,'show']);
Route::post('import',[UserController::class,'import']);


