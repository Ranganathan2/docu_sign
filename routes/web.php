<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoanDetails;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    return view('auth/login');
});

Route::get('/dashboard', function () {

    return view('docu_sign.dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/profile', function(){

    return view('docu_sign.profile');

})->middleware(['auth', 'verified'])->name('profile');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//===============================================
// Basic Routing
//===============================================
Route::get('/greeting', function(){
    return "Hai im raghov";
});

//===============================================
// Default Routing
//===============================================
Route::get('/loan-details', [LoanDetails::class, 'GetLoanDetailsList']);

//===============================================
// Available Router methods
//===============================================
// Route::get();
// Route::post();
// Route::put();
// Route::patch();
// Route::delete();
// Route::options();

//===============================================
// Respond multiple http verbs
//===============================================
Route::match(['get','post', 'put'], '/multiple-verbs', function(){

});

//===============================================
// Respond all http verbs
//===============================================
Route::any('/all-http-verbs', function (){
});

//===============================================
// Redirected Routes
//===============================================
Route::redirect('/here', 'there');

//===============================================
// View Routes
//===============================================
Route::view('/loan-view', 'LoanDetailsList');

//===============================================
// Required Parameter
//===============================================
Route::get('/user/{id}/{name}', function($userId, $UserName){

});

//===============================================
// Optional Parameter
//===============================================
Route::get('/users/{id?}/{name?}', function($userId =null, $userName = 'Raghov'){

  return $userId .' ' . $userName;
});

//===============================================
// Regular Expression
//===============================================
Route::get('/lbconnect/{role}', function($role){
 return $role;
})->whereIn('role', ['lender', 'borrower', 'broker']);

//===============================================
// Named Routes
//===============================================

Route::get('/nmaed', [LoanDetails::class, 'function_name'])->name('named_routes');

//===============================================
// Group Routes
//===============================================
// middleware
Route::middleware(['auth', 'second'])->group(function () {

});

Route::controller(OrderController::class)->group(function () {
    Route::get('/orders/{id}', 'show');
    Route::post('/orders', 'store');
});

Route::prefix('admin')->group(function(){
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
    });
});

Route::prefix('admin.')->group(function(){
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
    });
})->name('users');

//==============================================
// Model Route Binding
//==============================================
Route::get('/lbconnect/{user?}', function(User $psLoanDetails){
    return view('LoanDetailsList', ['psLoanDetails' => $psLoanDetails]);
});
