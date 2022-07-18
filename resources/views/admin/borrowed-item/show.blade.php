<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __($item[0]->unit->unit) }}
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
                                                <th class="px-4 py-3"></th>
                                                <th class="px-4 py-3">Item </th>
                                                <th class="px-4 py-3">QR</th>
                                                <th class="px-4 py-3">Borrowed By</th>
                                                <th class="px-4 py-3">Unit Cost</th>
                                                <th class="px-4 py-3">Description</th>
                                                <th class="px-4 py-3">Purpose</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y">
                                            @foreach($item as $index => $qr)
                                            <tr class="text-gray-700">

                                                <td class="px-4 py-3 text-sm">
                                                    {{ $index + 1 }}
                                                </td>
                                                <td class="px-4 py-3 text-sm">
                                                    {{ $qr->unit->unit }}
                                                </td>
                                                <td class="px-4 py-3 text-sm">
                                                    {!! QrCode::generate($ip.':8000/borrowed-item/' .
                                                    $qr->qr_code); !!}
                                                    <p>{{ $qr->qr_code }}</p>
                                                </td>


                                                <td class="px-4 py-3 text-sm">
                                                    {{ $qr->requesition[0]->requested->full_name}}
                                                </td>

                                                <td class="px-4 py-3 text-sm">
                                                    {{ $qr->unit->amount }}
                                                </td>


                                                <td class="px-4 py-3 text-sm">
                                                    {{ $qr->unit->description }}
                                                </td>

                                                <td class="px-4 py-3 text-sm">
                                                    {{ $qr->requesition[0]->purpose }}
                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
