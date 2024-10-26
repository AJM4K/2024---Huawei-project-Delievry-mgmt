<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SMR;
use App\Models\Item;

class ItemController extends Controller
{
    public function edit($smrId, $itemId)
    {
        $smr = SMR::findOrFail($smrId);
        $item = $smr->items()->where('item_id', $itemId)->firstOrFail();

        return view('items.edit', compact('smr', 'item'));
    }

    public function update(Request $request, $smrId, $itemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'received' => 'required|boolean',
            'description' => 'nullable|string|max:255',
        ]);

        $smr = SMR::findOrFail($smrId);
        $item = $smr->items()->where('item_id', $itemId)->firstOrFail();

        // Update the item's values
        $item->pivot->quantity = $request->input('quantity');
        $item->pivot->received = $request->input('received');
        $item->pivot->save();
        $item->save();

        return redirect()->route('smr.show', $smrId)->with('status', 'Item updated successfully.');
    }
}
