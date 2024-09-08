<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class TodoController extends Controller
{
    /**
     * Display a listing of todos.
     *
     * @return View
     */
    public function index(): View|RedirectResponse
    {
        if (!Session::has('is_logged_in')) {
            return redirect()->route('login')->withErrors(['You must log in first!']);
        }

        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new todo.
     *
     * @return View
     */
    public function create(): View
    {
        return view('todos.create');
    }

    /**
     * Store a newly created todo in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'task' => 'required|string|max:255',
        ]);

        Todo::create([
            'task' => $request->task,
            'completed' => false,
        ]);

        return redirect()->route('todos.index')->with('success', 'Task added!');
    }

    /**
     * Display the specified todo.
     *
     * @param  Todo  $todo
     * @return View
     */
    public function show(Todo $todo): View
    {
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified todo.
     *
     * @param  Todo  $todo
     * @return View
     */
    public function edit(Todo $todo): View
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified todo in storage.
     *
     * @param  Request  $request
     * @param  Todo  $todo
     * @return RedirectResponse
     */
    public function update(Request $request, Todo $todo): RedirectResponse
    {
        // Mengubah status completed berdasarkan nilai dari tombol yang diklik
        $todo->completed = $request->completed; 
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'Task status updated!');
    }

    /**
     * Remove the specified todo from storage.
     *
     * @param  Todo  $todo
     * @return RedirectResponse
     */
    public function destroy(Todo $todo): RedirectResponse
    {
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Task deleted!');
    }
}
