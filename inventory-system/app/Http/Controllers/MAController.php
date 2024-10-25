<?php

namespace App\Http\Controllers;

use App\Imports\MAImport;
use App\Models\MA;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MAController extends Controller
{
        public function index(Request $request)
    {
        $search = $request->input('search');
        $maRequests = MA::query()
            ->where('ma_number', 'like', "%$search%")
            ->paginate(10);

        return view('ma.index', compact('maRequests', 'search'));
    }


    public function show($ma_id)
    {
        // Detail of specific MA
        $ma = MA::findOrFail($ma_id);
        return view('ma.show', compact('ma'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'ma_file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $file = $request->file('ma_file');


        // Add your logic to parse and import the file here (e.g., using Excel::import)
       

        // Import the data (no need to store it in the database)
        $import = new MAImport;
        Excel::import($import, $request->file('ma_file'));

       // $result =  Excel::import(new MAImport, $request->file('ma_file'));
       dd($import->data);
       return redirect()->back()->with('success', $import);
    }
}
