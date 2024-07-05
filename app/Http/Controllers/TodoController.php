<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\TodoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $query = Todo::query();
        if ($request->user()) {
            $query->with('todo_category')
                ->where('user_id', $request->user()->id);
        }
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('todo_category_id')) {
            $query->where('todo_category_id', $request->todo_category_id);
        }

        $query->orderBy('updated_at', 'desc');
        $todos = $query->paginate(5);
        $categories = TodoCategory::all()->where('user_id', $request->user()->id);
        return view('todo.index', compact('todos', 'categories'));
    }
    public function create()
    {
        return view('todo.create');
    }
    public function store(Request $request)
    {
        $value = [
            'todo_category_id' => $request->todo_category_id,
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
        ];

        Todo::create($value);
        return redirect()->route('todos')->with('success', 'Add todo successfully');
    }
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todo.edit', compact('todo'));
    }
    public function update(Request $request, $id)
    {
        $value = [
            'todo_category_id' => $request->todo_category_id,
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
        ];

        Todo::where('id', $id)->update($value);
        return redirect()->route('todos')->with('success', 'Todo updated successfully');
    }
    public function destroy($id)
    {
        $todo = Todo::find($id);

        $todo->delete();
        return redirect()->route('todos')->with('success', 'Delete todo successfully');
    }
    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todo.show', compact('todo'));
    }
    public function complete($id)
    {
        $todo = Todo::find($id);
        $todo->status = 1;
        $todo->save();
        return redirect()->route('todo.index');
    }
    public function incomplete($id)
    {
        $todo = Todo::find($id);
        $todo->status = 0;
        $todo->save();
        return redirect()->route('todo.index');
    }
    public function completed()
    {
        $todos = Todo::where('status', 1)->get();
        return view('todo.completed', compact('todos'));
    }
    public function incompleted()
    {
        $todos = Todo::where('status', 0)->get();
        return view('todo.incomplete', compact('todos'));
    }

}
