<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Livraison;
use App\Models\Destruction;
use App\Models\Items;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $itemResults = Items::search($query)->get();
        $livraisonResults = Livraison::search($query)->get();
        $destructionResults = Destruction::search($query)->get();

        $results = [
            'items' => $itemResults,
            'livraisons' => $livraisonResults,
            'destructions' => $destructionResults,
        ];

        return response()->json($results, 200);
    }
}
