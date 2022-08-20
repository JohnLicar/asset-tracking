<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        <x-slot name="header">
            {{ __('Inventory') }}
        </x-slot>

        <div class="bg-white rounded-lg shadow-xs ">
            <div class="w-full mb-8 overflow-hidden border rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto border-2">
                    <table class="w-full whitespace-no-wrap table-auto">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                                <th class="px-4 py-3">Item </th>
                                <th class="px-4 py-3">QR</th>
                                <th class="px-4 py-3">Borrowed By</th>
                                <th class="px-4 py-3">Unit Cost</th>
                                <th class="px-4 py-3">Description</th>
                                <th class="px-4 py-3">Purpose</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">

                            @foreach($inventory->qr as $item)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm">
                                    {{ $item->unit->unit }}
                                </td>

                                <td class="px-4 py-3 text-sm ">

                                    {!! QrCode::generate( $ip.':8000/borrowed-item/' . $item->qr_code); !!}
                                    {{-- <img src="data:image/png;base64, {!!
                                    base64_encode(QrCode::format('png')
                                    ->size(100)
                                    ->generate('192.168.1.5:8000/borrowed-item/' . $item->qr_code))
                                    !!} "> --}}

                                    <p>{{ $item->qr_code }}</p>

                                    {{-- {!! $qrCodeSimple . ' Qr'!!} --}}
                                </td>

                                <td class="px-4 py-3 text-sm ">
                                    {{ $item->requesition->count() > 0 ?
                                    $item->requesition[0]->requested->full_name : 'Not Borrowed'
                                    }}
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    {{ $item->unit->amount }}

                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $item->unit->description }}

                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $item->requesition->count() > 0 ?
                                    $item->requesition[0]->purpose : 'Not Borrowed'
                                    }}
                                </td>


                                <td class="px-4 py-3 text-sm text-center">
                                    {{-- <a href="{{ route('inventory.edit', $item) }}"
                                        class="mt-4 text-indigo-600 hover:text-indigo-900">
                                        <i class="gg-software-download"></i>

                                    </a> --}}



                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                        <form action="{{ route('qrcode.download', [ 'type' => 'png' ]) }}"
                                            method="POST">
                                            @csrf
                                            <input hidden name="qr_code" value="{{ $item->qr_code }}">
                                            <button type="submit" class="w-4 h-4">
                                                <i class="gg-software-download"></i>
                                            </button>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>
