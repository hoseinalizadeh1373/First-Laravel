<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
// use UxWeb\SweetAlert\SweetAlert;
class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::latest()->paginate(5);

        return view('todos.index',compact('todos'));
    }
    public function show(Todo $todo)
    {
        // $todo = Todo::findorfail($id); //این خط هم رکورد با ایدی مورد نظر را سلکت میکنه و میاره
        //و در صورت نبودن ارور 404 میده
        return view('todos.show',compact('todo'));
    }
    public function create()
    {
        return view ('todos.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        alert()->success('با موفقیت ثبت شد', '');
        // SweetAlert::message('Robots are working!');
        return redirect()->route('todos.index');
    }
    public function edit(Todo $todo)
    {
        // $todo = Todo::findorfail($id); //این خط هم رکورد با ایدی مورد نظر را سلکت میکنه و میاره
        //و در صورت نبودن ارور 404 میده
        return view('todos.edit',compact('todo'));
    }
    public function update(Request $request,Todo $todo)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        alert()->success('با موفقیت ویرایش شد', '');
        // SweetAlert::message('Robots are working!');
        return redirect()->route('todos.index');
        
    }
    public function delete(Todo $todo)
    {
        $todo->delete();
        alert()->error('با موفقیت حذف شد', '');
        // SweetAlert::message('Robots are working!');
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
}
