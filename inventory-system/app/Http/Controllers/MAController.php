<?php

namespace App\Http\Controllers;

use App\Models\MA;
use Illuminate\Http\Request;


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

        return redirect()->back()->with('success', 'MA data imported successfully!');
    }
}
