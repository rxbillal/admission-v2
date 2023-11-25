<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\fornend\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentReportController;







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

Route::get('test', [HomeController::class, 'test']);
Route::get('career', [JobController::class, 'index']);
Route::get('faculty-list', [JobController::class, 'facList']);
Route::get('position/{id}', [JobController::class, 'Aca']);
Route::get('mail-check/{id}', [JobController::class, 'MailCheck']);
Route::get('non-position', [JobController::class, 'nonAca']);
Route::post('job-application-store', [JobController::class, 'store']);


Route::post('user-login-check', [HomeController::class, 'loginCheck']);
Route::get('logout', [HomeController::class, 'logout'])->name('logout');
Route::get('admin-logout', [HomeController::class, 'logout2']);
Route::get('admin', [DashboardController::class, 'admin'])->name('admin');
Route::post('do-login', [DashboardController::class, 'Login'])->middleware('login');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('login', [HomeController::class, 'login'])->name('login');
Route::get('forgot', [HomeController::class, 'forgot'])->name('forgot');
Route::get('application', [HomeController::class, 'application'])->name('application');
Route::get('print', [HomeController::class, 'printLetter']);
Route::get('letter-print/{id}', [HomeController::class, 'printLetter2']);
Route::post('user-store', [HomeController::class, 'store']);
Route::post('reset', [HomeController::class, 'reset']);
Route::post('application-store', [HomeController::class, 'applicationStore']);
Route::get('get-sub/{id}', [HomeController::class, 'GetSub']);
Route::middleware(['admin'])->group(function () {
    Route::get('user-view/{id}', [DashboardController::class, 'show'])->name('user-view');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('list', [ListController::class, 'index'])->name('list.index');
    Route::post('approve', [ListController::class, 'approve']);
    Route::get('edit-profile/{id}', [ListController::class, 'edit'])->name('edit-profile');
    Route::post('update-profile/{id}', [ListController::class, 'Updateapplicant'])->name('update-profile');
    Route::get('/student-report', [StudentReportController::class, 'index'])->name('student-report.index');
    Route::post('/student-report-export', [StudentReportController::class, 'export']);




    Route::get('jamb-list', [ListController::class, 'jambList'])->name('jamb-list');
    Route::post('import', [ListController::class, 'import'])->name('import');

    Route::get('job-list', [JobController::class, 'jobList'])->name('job-list.list');
    Route::get('application-delete/{id}', [JobController::class, 'destroy']);
    Route::get('department/{id}', [JobController::class, 'department']);
    Route::get('get-subject/{id}', [JobController::class, 'getSubject']);
});
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('optimize');
    return 'DONE'; //Return anything
});
