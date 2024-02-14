<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_item',
        'description',
        'date_peremption',
        'prix_achat',
        'prix_vente',
        'prix_HT',
        'allergenes',
        'disponible_vente',
        'aliment',
        'image'
    ];

    protected $casts = [
        'date_peremption' => 'datetime',
        'disponible_vente' => 'boolean',
        'aliment' => 'boolean',
    ];
}