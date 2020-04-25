<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Session;
class TodosController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index')->with('todos',$todos);
    }

    public function show(Todo $id)
    {
        // $todo = Todo::find($id);

        return view('todos.show')->with('todo',$id);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
        $this->validate(request(),[
            'name' => 'required|min:6|max:15',
            'description' => 'required'
        ]);
        $data = request()->all();

        $todo = new Todo();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
        $todo->save();
        session()->flash('success','Todo created successfully');
        return redirect('/todos');
    }

    public function edit($id)
    {
        $todo = Todo::find($id);

        return view('todos.edit', compact('todo',$todo));
    }

    public function update($id)
    {
        $this->validate(request(),[
            'name' => 'required|min:6',
            'description' => 'required'
        ]);
        
        
        $data = request()->all();
        $todo = Todo::find($id);
 
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();
        session()->flash('success','Todo has been updated');
        return redirect('/todos');
 
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        session()->flash('success','Todo has been deleted');
        return redirect('/todos');
    }

    public function complete($id)
    {
        $todo = Todo::find($id);
        $todo->completed = true;
        $todo->save();
        session()->flash('success','Todo has been Completed');
        return redirect('/todos');
    }
}
