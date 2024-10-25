<?php
namespace App\Http\Controllers;

use App\Models\SMR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SMRController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $smrRequests = SMR::query()
            ->where('smr_number', 'like', "%$search%")
            ->paginate(10);

        return view('smr.index', compact('smrRequests', 'search'));
    }

    public function show($smr_id)
    {
        // Detail of specific SMR
       $smr = SMR::findOrFail($smr_id);
        return view('smr.show', compact('smr'));
    }

    public function uploadVoucher(Request $request, $id)
    {
        $request->validate([
            'voucher_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validate image
        ]);

        $smr = SMR::findOrFail($id);

        if ($request->hasFile('voucher_image')) {
            $image = $request->file('voucher_image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/vouchers'), $imageName);  // Save image in public folder

            // Store the image URL in the database
            $smr->voucher_image = '/images/vouchers/' . $imageName;
            $smr->save();
        }

        return redirect()->back()->with('success', 'Voucher image uploaded successfully!');
    }

    public function deleteVoucher($id)
{
    $smr = SMR::findOrFail($id);

    if ($smr->voucher_image) {
        Storage::disk('public')->delete($smr->voucher_image);
        $smr->voucher_image = null;
        $smr->save();
    }

    return redirect()->route('smr.show', $id)->with('success', 'Voucher image deleted successfully.');
}


    
    public function import(Request $request)
{
    $request->validate([
        'smr_file' => 'required|mimes:xlsx,xls,csv',
    ]);

    $file = $request->file('smr_file');
    
    // Add your logic to parse and import the file here (e.g., using Excel::import)

    return redirect()->back()->with('success', 'smr data imported successfully!');
}
}
