<?php

namespace App\Http\Controllers;

use App\Models\TodoCategory;
use Illuminate\Http\Request;

class TodoCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = TodoCategory::query();
        if ($request->user()) {
            $query->where('user_id', $request->user()->id);
        }

        $query->orderBy('updated_at', 'desc');
        $categories = $query->paginate(9);
        return view('todocategory.index', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = new TodoCategory();
        $category->name = $request->name;
        $category->user_id = $request->user()->id;
        $category->save();
        return redirect()->route('categories')->with('success', 'Add category successfully');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = TodoCategory::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories')->with('success', 'Update category successfully');
    }
    public function destroy($id)
    {
        $category = TodoCategory::find($id);
        $category->delete();
        return redirect()->route('categories')->with('success', 'Delete category successfully');
    }
}
