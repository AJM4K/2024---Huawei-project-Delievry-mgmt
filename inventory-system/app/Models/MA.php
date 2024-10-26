<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
