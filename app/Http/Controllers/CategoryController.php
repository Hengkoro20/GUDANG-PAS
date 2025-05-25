<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json(['data' => $categories]);
    }

    public function show($id)
    {
        $categories = Category::findOrFail($id);
        return response()->json(['data' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);

        $categories = Category::create($request->all());
        $categories->refresh();

        return response()->json(['data' => $categories], 201);
    }
    
    public function update($id, Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);

        $categories = Category::findOrFail($id);
        $categories->category_name = $request->category_name;
        $categories->save();
        
        return response()->json(['data' => $categories]);
    }

    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();

        return response()->json(['data' => $categories]);
    }
}
