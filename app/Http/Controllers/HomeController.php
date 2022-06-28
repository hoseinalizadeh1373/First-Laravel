<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // dd(Auth::user());
        // dd(auth()->user());
        // dd(auth()->check()); چک کنیم کاربری ورود کرده ؟
        // dd(Auth::logout());خروج کردن
        // $user = User::find(2);
        // Auth::login($user); ورود میکند منتهی قبل ازر میدلور گذاشته شود
        // auth()->loginUsingId(2); ورود با آیدی

        $user = Auth::user();

        $todo = Todo::find(2);

        // $allow = Gate::allows('update',$todo);
        // $allow = Gate::denies('GetTodo',$todo); برعکس میکنه
        // $allow = Gate::forUser(User::find(1))->allows('GetTodo',$todo); // for user 
        // dd($user->can('GetTodo',$todo));

        // $allow =Gate::allows('update');
        $allow = $this->authorize('update',$todo);
        dd($allow);

        // return redirect()->route('todos.index');



    }
}
