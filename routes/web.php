<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Models\Employee;
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
    $numberEmployee = Employee::count();
    $numberMaleEmployee = Employee::where('sex', 'Nam')->count();
    $numberFemaleEmployee = Employee::where('sex', 'Nữ')->count();
    return view('welcome', compact('numberEmployee','numberMaleEmployee','numberFemaleEmployee'));
})->middleware('auth');

Route::group(['middleware' => ['auth', 'roles:admin']], function(){
    
    Route::get('/them-nhan-vien', [EmployeeController::class, 'add'])->name('add');
    Route::post('/themDuLieu', [EmployeeController::class, 'addData'])->name('add_Data');

    Route::get('/sua-thong-tin/{id}', [EmployeeController::class, 'edit'])->name('edit');
    Route::post('/suaDuLieu/{id}', [EmployeeController::class, 'editData'])->name('edit_Data');

    Route::get('/xoa-nhan-vien/{id}', [EmployeeController::class, 'delete'])->name('delete');

    //nhap excel
    Route::post('/nhap-excel', [EmployeeController::class, 'importExcel'])->name('import_Excel');
});

Route::get('/nhan-vien', [EmployeeController::class, 'index'])->name('index');

//xuat pdf
Route::get('/xuat-pdf', [EmployeeController::class, 'exportPdf'])->name('export_Pdf');

//xuat excel
Route::get('/xuat-excel', [EmployeeController::class, 'exportExcel'])->name('export_Excel');

//login
Route::get('/dang-nhap', [LoginController::class, 'login'])->name('login');
Route::post('/dang-nhap-user', [LoginController::class, 'loginProcess'])->name('login_Process');

//register
Route::get('/dang-ky', [LoginController::class, 'register'])->name('register');
Route::post('/dang-ky-user', [LoginController::class, 'registerUser'])->name('register_User');

//dang xuat
Route::get('/dang-xuat', [LoginController::class, 'logout'])->name('logout');