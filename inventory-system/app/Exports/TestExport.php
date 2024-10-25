<?php

namespace App\Exports;

use App\Models\MA;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TestExport implements FromView
{
    
    public function view(): view
    {
        $ma = MA::findOrFail(1);
        return view('exports.test', compact('ma'));
    }
}
