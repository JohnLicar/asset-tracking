<div>
    <x-slot name="header">
        {{ __('Inventory') }}
    </x-slot>

    <div class=" bg-white rounded-lg shadow-xs">
        <div class=" flex justify-between space-x-4 mb-3">

            <x-input wire:model.debounce.300ms="search" id="search" class=" right-0 w-1/3" type="search" name="search"
                placeholder="Search Item" :value="old('search')" />

            <div class="mt-1">
                <select wire:model="status"
                    class="block w-auto rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">All</option>
                    <option value="2">Approved List</option>
                    <option value="3">Declined List</option>
                </select>

            </div>
        </div>

        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full border-2">
                <table class="w-full  whitespace-no-wrap ">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                            <th class="px-4 py-3">Quantity</th>
                            <th class="px-4 py-3">Unit (Name of Item)</th>
                            <th class="px-4 py-3">Description</th>
                            <th class="px-4 py-3">Devision</th>
                            <th class="px-4 py-3">Office</th>
                            <th class="px-4 py-3">Purpose</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach($requisitions as $index => $item)
                        <tr class="text-gray-700">

                            <td class="px-4 py-3 text-sm">
                                {{ $item->quantity }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $item->unit->unit }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $item->unit->description }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $item->devision }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $item->office }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $item->purpose }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                @if($item->status == 1)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-white">
                                    Pending
                                </span>
                                @elseif ($item->status == 2)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">
                                    Approved
                                </span>
                                @elseif ($item->status == 3)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">
                                    Declined
                                </span>
                                @elseif ($item->status == 4)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-500 text-white">
                                    Returning
                                </span>
                                @endif
                            </td>


                            @if ($item->status == 1)
                            <td class="flex  px-4 py-3 text-sm">
                                <button class="mt-2 mr-5 text-green-600 hover:text-green-900"
                                    wire:click='$emit("openModal", "approve-modal", {{ json_encode(["requisition" => $item->id]) }})'>
                                    Approve
                                </button>

                                <button class="mt-2 mr-5 text-red-600 hover:text-red-900"
                                    wire:click='$emit("openModal", "decline-modal", {{ json_encode(["requisition" => $item->id]) }})'>
                                    Decline
                                </button>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div
                class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
                {{ $requisitions->links() }}
            </div>
        </div>

    </div>
</div>