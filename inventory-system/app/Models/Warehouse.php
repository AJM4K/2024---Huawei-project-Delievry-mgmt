<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    public function pos()
    {
        return $this->hasMany(PO::class);
    }
}