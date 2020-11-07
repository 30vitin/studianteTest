<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;


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
    return view('auth.login');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//login y logout para entrar al sistema
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.action');

//registros de usuarios del sistema
Route::get('/registrar', [App\Http\Controllers\Auth\RegisterController::class, 'showRegisterForm']);
Route::post('/registrar', [App\Http\Controllers\Auth\RegisterController::class, 'createNewUser'])->name('register.action');


//sistema
Route::group(['middleware' => [App\Http\Middleware\CheckSession::class]], function () {

	//get
    Route::get('/register-student', [App\Http\Controllers\RegisterStudentController::class, 'showFormRegisterStudent']);
    Route::get('/consult-student', [App\Http\Controllers\RegisterStudentController::class, 'tableConsultStudent']);

    Route::get('/edit-student/{id}', [App\Http\Controllers\RegisterStudentController::class, 'showFormEdit']);

    Route::get('/edit-student/{id}/{nameId}/destroy', [App\Http\Controllers\RegisterStudentController::class, 'deleteStudent']);

    //post
    Route::post('/register-student/save', [App\Http\Controllers\RegisterStudentController::class, 'saveStudent'])->name("register-student.action");
    //put
    Route::put('/register-student/{id}/update', [App\Http\Controllers\RegisterStudentController::class, 'updateStudent'])->name("student.update.action");

});



