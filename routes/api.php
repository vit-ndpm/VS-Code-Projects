<?php

use App\Http\Controllers\API\PaperController;
use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\ResponseController;
use App\Http\Controllers\API\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::post('registerUser',[UserAuthController::class,'register']);
Route::post('login',[UserAuthController::class,'userLogin']);
Route::post('forgetPassword',[UserAuthController::class,'forgetPassword']);

Route::middleware("auth:sanctum")->controller(UserAuthController::class)->group(function(){

    Route::post('logout','logout');
    Route::get('changePassword','changePassword');

});
Route::middleware('auth:sanctum')->controller(PaperController::class)->group(function(){
    Route::get('getAllPapers','getPapers');
    Route::get('getPaperById/{id}','getPaperById');
});
Route::middleware('auth:sanctum')->controller(QuestionController::class)->group(function(){
    Route::get('getAllQuestionByPaperId/{paperId}','getAllQuestionByPaperId');
    Route::get('getQuestionByQuestionNoAndPaperId/{paperId}/{questionId}','getQuestionByQuestionNoAndPaperId');
});
Route::middleware('auth:sanctum')->controller(ResponseController::class)->group(function(){
    Route::get('getAllResponse','getAllResponse');
    Route::post('setResponse/','setResponse');
    Route::post('updateResponse/','updateResponse');
    Route::post('delteResposne/','delteResposne');
});
