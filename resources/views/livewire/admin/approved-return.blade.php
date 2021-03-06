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
                <table class="w-full  whitespace-no-wrap ">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                            <th class="px-4 py-3">Quantity</th>
                            <th class="px-4 py-3">Unit (Name of Item)</th>
                            <th class="px-4 py-3">Devision</th>
                            <th class="px-4 py-3">Office</th>
                            <th class="px-4 py-3">Requested by</th>
                            <th class="px-4 py-3">Approved by</th>
                            <th class="px-4 py-3">Purpose</th>
                            <th class="px-4 py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach($requisitions as $index => $item)
                        <tr class="text-gray-700">

                            <td class="px-4 py-3 text-sm">
                                @foreach ($item->request as $request)
                                <ol class="list-decimal">
                                    <li>
                                        {{ $request->quantity }}
                                    </li>
                                </ol>
                                @endforeach


                            </td>
                            <td class="px-4 py-3 text-sm">
                                @foreach ($item->request as $request)
                                <ol class="list-decimal">
                                    <li>
                                        {{ $request->unit->unit }}
                                    </li>
                                </ol>
                                @endforeach
                            </td>


                            <td class="px-4 py-3 text-sm">
                                {{ $item->purpose }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $item->devision }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $item->office }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $item->requested->full_name }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $item->approved?->full_name }}
                            </td>

                            <td class="flex  px-4 py-3 text-center text-sm">
                                <a href="#" class=" text-green-600 hover:text-green-900">
                                    <form action="{{ route('delete-approved-return', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')">
                                            Approve
                                        </button>
                                    </form>
                                </a>

                                <a href="{{ route('users.edit', $item) }}" class="ml-2 text-red-600 hover:text-red-900">
                                    Decline

                                </a>
                            </td>
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