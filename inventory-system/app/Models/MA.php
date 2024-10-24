<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MA extends Model
{
    public function po()
    {
        return $this->belongsTo(PO::class, 'po_id');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot('quantity');
    }
}
