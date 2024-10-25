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
            'received' => 'required|boolean',
        ]);

        $smr = SMR::findOrFail($smrId);
        $item = $smr->items()->where('item_id', $itemId)->firstOrFail();

        // Update the received status
        $item->pivot->received = $request->input('received');
        $item->pivot->save();

        return redirect()->route('smr.show', $smrId)->with('status', 'Item updated successfully.');
    }
}
