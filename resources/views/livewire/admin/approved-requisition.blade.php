<div>
    <x-slot name="header">
        {{ __('Approved Requisition') }}
    </x-slot>

    <div class="bg-white rounded-lg shadow-xs ">
        <div class="flex justify-between mb-3 space-x-4 ">
            <x-input wire:model.debounce.300ms="search" id="search" class="right-0 w-1/3 " type="search" name="search"
                placeholder="Search Item" :value="old('search')" />
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
                            <th class="px-4 py-3">QR Code</th>

                            @if (auth()->user()->roles[0]->display_name == 'Administrator')
                            <th class="px-4 py-3 text-center">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach($requisitions as $index => $item)
                        <tr class="text-gray-700">

                            <td class="px-4 py-3 text-sm">
                                @foreach ($item->request as $request)
                                <ol>

                                    {{ $request->quantity }}

                                </ol>
                                @endforeach


                            </td>
                            <td class="px-4 py-3 text-sm">
                                @foreach ($item->request as $request)
                                <ol>
                                    {{ $request->unit->unit }}

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

                            @if ($item->qr)
                            {!! QrCode::size(100)->generate($item->qr->qr_code); !!}
                            @else
                            <td class="px-4 py-3 text-sm">
                                <span class="text-red-500">No item given</span>
                                @endif
                            </td>
                            @if (auth()->user()->roles[0]->display_name == 'Administrator')
                            @if (auth()->user()->signature)

                            <td class="flex justify-between px-4 py-3 mt-5 mr-3 text-sm text-center">
                                <a target="_blank" href="{{ route('approved-requisition.create', $item) }}"
                                    class="text-indigo-600 align-middle hover:text-indigo-900">
                                    <i class="gg-printer"></i>

                                </a>

                                <button
                                    wire:click="$emit('openModal', 'issue-requisition-modal', {{ json_encode(['requisition' => $item->id]) }})">
                                    <i class="gg-printer"></i></button>

                                {{-- <a href="#" class="text-indigo-600 hover:text-indigo-900 align-middle mt-1.5">
                                    <form action="{{ route('approved-requisition.issue', $item) }}" method="PUT">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to issue?')" class="w-4 h-4">
                                            <i class="gg-read"></i>
                                        </button>
                                    </form>

                                </a> --}}
                            </td>

                            @else
                            <td class="px-4 py-3 text-sm text-center">
                                <P>Add Singnature in your Profile</P>
                            </td>
                            @endif
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
