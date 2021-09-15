<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    use HasFactory;

    public function product ()
    {
        return $this->belongsTo(Product::class);
    }
    public function shipping ()
    {
        return $this->belongsTo(Shipping::class);
    }

}
