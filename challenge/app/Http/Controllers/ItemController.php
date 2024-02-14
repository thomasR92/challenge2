<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Models\Items;

class ItemController extends Controller
{
    public function index()
    {
        $items = Items::all();
        return response()->json($items, 200);
    }

  
    public function show($id)
    {
        $item = Items::find($id);

        if (!$item) {
            return response()->json(['message' => 'Produit non trouvé'], 404);
        }

        return response()->json($item, 200);
    }

    
    public function store(Request $request)
    {
        $item = Items::create($request->all());
        return response()->json($item, 201);
    }

   
    public function update(Request $request, $id)
    {
        $item = Items::find($id);

        if (!$item) {
            return response()->json(['message' => 'Produit non trouvé'], 404);
        }

        $item->update($request->all());

        return response()->json($item, 200);
    }

    
    public function destroy($id)
    {
        $item = Items::find($id);

        if (!$item) {
            return response()->json(['message' => 'Produit non trouvé'], 404);
        }

        $item->delete();

        return response()->json(['message' => 'Produit supprimé avec succès'], 200);
    }
}
