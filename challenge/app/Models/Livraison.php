<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantite',
        'societe',
        'prix_HT',
        'prix_TTC',
        'prix_livraison',
        'type_vehicule',
        'immatriculation',
        'item_id'
    ];
    
}
