<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    // Add Inventory
    public function addInventory(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'stock' => 'required|integer',
        ]);

        $inventory = Inventory::updateOrCreate(
            ['name' => $validatedData['name']],
            ['stock' => DB::raw('stock + ' . $validatedData['stock'])],
        );

        return response()->json([
            'status' => true,
            'data' => $inventory->id,
            'message' => 'Sukses menambahkan inventory',
        ]);
    }

    // Update Inventory
    public function updateInventory(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string',
            'stock' => 'integer',
        ]);

        $inventory = Inventory::find($id);

        if ($inventory) {
            $inventory->update($validatedData);

            return response()->json([
                'status' => true,
                'data' => $request->user()->id,
                'message' => 'Sukses mengubah inventory',
            ]);
        }

        return response()->json([
            'status' => false,
            'data' => null,
            'message' => 'Gagal mengubah inventory',
        ]);
    }

    // Delete Inventory
    public function deleteInventory($id)
    {
        $inventory = Inventory::find($id);

        if ($inventory) {
            $inventory->delete();

            return response()->json([
                'status' => true,
                'data' => $inventory->id,
                'message' => 'Sukses menghapus inventory',
            ]);
        }

        return response()->json([
            'status' => false,
            'data' => null,
            'message' => 'Gagal menghapus inventory',
        ]);
    }

    // List Inventory
    public function listInventory()
    {
        $users = User::all();
        $inventories = Inventory::all();

        return response()->json([
            'status' => true,
            'data' => [
                'users' => $users,
                'inventories' => $inventories,
            ],
            'message' => 'Sukses menampilkan semua inventory',
        ]);
    }

    // Get Inventory By ID
    public function getInventoryById($id)
    {
        $inventory = Inventory::find($id);

        if ($inventory) {
            return response()->json([
                'status' => true,
                'data' => $inventory,
                'message' => 'Sukses menampilkan inventory',
            ]);
        }

        return response()->json([
            'status' => false,
            'data' => null,
            'message' => 'Gagal menampilkan inventory',
        ]);
    }
}
