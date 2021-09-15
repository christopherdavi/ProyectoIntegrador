<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $fillable = [
        'name',
        'condition',
        'icon'
    ];
    public function users()
    {
        return $this->belongsTo('App/Models/User');
    }
    public function subCategories()
    {
        return $this->hasMany('App/Models/subCategories');
    }
}
