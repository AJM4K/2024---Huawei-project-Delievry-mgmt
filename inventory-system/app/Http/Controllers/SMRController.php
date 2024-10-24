<?php
namespace App\Http\Controllers;

use App\Models\SMR;

class SMRController extends Controller
{
    public function show($smr_id)
    {
        // Detail of specific SMR
       // $smr = SMR::findOrFail($smr_id);
        return view('smr.show', compact('smr'));
    }
}
