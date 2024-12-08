<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required',
        ]);

        Todo::create([
            'task' => $request->task,
        ]);

        return redirect()->route('todolist.index');
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update([
            'task' => $request->task,
        ]);

        return redirect()->route('todolist.index');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todolist.index');
    }
}
 