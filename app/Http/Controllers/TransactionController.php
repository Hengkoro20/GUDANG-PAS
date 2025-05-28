<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Menampilkan semua transaksi
    public function index()
    {
        $transactions = Transaction::all();
        return response()->json(['data' => $transactions]);
    }

    // Menampilkan satu transaksi berdasarkan ID
    public function show($id)
    {
        $transactions = Transaction::findOrFail($id);
        return response()->json(['data' => $transactions]);
    }

    // Menyimpan data transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|exists:items,item_name',
            'amount' => 'required|integer',
            'transaction_date' => 'required|date',
            'transaction_type' => 'required|in:in,out', // contoh: in/pemasukan, out/pengeluaran
        ]);

        $transactions = Transaction::create($request->all());
        $transactions->refresh();

        return response()->json(['data' => $transactions], 201);
    }

    // Memperbarui data transaksi berdasarkan ID
    public function update($id, Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|exists:items,item_name',
            'amount' => 'required|integer',
            'transaction_date' => 'required|date',
            'transaction_type' => 'required|in:in,out',
        ]);

        $transactions = Transaction::findOrFail($id);
        $transactions->update($request->all());

        return response()->json(['data' => $transactions]);
    }

    // Menghapus transaksi berdasarkan ID
    public function destroy($id)
    {
        $transactions = Transaction::findOrFail($id);
        $transactions->delete();

        return response()->json(['message' => 'Successfully deleted!',
        'data' => $transactions]);
    }
}
