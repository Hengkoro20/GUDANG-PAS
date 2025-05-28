<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return response()->json(['data' => $items]);
    }

    public function show($id)
    {
        $items = Item::findOrFail($id);
        return response()->json(['data' => $items]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'stock' => 'required|integer',
            'category_name' => 'required|string|exists:categories,category_name'
        ]);

        $items = Item::create($request->all());
        $items->refresh();

        return response()->json(['data' => $items], 201);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'stock' => 'required|integer',
            'category_name' => 'required|string|exists:categories,category_name'
        ]);

        $items = Item::findOrFail($id);
        $items->update($request->all());

        return response()->json(['data' => $items]);
    }

    public function destroy($id)
    {
        $items = Item::findOrFail($id);
        $items->delete();

        return response()->json(['message' => 'Successfully deleted!',
        'data' => $items]);
    }
}
