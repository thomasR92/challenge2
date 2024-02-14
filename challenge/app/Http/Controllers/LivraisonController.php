<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livraison;
use App\Http\Controllers\StockController;

class LivraisonController extends Controller
{
    public function index()
    {
        $livraisons = Livraison::all();
        return response()->json($livraisons, 200);
    }

    public function show($id)
    {
        $livraison = Livraison::find($id);

        if (!$livraison) {
            return response()->json(['message' => 'Livraison non trouvée'], 404);
        }

        return response()->json($livraison, 200);
    }

    public function store(Request $request)
    {
        $livraison = Livraison::create($request->all());
        app(StockController::class)->updateStock($livraison->item_id, $livraison->quantite);
        return response()->json($livraison, 201);
    }
}
