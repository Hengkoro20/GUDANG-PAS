<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        // Ambil semua item dengan stok kurang dari 10
        $lowStockItems = Item::where('stock', '<', 10)->get();

        // Jika tidak ada item yang low stock
        if ($lowStockItems->isEmpty()) {
            return response()->json([
                'message' => 'No low stock notifications.',
                'data' => []
            ]);
        }

        // Buat pesan notifikasi
        $notifications = $lowStockItems->map(function ($item) {
            return [
                'item_name' => $item->item_name,
                'stock' => $item->stock,
                'notification' => "Stok untuk item '{$item->item_name}' tinggal {$item->stock}!"
            ];
        });

        return response()->json([
            'message' => 'Low stock notifications found.',
            'data' => $notifications
        ]);
    }
}
