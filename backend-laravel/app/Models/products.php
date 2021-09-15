<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = 'products';

    public function articules()
    {
        return $this->belongsTo('App\Models\articule', 'id_articules', 'id');
    }
    protected $fillable = [
        'id',
        'name',
        'purshePrice',
        'salePrice',
        'expirationDate',
        'weight',
        'fragility',
        'length',
        'broad',
        'amount',
        'id_articules'
    ];
    
}
