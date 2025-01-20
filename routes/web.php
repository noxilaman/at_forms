<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.sbadmin');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {
    return view('layouts.sbadmin');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/admin/users', App\Http\Controllers\UsersController::class);
    Route::resource('/admin/question_sets', App\Http\Controllers\QuestionSetsController::class);
    Route::get('/admin/question_sets/add_question_group/{id}', [App\Http\Controllers\QuestionSetsController::class, 'addQuestionGroup'])->name('question_sets.addquestiongroup');
    Route::post('/admin/question_sets/add_question_group/{id}', [App\Http\Controllers\QuestionSetsController::class, 'storeQuestionGroup'])->name('question_sets.storequestiongroup');
    Route::get('/admin/question_sets/moveup_question_group/{id}', [App\Http\Controllers\QuestionSetsController::class, 'moveupQuestionGroup'])->name('question_sets.moveup_question_group');
    Route::get('/admin/question_sets/movedown_question_group/{id}', [App\Http\Controllers\QuestionSetsController::class, 'movedownQuestionGroup'])->name('question_sets.movedown_question_group');
    Route::get('/admin/question_sets/remove_question_group/{id}', [App\Http\Controllers\QuestionSetsController::class, 'removeQuestionGroup'])->name('question_sets.remove_question_group');
    Route::resource('/admin/question_groups', App\Http\Controllers\QuestionGroupsController::class);
    Route::get('/admin/question_groups/add_question/{id}', [App\Http\Controllers\QuestionGroupsController::class, 'addQuestion'])->name('question_groups.addquestion');
    Route::post('/admin/question_groups/add_question/{id}', [App\Http\Controllers\QuestionGroupsController::class, 'storeQuestion'])->name('question_groups.storequestion');
    Route::get('/admin/question_groups/moveup_question/{id}', [App\Http\Controllers\QuestionGroupsController::class, 'moveupQuestion'])->name('question_groups.moveup_question');
    Route::get('/admin/question_groups/movedown_question/{id}', [App\Http\Controllers\QuestionGroupsController::class, 'movedownQuestion'])->name('question_groups.movedown_question');
    Route::get('/admin/question_groups/remove_question/{id}', [App\Http\Controllers\QuestionGroupsController::class, 'removeQuestion'])->name('question_groups.remove_question');
    Route::resource('/admin/questions', App\Http\Controllers\QuestionsController::class);

});

Route::resource('crops', App\Http\Controllers\CropsController::class);
Route::get('/crops/activate/{id}', [App\Http\Controllers\CropsController::class, 'activate'])->name('crops.activate');
Route::resource('farmers', App\Http\Controllers\FarmersController::class);
Route::resource('harvesters', App\Http\Controllers\HarvestersController::class);
Route::resource('drivers', App\Http\Controllers\DriversController::class);
Route::resource('mechanics', App\Http\Controllers\MechanicsController::class);
Route::resource('harvest_logs', App\Http\Controllers\HarvestLogsController::class);
Route::get('harvest_logs/issues/{id}', [App\Http\Controllers\HarvestLogsController::class, 'issues'])->name('harvest_logs.issues');
Route::get('harvest_logs/add_issue/{id}', [App\Http\Controllers\HarvestLogsController::class, 'addIssue'])->name('harvest_logs.createissue');
Route::post('harvest_logs/add_issue/{id}', [App\Http\Controllers\HarvestLogsController::class, 'storeIssue'])->name('harvest_logs.storeissue');
Route::get('harvest_logs/issue/{id}', [App\Http\Controllers\HarvestLogsController::class, 'editIssue'])->name('harvest_logs.editissue');
Route::patch('harvest_logs/issue/{id}', [App\Http\Controllers\HarvestLogsController::class, 'updateIssue'])->name('harvest_logs.updateissue');
Route::delete('harvest_logs/issue/{id}', [App\Http\Controllers\HarvestLogsController::class, 'destroyIssue'])->name('harvest_logs.destroyissue');
Route::get('harvest_logs/viewissue/{id}', [App\Http\Controllers\HarvestLogsController::class, 'showIssue'])->name('harvest_logs.showissue');
Route::resource('maintains', App\Http\Controllers\MaintainsController::class);
Route::get('maintains/survey/{id}', [App\Http\Controllers\MaintainsController::class, 'survey'])->name('maintains.survey');
Route::post('maintains/survey/{id}', [App\Http\Controllers\MaintainsController::class, 'surveyUpdate'])->name('maintains.storesurvey');

require __DIR__.'/auth.php';
