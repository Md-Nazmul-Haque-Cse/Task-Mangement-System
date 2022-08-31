<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function home()
    {
        return view('home.home',[
           'todos'=> Todo::all()
        ]);
    }
    public function index()
    {
        //fetch all data
        $todos = Todo::all();
        return view('todos/index')->with('todos',$todos);
    }
    public function show(Todo $todoId)
    {
        return view('todos/show')->with('todo',$todoId);
    }
    public function create()
    {
        return view('todos/create');
    }
    public function store(Request $request)
    {

        $request->validate([
                'name' => 'required',

            ]
        );
        Todo::store($request);
        session()->flash('message','Task Created Successfully!');
        return redirect('/');
//        return redirect('/todos');
    }
    public function edit($todoId)
    {
        return view('todos/edit',[
            'todo' => Todo::find($todoId)
        ]);
    }
    public function update(Request $request, $todoId)
    {
        $request->validate([
            'name' => 'required',
        ]
    );
//        $this->validate(request(),[
//            'name' => 'required',
//            'description' => 'required'
//        ]);

        $data = $request->all();
        $todoId = Todo::find($todoId);
        $todoId->name = $data['name'];
        $todoId->description = $data['description'];
        $todoId->save();
        session()->flash('message','Task Updated Successfully!');

        return redirect('/');
//        return redirect('/todos');
    }
    public function destroy(Request $request, $todoId)
    {
        $todoId = Todo::find($todoId);
        $todoId->delete();
        session()->flash('message','Task Deleted Successfully!');

        return redirect('/');
//        return redirect('/todos');
    }
    public function complete($todoId)
    {
        $todoId = Todo::find($todoId);
        $todoId->completed = true;
        $todoId->save();

        session()->flash('message','Task Completed Successfully!');
        return redirect('/completed');
    }

    public function todoCompleted()
    {

        return view('completed',[
            'todos' => Todo::all()
        ]);
    }

}
