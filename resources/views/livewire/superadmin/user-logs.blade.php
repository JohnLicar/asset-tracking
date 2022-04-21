<div>
    <x-slot name="header">
        {{ __('User Logs') }}
    </x-slot>

    <div class=" bg-white rounded-lg shadow-xs">
        <div class=" flex justify-between space-x-4 mb-3">

            <x-input wire:model.debounce.300ms="search" id="search" class=" right-0 w-1/3" type="search" name="search"
                placeholder="Search Item" :value="old('search')" />

            <button type="button"
                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-geen-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                Logs
            </button>

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
                            <th class="px-4 py-3 text-center">Date Returned</th>
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

                            <td class="px-4 py-3 text-sm">
                                {{ $item->purpose }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $item->deleted_at->toFormatedDate() }}
                            </td>

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