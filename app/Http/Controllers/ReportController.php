<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return response()->json(['data' => $reports]);
    }

    public function show($id)
    {
        $reports = Report::findOrFail($id);
        return response()->json(['data' => $reports]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|exists:items,item_name',
            'current_stock' => 'required|integer',
            'total_in' => 'required|integer',
            'total_out' => 'required|integer',
            'report_date' => 'required|date'  // Contoh: '2025-05-25'
        ]);

        $reports = Report::create($request->all());
        $reports->refresh();

        return response()->json(['data' => $reports], 201);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|exists:items,item_name',
            'current_stock' => 'required|integer',
            'total_in' => 'required|integer',
            'total_out' => 'required|integer',
            'report_date' => 'required|date'
        ]);

        $reports = Report::findOrFail($id);
        $reports->update($request->all());

        return response()->json(['data' => $reports]);
    }

    public function destroy($id)
    {
        $reports = Report::findOrFail($id);
        $reports->delete();

        return response()->json(['data' => $reports]);
    }
}
