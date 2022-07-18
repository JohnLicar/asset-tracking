<div>
    <x-slot name="header">
        {{ __('Requisitions') }}
    </x-slot>

    <div class="bg-white rounded-lg shadow-xs ">
        <div class="flex justify-between mb-3 space-x-4 ">

            <x-input wire:model.debounce.300ms="search" id="search" class="right-0 w-1/3 " type="search" name="search"
                placeholder="Search Item" :value="old('search')" />

            <div class="mt-1">
                <select wire:model="status"
                    class="block w-auto border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">All</option>
                    <option value="2">Approved List</option>
                    <option value="3">Declined List</option>
                </select>
            </div>
        </div>

        <div class="w-full mb-8 overflow-hidden border rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto border-2">
                <table class="w-full whitespace-no-wrap ">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">Quantity</th>
                            <th class="px-4 py-3">Unit (Name of Item)</th>
                            {{-- <th class="px-4 py-3">Description</th> --}}
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
                                @foreach ($item->distinctnotcumable as $request)
                                <ol>
                                    <li>
                                        {{ $request->pivot->quantity }}
                                    </li>
                                </ol>
                                @endforeach


                            </td>
                            <td class="px-4 py-3 text-sm">
                                @foreach ($item->distinctnotcumable as $request)
                                <ol>
                                    <li>
                                        {{ $request->unit }}
                                    </li>
                                </ol>
                                @endforeach
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
                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-yellow-500 rounded-full">
                                    Pending
                                </span>
                                @elseif ($item->status == 2)
                                <span
                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-green-500 rounded-full">
                                    Approved
                                </span>
                                @elseif ($item->status == 3)
                                <span
                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-red-500 rounded-full">
                                    Declined
                                </span>
                                @elseif ($item->status == 4)
                                <span
                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-indigo-500 rounded-full">
                                    Returning
                                </span>
                                @elseif ($item->status == 5)
                                <span
                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-indigo-500 rounded-full">
                                    Issued
                                </span>
                                @endif
                            </td>



                            @if (auth()->user()->signature)

                            @if ($item->status == 1)
                            <td class="flex px-4 py-3 text-sm">
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
                            @else
                            <td class="px-4 py-3 text-sm text-center">
                                <P>Add Singnature in your Profile</P>
                            </td>


                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div
                class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9">
                {{ $requisitions->links() }}
            </div>
        </div>

    </div>
</div>
