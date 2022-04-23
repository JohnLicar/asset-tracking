<div>
    <x-slot name="header">
        {{ __('Logs') }}
    </x-slot>

    <div class=" bg-white rounded-lg shadow-xs">
        <div>
            <h1 class="text-3xl mb-5">Returned Requisition and Issued Logs</h1>
        </div>
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
                            <th class="px-4 py-3 text-center">Date Issued</th>
                            <th class="px-4 py-3 text-center">Date Returned</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach($requisitions as $index => $item)
                        <tr class="text-gray-700">

                            <td class="px-4 py-3 text-sm">
                                @foreach ($item->request as $request)
                                <ol class="list-decimal">

                                    {{ $request->quantity }}

                                </ol>
                                @endforeach


                            </td>
                            <td class="px-4 py-3 text-sm">
                                @foreach ($item->request as $request)
                                <ol class="list-decimal">

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

                            <td class="px-4 py-3 text-sm">
                                {{ $item->issued_date?->toFormatedDate() }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $item->deleted_at?->toFormatedDate() }}
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

    <div class=" bg-white rounded-lg shadow-xs mt-15">
        <div>
            <h1 class="text-3xl mb-5">User Logs</h1>
        </div>
        <div class=" flex justify-between space-x-4 mb-3">

            <x-input wire:model.debounce.300ms="userlogsearch" id="search" class=" right-0 w-1/3" type="search"
                name="search" placeholder="Search Item" :value="old('search')" />

        </div>

        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full border-2">
                <table class="w-full  whitespace-no-wrap ">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                            <th class="px-4 py-3">User Name</th>
                            <th class="px-4 py-3">Activity</th>
                            <th class="px-4 py-3">Description</th>
                            <th class="px-4 py-3 text-center">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach($userlogs as $index => $user)
                        <tr class="text-gray-700">


                            <td class="px-4 py-3 text-sm">
                                {{ $user->user->full_name }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $user->event }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $user->description }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $user->created_at->toFormatedDate() }}
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