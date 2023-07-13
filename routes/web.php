<?php

use App\Http\Controllers\PaperController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\QuestionController;

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
// user profiel Dashboard 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard')->middleware('verified');

// Admin profiel Dashboard 
Route::get('/adminDashboard', function () {
    return view('adminDashboard');
})->middleware(['auth'])->name('adminDashboard')->middleware('verified');

// ---------------------Paper Routes ---------------
Route::get('addPaper',[PaperController::class,'create'])->name('addPaper');
Route::post('addPaper',[PaperController::class,'store'])->name('savePaper');

Route::get('editPaper/{id}',[PaperController::class,'edit'])->name('editPaper');
Route::post('editPaper',[PaperController::class,'update'])->name('updatePaper');

Route::get('deletePaper/{id}',[PaperController::class,'delete'])->name('deletePaper');
Route::get('paperList',[PaperController::class,'paperList'])->name('paperList');

Route::post('importPapers',[PaperController::class,'importPapers'])->name('importPapers');
Route::get('showw',[PaperController::class,'showImport']);

// ---------------Subjects Routes ---------------
Route::get('addSubject',[SubjectController::class,'create'])->name('addSubject');
Route::post('addSubject',[SubjectController::class,'store'])->name('saveSubject');

Route::get('editSubject/{id}',[SubjectController::class,'edit'])->name('editSubject');
Route::post('editSubject',[SubjectController::class,'update'])->name('updateSubject');

Route::get('deleteSubject/{id}',[SubjectController::class,'delete'])->name('deleteSubject');
Route::get('subjectList',[SubjectController::class,'subjectList'])->name('subjectList');

Route::post('importSubjects',[SubjectController::class,'importSubjects'])->name('importSubjects');
Route::get('showw',[SubjectController::class,'showw']);

// ----------------Topics Routes-------------------------
Route::get('addTopic',[TopicsController::class,'create'])->name('addTopic');
Route::post('addTopic',[TopicsController::class,'store'])->name('saveTopic');

Route::get('editTopic/{id}',[TopicsController::class,'edit'])->name('editTopic');
Route::post('editTopic',[TopicsController::class,'update'])->name('updateTopic');

Route::get('deleteTopic/{id}',[TopicsController::class,'delete'])->name('deleteTopic');
Route::get('TopicList',[TopicsController::class,'TopicList'])->name('TopicList');

Route::post('importTopics',[TopicsController::class,'importTopics'])->name('importTopics');
Route::get('showw',[TopicsController::class,'showw']);
Route::get('getTopics/{id}',[TopicsController::class,'getTopics'])->name('getTopics');


// -------------------Questions Routes------------------ 
Route::get('addQuestion/{id}',[QuestionController::class,'create'])->name('addQuestion');
Route::post('addQuestion',[QuestionController::class,'store'])->name('saveQuestion');

Route::get('editQuestion/{id}',[QuestionController::class,'edit'])->name('editQuestion');
Route::post('editQuestion',[QuestionController::class,'update'])->name('updateQuestion');

Route::get('deleteQuestion/{id}',[QuestionController::class,'delete'])->name('deleteQuestion');
Route::get('listQuestion/{id}',[QuestionController::class,'listQuestion'])->name('listQuestion');

Route::post('importQuestion',[QuestionController::class,'importQuestion'])->name('importQuestion');
Route::get('showw',[QuestionController::class,'showw']);











require __DIR__.'/auth.php';
