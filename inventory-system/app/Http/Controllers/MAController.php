<?php
namespace App\Http\Controllers;

use App\Models\MA;

class MAController extends Controller
{
    public function show($ma_id)
    {
        // Detail of specific MA
        // $ma = MA::findOrFail($ma_id);
        return view('ma.show', compact('ma'));
    }
}
