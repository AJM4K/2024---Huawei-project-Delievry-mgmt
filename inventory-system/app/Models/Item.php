<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function mas()
    {
        return $this->belongsToMany(MA::class)->withPivot('quantity');
    }

    public function smrs()
    {
        return $this->belongsToMany(SMR::class)->withPivot('quantity', 'received');
    }
}
