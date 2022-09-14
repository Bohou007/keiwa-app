<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'whatsApp',
        'email',
        'location',
        'raison_sociale',
        'activity',
        'situation_geo',
        'staff',
        'registre',
        'dfe',
        'regime',
        'logiciel',
        'cabinet',
        'is_required_finance',
        'montant_finance',
        'balance_due',
        'preference'
    ];
}