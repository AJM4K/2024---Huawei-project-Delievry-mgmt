<table class="min-w-full border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border-b text-left">Item Name</th>
                        <th class="py-2 px-4 border-b text-left">Quantity</th>
                       
                        <th class="py-2 px-4 border-b text-left">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ma->items as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b">{{ $item->item_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->pivot->quantity }}</td>
                            
                            <td class="py-2 px-4 border-b">{{ $item->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>