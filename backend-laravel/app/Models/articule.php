<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articule extends Model
{
    use HasFactory;
    protected $table = 'articules';

    public function subcategories()
    {
        return $this->belongsTo('App\Models\subCategorie', 'id_sub_categories', 'id');
    }
    public function products()
    {
        return $this->hasMany('App/Models/products');
    }
    protected $fillable = [
        'code',
        'name',
        'salePrice',
        'codePostal',
        'stock',
        'description',
        'image'
    ];
}
