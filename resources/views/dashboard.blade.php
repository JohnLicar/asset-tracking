<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6 bg-white border-b border-gray-200">
                    <div
                        class="w-80 bg-blue-500 border rounded-md py-2 shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 ">
                        <h1 class="ml-5 text-xl font-bold text-white">Pending Requisition</h1>
                        <div class="flex ml-14 mt-4 text-white">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.6818 15.7529L18.8116 17.8827C20.1752 16.3052 21 14.249 21 12.0001C21 9.78747 20.2016 7.76133 18.8771 6.19409L16.7444 8.32671C17.5315 9.34177 18 10.6162 18 12.0001C18 13.4203 17.5066 14.7253 16.6818 15.7529Z"
                                    fill="currentColor" fill-opacity="0.5" />
                                <path
                                    d="M15.6734 16.7445C14.6583 17.5315 13.3839 18 12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C13.4202 6 14.7252 6.49344 15.7528 7.31823L17.8826 5.18843C16.3051 3.82482 14.2489 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C14.2126 21 16.2387 20.2016 17.806 18.8771L15.6734 16.7445Z"
                                    fill="currentColor" />
                            </svg>
                            <p class="text-7xl ml-14  font-black">{{ $pending }}</p>
                        </div>
                    </div>
                    <div
                        class="w-80 bg-green-500 border rounded-md py-2 shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 ">
                        <h1 class="ml-5 text-xl font-bold text-white">Users</h1>
                        <div class="flex ml-14 mt-4 text-white">
                            <svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                            <p class="text-7xl ml-14  font-black">{{ $user - 1 }}</p>
                        </div>
                    </div>
                    <div
                        class="w-80 bg-yellow-500 border rounded-md  shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 ">
                        <h1 class="ml-5 text-xl font-bold text-white">Number of Item in Inventory</h1>
                        <div class="flex ml-14 mt-4 text-white">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13 10C13 11.1046 13.8954 12 15 12C16.1046 12 17 11.1046 17 10V5C17 3.89543 16.1046 3 15 3C13.8954 3 13 3.89543 13 5V10ZM5 8C3.89543 8 3 8.89543 3 10C3 11.1046 3.89543 12 5 12H10C11.1046 12 12 11.1046 12 10C12 8.89543 11.1046 8 10 8H5ZM15 13C13.8954 13 13 13.8954 13 15C13 16.1046 13.8954 17 15 17H20C21.1046 17 22 16.1046 22 15C22 13.8954 21.1046 13 20 13H15ZM10 22C8.89543 22 8 21.1046 8 20L8 15C8 13.8954 8.89543 13 10 13C11.1046 13 12 13.8954 12 15V20C12 21.1046 11.1046 22 10 22ZM8 5C8 3.89543 8.89543 3 10 3C11.1046 3 12 3.89543 12 5V7H10C8.89543 7 8 6.10457 8 5ZM3 15C3 16.1046 3.89543 17 5 17C6.10457 17 7 16.1046 7 15V13H5C3.89543 13 3 13.8954 3 15ZM17 20C17 21.1046 16.1046 22 15 22C13.8954 22 13 21.1046 13 20V18H15C16.1046 18 17 18.8954 17 20ZM22 10C22 8.89543 21.1046 8 20 8C18.8954 8 18 8.89543 18 10V12H20C21.1046 12 22 11.1046 22 10Z"
                                    fill="currentColor" />
                            </svg>
                            <p class="text-7xl ml-10 font-black">{{ $items }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white mt-5 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 mx-20 bg-white rounded shadow">
                    {!! $chart->container() !!}
                </div>
            </div>
        </div>
    </div>

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
</x-app-layout>