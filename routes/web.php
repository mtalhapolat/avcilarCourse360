<?php

use Illuminate\Support\Facades\Artisan;
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



Route::get('/login', '\App\Http\Controllers\UserController@login')->name('login');
Route::get('/logout', '\App\Http\Controllers\UserController@logout')->name('logout');
Route::post('/authenticate', '\App\Http\Controllers\UserController@authenticate')->name('authenticate');
Route::get('/kpsbridge', '\App\Http\Controllers\UserController@kpsbridge')->name('kpsbridge');
Route::post('/formkpsbridge', '\App\Http\Controllers\FormController@formkpsbridge')->name('formkpsbridge');

Route::get('/', '\App\Http\Controllers\CourseController@home')->name('home');
Route::get('/basvuru', '\App\Http\Controllers\CourseController@basvuru')->name('basvuru');
Route::get('/akademi-beyoglu', '\App\Http\Controllers\CourseController@akademibeyoglu')->name('akademibeyoglu');
Route::get('/lgs', '\App\Http\Controllers\CourseController@lgs')->name('lgs');
Route::get('/basvurularim', '\App\Http\Controllers\CourseController@registered')->name('registered');
Route::post('/insertenroll', '\App\Http\Controllers\CourseController@insertenroll')->name('insertenroll');
Route::post('/inserteventenroll', '\App\Http\Controllers\CourseController@inserteventenroll')->name('inserteventenroll');
Route::get('/insertkindergartenenroll', '\App\Http\Controllers\CourseController@insertkindergartenenroll')->name('insertkindergartenenroll');
Route::get('/insertkindergartensurvey', '\App\Http\Controllers\CourseController@insertkindergartensurvey')->name('insertkindergartensurvey');
Route::post('/cancellenroll', '\App\Http\Controllers\CourseController@cancellenroll')->name('cancellenroll');
Route::post('/cancelleventenroll', '\App\Http\Controllers\CourseController@cancelleventenroll')->name('cancelleventenroll');
Route::get('/sertifikalarim', '\App\Http\Controllers\CourseController@certificates')->name('certificates');
Route::get('/turnuva', '\App\Http\Controllers\CourseController@tournament')->name('tournament');

Route::get('/anaokulu', '\App\Http\Controllers\CourseController@anaokulupage')->name('anaokulupage');
Route::get('/yuvamiz-avcilar', '\App\Http\Controllers\CourseController@anaokulu')->name('anaokulu');
Route::get('/yuvamiz-avcilar/2', '\App\Http\Controllers\CourseController@anaokulu2')->name('anaokulu2');
Route::get('/yuvamiz-avcilar/3', '\App\Http\Controllers\CourseController@anaokulu3')->name('anaokulu3');
Route::get('/yuvamiz-avcilar/4', '\App\Http\Controllers\CourseController@anaokulu4')->name('anaokulu4');
Route::get('/yuvamiz-avcilar/5', '\App\Http\Controllers\CourseController@anaokulu5')->name('anaokulu5');
Route::get('/yuvamiz-avcilar/6', '\App\Http\Controllers\CourseController@anaokulu6')->name('anaokulu6');
Route::get('/yuvamiz-avcilar/basvurularim', '\App\Http\Controllers\AnaokuluController@basvurularim')->name('anaokulubasvurularim');
Route::post('/anaokuluregister', '\App\Http\Controllers\CourseController@anaokuluregister')->name('anaokuluregister');
Route::post('/anaokulufileupload', '\App\Http\Controllers\AnaokuluController@anaokulufileupload')->name('anaokulufileupload');
Route::post('/anaokuluenrollcheck', '\App\Http\Controllers\AnaokuluController@enrollcheck')->name('anaokuluenrollcheck');

Route::get('/etkinlikler', '\App\Http\Controllers\CourseController@etkinlikler')->name('etkinlikler');
Route::get('/sports', '\App\Http\Controllers\CourseController@sports')->name('sports');
Route::get('/ozgem', '\App\Http\Controllers\CourseController@ozgem')->name('ozgem');
Route::get('/kefken', '\App\Http\Controllers\CourseController@home')->name('kefken');
Route::get('/kefken-basvuru', '\App\Http\Controllers\KefkenController@home')->name('kefkennew');
Route::get('/profile', '\App\Http\Controllers\CourseController@profile')->name('profile');
Route::post('/profileupdate', '\App\Http\Controllers\CourseController@profileupdate')->name('profileupdate');
Route::get('/belgeyukle', '\App\Http\Controllers\UserController@uploadfile')->name('uploadfile');
Route::post('/insertfile', '\App\Http\Controllers\UserController@insertfile')->name('insertfile');
Route::post('/deleteFile', '\App\Http\Controllers\UserController@deleteFile')->name('deleteFile');
Route::post('/sendMessage', 'App\Http\Controllers\MessageController@sendMessage')->name('sendMessage');
Route::get('/getBranchInfo', 'App\Http\Controllers\CourseController@getBranchInfo')->name('getBranchInfo');
Route::get('/getCertificate', 'App\Http\Controllers\CourseController@getCertificate')->name('getCertificate');
Route::get('/forms/{id}', 'App\Http\Controllers\FormController@showform')->name('showform');
Route::get('/submitform/{id}', 'App\Http\Controllers\FormController@showform')->name('forms.submit');
Route::get('/yksbasvuru', '\App\Http\Controllers\FormController@yksbasvuru')->name('yksbasvuru');
Route::get('/23nisan', '\App\Http\Controllers\FormController@nisan')->name('nisan');
Route::post('/insertformanswer', '\App\Http\Controllers\FormController@insertformanswer')->name('insertformanswer');

Route::post('/insertkefkenenroll', '\App\Http\Controllers\KefkenController@insertenroll')->name('insertkefkenenroll');
Route::post('/kefkenenrollcheck', '\App\Http\Controllers\KefkenController@kefkenenrollcheck')->name('kefkenenrollcheck');
Route::get('/kefken-ortaokul', '\App\Http\Controllers\FormController@kefkenOrtaokul')->name('kefkenOrtaokul');
Route::get('/kefken-lise', '\App\Http\Controllers\FormController@kefkenLise')->name('kefkenLise');
Route::get('/kefken-universite', '\App\Http\Controllers\FormController@kefkenUniversite')->name('kefkenUniversite');
Route::get('/kefken-annecocuk', '\App\Http\Controllers\FormController@kefkenAnnecocuk')->name('kefkenAnnecocuk');
Route::get('/kefken-emekli', '\App\Http\Controllers\FormController@kefkenEmekli')->name('kefkenEmekli');
Route::get('/kefken-gunubirlik', '\App\Http\Controllers\FormController@kefkenGunubirlik')->name('kefkenGunubirlik');
Route::get('/kefken-balayi', '\App\Http\Controllers\FormController@kefkenBalayi')->name('kefkenBalayi');

Route::get('/anket', '\App\Http\Controllers\SurveyController@home')->name('surveyhome');
Route::post('/insertsurveyanswer', '\App\Http\Controllers\SurveyController@insertsurveyanswer')->name('insertsurveyanswer');

Route::get('/applogin', 'App\Http\Controllers\UserController@applogin')->name('applogin');

