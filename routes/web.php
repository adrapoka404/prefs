<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\ServicesController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    
});
//Rutaspara empleados
Route::resource('employes', EmployeesController::class)->names('employees');
Route::post('employes/search', [EmployeesController::class, 'index'])->name('employees.search');

//Rutas para empresas
Route::resource('companies', CompaniesController::class)->names('companies');

//Rutas para Puestos
Route::resource('positions', PositionsController::class)->names('positions');
//Rutas para servicios 
Route::get('services.zipcode/{zip}', [ServicesController::class, 'zipcode'])->name('services.zipcode');

//Rutas para Cursos
Route::resource('courses', CoursesController::class)->names('courses');

//Rutas para Blog
Route::resource('admin_blog', BlogController::class)->names('admin_blog');