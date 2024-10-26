<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PO extends Model
{
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function mas()
    {
        return $this->hasMany(MA::class, 'po_id');
    }

    public function smrs()
    {
        return $this->hasMany(SMR::class, 'po_id');
    }

    public function allItemsReceived()
{
    return $this->smrs->every(function ($smr) {
        return $smr->allItemsReceived();
    });
}
}
