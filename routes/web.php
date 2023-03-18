<?php

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
Route::get('/index', 'HomeController@index')->name('index');
Route::get('/quiz/{id}/', 'HomeController@show')->name('quiz.show');
Route::get('/{id}/play', 'PlayController@play')->name('play');

Auth::routes();

Route::group(['middleware'=> 'auth'], function(){
    Route::get('/mypage', 'MypageController@mypage')->name('mypage');
    Route::get('/logout', 'MypageController@logOut')->name('logout');
    Route::get('/prof/{id}/edit', 'MypageController@prof')->name('prof');
    Route::post('/prof/{id}/update/', 'MypageController@profEdit')->name('prof_edit');
    Route::get('/drills/{id}/problems', 'DrillController@problems_index')->name('problems_index');
    Route::get('/problems/{id}/edit', 'DrillController@edit')->name('edit');
    Route::get('/new', 'DrillController@new')->name('new');
    Route::get('/{id}/new', 'DrillController@same')->name('same');
    Route::post('/create', 'DrillController@create')->name('create');
    Route::post('/problems/{id}/update', 'DrillController@update')->name('problem.update');
    Route::post('/drills/{id}/delete', 'DrillController@drills_delete')->name('drills.delete');
    Route::post('/problem/{id}/delete', 'DrillController@problem_delete')->name('problem.delete');
    Route::get('/withdraw', 'MypageController@toWithdraw')->name('toWithdraw');
    Route::post('/{id}/withdraw', 'MypageController@withdrawal')->name('withdraw');
});

