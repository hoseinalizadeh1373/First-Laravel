<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

// Route::get('/',[TodoController::class,'index'])->name('todos.index');
// Route::get('/todos/create',[TodoController::class,'create'])->name('todos.create');
// Route::get('/todos/{todo}',[TodoController::class,'show'])->name('todos.show');
// Route::post('/todos',[TodoController::class,'store'])->name('todos.store');
// Route::get('/todos/{todo}/edit',[TodoController::class,'edit'])->name('todos.edit');
// Route::put('/todos/{todo}',[TodoController::class,'update'])->name('todos.update');
// Route::delete('/todos/{todo}',[TodoController::class,'delete'])->name('todos.delete');
// Route::get('/',function(){
// // return Test::saybye();
// return view('welcome');
// });
Route::get('/todos/{todo}/done', [TodoController::class, 'done'])->name('todos.done');

Route::resource('todos', TodoController::class);

Auth::routes(['verify' => true]);

// Route::get('/todos', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::post('/confirm-password', function () {
    return view('auth.passwords.confirm');
})->middleware('auth')->name('password.confirm');

Route::post('/confirm-password', function (Request $request) {
    if (!Hash::check($request->password, $request->user()->password)) {
        return back()->withErrors([
            'password' => ['The provided password does not match our records.']
        ]);
    }

    $request->session()->passwordConfirmed();

    return redirect()->intended();
})->middleware(['auth', 'throttle:6,1']);



// Route::get('/settings/security',function(){
//     return 'hello';
//     })->middleware(['password.confirm']);

// Route::put('/todos/{todo}',function(Todo $todo){

// })->middleware('can:update,post'); همان کار authorized میکند
Route::get('/', [TodoController::class, 'index'])->middleware('verified');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::resource('users', UserController::class);
Route::get('/users/changelist',[UserController::class,'changelist']);
