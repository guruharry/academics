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
    return view('auth/login');
});

Route::group(['prefix' => 'students'], function() {
  Route::get('/', 'StudentController@index');
  Route::match(['get', 'post'], 'create', 'StudentController@create');
  Route::match(['get', 'put'], 'update/{id}', 'StudentController@update');
  Route::get('show/{id}', 'StudentController@show');
  Route::delete('delete/{id}', 'StudentController@destroy');
  Route::get('print/{id}', 'StudentController@print');
  Route::get('preview}', 'StudentController@preview');
});





Route::get('/course', function () {
    return view('course/index');
});
Route::get('/course', 'CourseController@readItem');
Route::post('addItem', 'CourseController@addItem');
Route::post('editItem', 'CourseController@editItem');
Route::post('deleteItem', 'CourseController@deleteItem');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('semester', 'SemesterController');



Route::get('/units','UnitController@index');
Route::post('/storeunit','UnitController@store');
Route::patch('/updateunit','UnitController@update');
Route::get('/deleteunit/{id}','UnitController@destroy');


Route::get('/exams','ExamController@index');
Route::post('/storeexam','ExamController@store');
Route::patch('/updateexam','ExamController@update');
Route::get('/deleteexam/{id}','ExamController@destroy');


Route::get('/marks','MarksController@index');
Route::post('/storemark','MarksController@store');
Route::patch('/updatemark','MarksController@update');
Route::get('/deletemark/{id}','MarksController@destroy');