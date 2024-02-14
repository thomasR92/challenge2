<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livraison;
use App\Models\Stock;

class StockController extends Controller
{
    public static function updateStock($item_id, $quantity)
    {
        $stock = Stock::where('item_id', $item_id)->first();

        if (!$stock) {
            Stock::create([
                'item_id' => $item_id,
                'quantite' => $quantity,
            ]);
        } else {
            $stock->quantite += $quantity;
            $stock->save();
        }
    }

    public static function decreaseStock($item_id, $quantity)
    {
        $stock = Stock::where('item_id', $item_id)->first();

        if (!$stock) {
            return response()->json(['message' => 'Produit non trouvé'], 404);
        }

        if ($stock->quantite < $quantity) {
            return response()->json(['message' => 'Stock insuffisant'], 400);
        }

        $stock->quantite -= $quantity;
        $stock->save();
    }

    public function index()
    {
        $stocks = Stock::all();
        return response()->json($stocks, 200);
    }
}
