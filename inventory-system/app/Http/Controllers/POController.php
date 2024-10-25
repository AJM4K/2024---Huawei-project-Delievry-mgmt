<?php 
namespace App\Http\Controllers;

use App\Models\PO;
use App\Models\MA;
use App\Models\SMR;

class POController extends Controller
{
    public function index()
    {
        // List all POs
       // $pos = PO::all();
    //    $pos = PO::paginate(1);

    //     return view('po.index', compact('pos'));

        // Get the search query
        $search = request('search');

        // Fetch POs based on search query with pagination
        $pos = PO::when($search, function ($query, $search) {
                    return $query->where('po_number', 'like', '%' . $search . '%');
                })
                ->paginate(10) // Adjust per page limit as needed
                ->withQueryString(); // Keeps the search query in the pagination links
    
        return view('po.index', compact('pos', 'search'));
    
    }

    public function show($po_id)
    {
        // Detail of specific PO
       $po = PO::findOrFail($po_id);
        return view('po.show', compact('po'));
    }

    public function listMAs($po_id)
    {
        // List all MAs related to the PO
       $po = PO::findOrFail($po_id);
       $mas = $po->mas;  // Assuming relationship has been defined in the PO model
        return view('po.mas', compact('po', 'mas'));
    }

    public function listSMRs($po_id)
    {
        // List all SMRs related to the PO
       $po = PO::findOrFail($po_id);
       $smrs = $po->smrs;  // Assuming relationship has been defined in the PO model
        return view('po.smrs', compact('po', 'smrs'));
    }
}
