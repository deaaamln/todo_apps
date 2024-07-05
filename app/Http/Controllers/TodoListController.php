<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    public function index(Request $request){
        $querytodo = Todo::query();
        $querylist = TodoList::query();
        if ($request->user()) {
            $querylist->with('todo')
                ->where('user_id', $request->user()->id);
            $querytodo->where('user_id', $request->user()->id);
        }
        $todos = $querytodo->get();
        $todolists = $querylist->paginate(6);

        return view('todolist.index', compact('todolists', 'todos'));
    }

    public function store(Request $request){
        $value = [
            'todo_id' => $request->todo_id,
            'user_id' => Auth::user()->id,
            'status' => $request->status,
            'date_time' => $request->date_time,
        ];

        TodoList::create($value);
        return redirect()->route('lists')->with('success', 'add progress todo successfully');
    }
    public function update(Request $request, $id)
    {
        $value = [
            'todo_id' => $request->todo_id,
            'user_id' => Auth::user()->id,
            'status' => $request->status,
            'date_time' => $request->date_time,
        ];
        TodoList::where('id', $id)->update($value);
        return redirect()->route('lists')->with('success', 'update progress todo successfully');
    }

    public function destroy($id){
        TodoList::destroy($id);
        return redirect()->route('lists')->with('success', 'delete progress todo successfully');
    }
}
