<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Destruction;
use App\Models\Stock; 

class DestructionController extends Controller
{
    public function destroy(Request $request, $id)
    {
        
        $stock = Stock::find($id);

       if (!$stock) {
            return response()->json(['message' => 'Produit non trouvé'], 404);
        }

        $quantityToDestroy = $request->input('quantity', 1); 

        if ($stock->quantite < $quantityToDestroy) {
            return response()->json(['message' => 'Quantité insuffisante pour la destruction'], 400);
        }
        $stock->quantite -= $quantityToDestroy;
        $stock->save();
        Destruction::create([
            'quantite' => $quantityToDestroy,
            'motif' => $request->input('motif', 'Destruction de produit'), 
            'item_id' => $id,
        ]);

        if($stock->quantite == 0){
            $stock->delete();
        }

      
        return response()->json($stock, 200);
    }

    public function index()
    {
        $destructions = Destruction::all();
        return response()->json($destructions, 200);
    }
}
