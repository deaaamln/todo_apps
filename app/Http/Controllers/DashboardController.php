<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\TodoCategory;
use App\Models\TodoList;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $totalTodos = Todo::where('user_id', $userId)->count();
        $totalCategories = TodoCategory::where('user_id', $userId)->count();
        $totalTodoListsCompleted = TodoList::where('user_id', $userId)->where('status', 'selesai')->count();
        $totalTodoListsInProgress = TodoList::where('user_id', $userId)->where('status', 'proses')->count();
        $latestTodos = Todo::where('user_id', $userId)->latest()->take(5)->get();
        $latestTodoLists = TodoList::where('user_id', $userId)->latest()->take(5)->get();

        return view('dashboard.index', compact(
            'totalTodos', 
            'totalCategories', 
            'totalTodoListsCompleted', 
            'totalTodoListsInProgress', 
            'latestTodos', 
            'latestTodoLists'
        ));
    }
}
