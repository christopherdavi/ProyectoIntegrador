<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\articule;

class subCategorie extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = [
        'name',
        'id_categories'
    ];

    public function categories()
    {
        return $this->belongsTo('App\Models\categorie' ,'id_categories', 'id');
    }
    public function articles()
    {
        return $this->hasMany('App\Models\articule');
    }
}
