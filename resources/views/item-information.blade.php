<x-guest-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Approved Requisition') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto ">
            <div class="overflow-x-auto bg-white shadow-sm sm:rounded-lg">

                <div class="p-3 bg-white border-b border-gray-200">

                    <!-- component -->
                    <div class="container w-full h-full mx-auto">
                        <div class="relative h-full p-10 overflow-hidden wrap">
                            <div class="absolute h-full border border-gray-700 border-2-2 border-opacity-20"
                                style="left: 50%"></div>
                            <!-- right timeline -->
                            <div class="flex items-center justify-between w-full mb-8 right-timeline">
                                <div class="order-1 w-5/12"></div>
                                <div class="z-20 flex items-center order-1 w-8 h-8 bg-gray-800 rounded-full shadow-xl">
                                    <h1 class="mx-auto text-lg font-semibold text-white">1</h1>
                                </div>
                                <div class="order-1 w-5/12 px-6 py-4 bg-gray-400 rounded-lg shadow-xl">
                                    <h3 class="mb-3 text-xl font-bold text-gray-800">Item Name</h3>
                                    <p class="text-sm leading-snug tracking-wide text-gray-900 text-opacity-100">{{
                                        $qr->unit->unit }}</p>
                                </div>
                            </div>

                            <!-- left timeline -->
                            <div class="flex flex-row-reverse items-center justify-between w-full mb-8 left-timeline">
                                <div class="order-1 w-5/12"></div>
                                <div class="z-20 flex items-center order-1 w-8 h-8 bg-gray-800 rounded-full shadow-xl">
                                    <h1 class="mx-auto text-lg font-semibold text-white">2</h1>
                                </div>
                                <div class="order-1 w-5/12 px-6 py-4 bg-red-400 rounded-lg shadow-xl">
                                    <h3 class="mb-3 text-xl font-bold text-white">Borrower</h3>
                                    <p
                                        class="text-sm font-medium leading-snug tracking-wide text-white text-opacity-100">
                                        {{ $qr->requesition->count() > 0 ?
                                        $qr->requesition[0]->requested->full_name : 'Not Borrowed'
                                        }}</p>
                                </div>
                            </div>

                            <!-- right timeline -->
                            <div class="flex items-center justify-between w-full mb-8 right-timeline">
                                <div class="order-1 w-5/12"></div>
                                <div class="z-20 flex items-center order-1 w-8 h-8 bg-gray-800 rounded-full shadow-xl">
                                    <h1 class="mx-auto text-lg font-semibold text-white">3</h1>
                                </div>
                                <div class="order-1 w-5/12 px-6 py-4 bg-gray-400 rounded-lg shadow-xl">
                                    <h3 class="mb-3 text-xl font-bold text-gray-800">Item Description</h3>
                                    <p class="text-sm leading-snug tracking-wide text-gray-900 text-opacity-100">Lorem
                                        {{ $qr->unit->description }}</p>
                                </div>
                            </div>

                            <!-- left timeline -->
                            <div class="flex flex-row-reverse items-center justify-between w-full mb-8 left-timeline">
                                <div class="order-1 w-5/12"></div>
                                <div class="z-20 flex items-center order-1 w-8 h-8 bg-gray-800 rounded-full shadow-xl">
                                    <h1 class="mx-auto text-lg font-semibold text-white">4</h1>
                                </div>
                                <div class="order-1 w-5/12 px-6 py-4 bg-red-400 rounded-lg shadow-xl">
                                    <h3 class="mb-3 text-xl font-bold text-white">Purpose</h3>
                                    <p
                                        class="text-sm font-medium leading-snug tracking-wide text-white text-opacity-100">
                                        {{ $qr->requesition->count() > 0 ?
                                        $qr->requesition[0]->purpose : 'Not Borrowed'
                                        }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
