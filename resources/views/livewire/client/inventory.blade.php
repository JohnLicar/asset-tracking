<div>
    <x-slot name="header">
        {{ __('Inventory') }}
    </x-slot>

    <div class=" bg-white rounded-lg shadow-xs">
        <div class=" flex justify-between space-x-4 mb-3">

            <x-input wire:model.debounce.300ms="search" id="search" class=" right-0 w-1/3" type="search" name="search"
                placeholder="Search Item" :value="old('search')" />
        </div>

        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full border-2">
                <table class="w-full  whitespace-no-wrap table-auto">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                            <th class="px-4 py-3">Inventory Item No.</th>
                            <th class="px-4 py-3">Quantity</th>
                            <th class="px-4 py-3">Unit (Name of Item)</th>
                            <th class="px-4 py-3">Unit Cost</th>
                            <th class="px-4 py-3">Total Cost</th>
                            <th class="px-4 py-3">Description</th>
                            <th class="px-4 py-3">Estimated Useful Life</th>
                            <th class="px-4 py-3">Availability</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach($items as $index => $item)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">
                                {{ $item->inventory_number}}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $item->quantity }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $item->unit }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ number_format($item->amount, 2) }}

                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ number_format($item->amount * $item->quantity, 2) }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $item->description }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $item->life_span }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                @if($item->status === 1 )
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">
                                    Available
                                </span>
                                @elseif ($item->status === 2 )
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">
                                    Not Available
                                </span>
                                @elseif($item->status === 3)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-white">
                                    Suspened
                                </span>
                                @endif
                            </td>


                            <td class="flex  px-4 py-3 text-sm">
                                <a href="{{ route('requisition.create', $item) }}"
                                    class="mt-2 mr-5 text-indigo-600 hover:text-indigo-900" title="Apply Requisition">
                                    <i class="gg-list"></i>

                                </a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div
                class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
                {{ $items->links() }}
            </div>
        </div>

    </div>
</div>