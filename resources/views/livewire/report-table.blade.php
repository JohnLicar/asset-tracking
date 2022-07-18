<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Report Summary') }}
        </h2>
    </x-slot>

    <div class="bg-white rounded-lg shadow-xs ">

        <div class="flex mb-3 ">
            <div class="w-1/2 p-4 mr-5 rounded-lg shadow-xs">
                @livewire('request-chart')
            </div>
            <div class="w-1/2 p-4 mr-5 rounded-lg shadow-xs ">
                @livewire('issued-chart')
            </div>

        </div>


        <div class="w-full mb-8 overflow-hidden border rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto border-2">
                <table class="w-full whitespace-no-wrap table-auto ">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Number of Request</th>
                            <th class="px-4 py-3">Number of Current Approved Request</th>
                            <th class="px-4 py-3">Number of Pending Request</th>
                            <th class="px-4 py-3">Number of Declined Request</th>
                            <th class="px-4 py-3">Number of Returned Request</th>
                            <th class="px-4 py-3">Number of to be issued Request</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach($reports as $report)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">
                                {{ $report->full_name}}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $report->request_count}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $report->approve_count}}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $report->pending_count}}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $report->decline_count}}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $report->returned_count}}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $report->issued_count}}
                            </td>


                            @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
