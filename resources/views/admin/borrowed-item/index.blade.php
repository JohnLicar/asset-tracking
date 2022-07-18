<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Issued Item') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto ">
            <div class="overflow-x-auto bg-white shadow-sm sm:rounded-lg">

                <div class="p-3 bg-white border-b border-gray-200">

                    <div>

                        <div class="bg-white rounded-lg shadow-xs ">
                            <div class="flex justify-between mb-3 space-x-4 ">
                                <x-input wire:model.debounce.300ms="search" id="search" class="right-0 w-1/3 "
                                    type="search" name="search" placeholder="Search Item" :value="old('search')" />
                            </div>

                            <div class="w-full mb-8 overflow-hidden border rounded-lg shadow-xs">
                                <div class="w-full overflow-x-auto border-2">
                                    <table class="w-full whitespace-no-wrap ">
                                        <thead>
                                            <tr
                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                                                <th class="px-4 py-3">Quantity</th>
                                                <th class="px-4 py-3">Unit (Name of Item)</th>
                                                <th class="px-4 py-3">Devision</th>
                                                <th class="px-4 py-3">Office</th>
                                                <th class="px-4 py-3">Requested by</th>
                                                <th class="px-4 py-3">Approved by</th>
                                                <th class="px-4 py-3">Purpose</th>
                                                <th class="px-4 py-3">Issued Date</th>
                                                <th class="px-4 py-3">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y">
                                            @foreach($requisitions as $index => $item)
                                            <tr class="text-gray-700">

                                                <td class="px-4 py-3 text-sm">
                                                    @foreach ($item->distinctnotcumable as $key => $request)
                                                    {{-- @if ($loop->first) --}}
                                                    <ol class="list-decimal">
                                                        {{ $request->pivot->quantity }}
                                                    </ol>
                                                    {{-- @break
                                                    @endif --}}
                                                    @endforeach

                                                </td>
                                                <td class="px-4 py-3 text-sm">
                                                    @foreach ($item->distinctnotcumable as $request)
                                                    {{-- @if ($loop->first) --}}
                                                    <ol class="list-decimal">
                                                        {{ $request->unit }}
                                                    </ol>
                                                    {{-- @break
                                                    @endif --}}
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
                                                    {{ $item->issued_date }}
                                                </td>

                                                <td class="px-4 py-3 text-sm text-green-500 ">
                                                    <a href="{{ route('approved-requisition.detail', $item) }}"
                                                        class="text-sm text-blue-500 hover:text-blue-700">
                                                        View Detail
                                                    </a>
                                                </td>



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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
