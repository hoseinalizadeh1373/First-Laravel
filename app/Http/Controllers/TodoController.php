<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index']]);
    }
    public function index()
    {
        // $num = app()->make('num');
        // $num2 = app()->make('num');
        // dd($num,$num2);

        //برای اعمال نشدن گلوبال اسکوپ
        // $todos = Todo::withoutGlobalscope('idgir')->latest()->paginate(5);

        // localscope
        //   $todos = Todo::maxid(30)->latest()->paginate(5);


        /**
         * get profile data with id from user table
         */
        // $user = User::find(2);

        // dd($user->profile);


        /**
         * get user data from user_id from profile data
         */

        //  $profile = Profile::find(1);
        //  dd($profile ->user);
        //    dd()

        // $todos = Todo::all();
        // $young = $todos->filter(function($key,$value){
        //     return $value->age <35;
        // });
        $todos = auth()->user()->type == 'admin' ? Todo::latest()->paginate(5) : Todo::where('user_id', '=', auth()->user()->id)->latest()->paginate(5);
        // $todos = Todo::where('user_id','=',auth()->user()->id)->latest()->paginate(5);
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->user()->id
        ]);
        /**
         * 
         * 
         * اگر با تابع پایین کار کنیم ، اگه
         * آیدی .جود داشته باشه دیگه اینزرت نمیشه
         */


        // Todo::firstOrCreate(['id' =>'12'],[
        //     'title'=>'tt',
        //     'description' => $request->description,
        // ]);
        alert()->success('با موفقیت ثبت شد', '');
        // SweetAlert::message('Robots are working!');
        return redirect()->route('todos.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        alert()->success('با موفقیت ویرایش شد', '');
        // SweetAlert::message('Robots are working!');
        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        // dd($todo);
        $todo->delete();
        alert()->error('با موفقیت حذف شد', '');
        //SweetAlert::message('Robots are working!');
        return redirect()->route('todos.index');
    }
    public function done(Todo $todo)
    {

        $todo->update([
            'done' => 1
        ]);
        alert()->success('انجام شد', '');
        return redirect()->route('todos.index');
    }
    public function search(Request $request)
    {

        if ($request->ajax()) {
            $output = "";
            if ($request->search != "") {
                $result = Todo::where('description', 'LIKE', '%' . $request->search . '%')
               ->orWhere('title', 'LIKE', '%' . $request->search . '%')->get();
                if ($result) {
                    foreach ($result as $item) {
                        $output .= "<tr>" .
                            '<td>' . $item->title . "</td>" .
                            '<td>' . $item->description . "</td>" .
                            '</tr>';
                    }
                    return response($output);
                }
            }
        }
    }
}
