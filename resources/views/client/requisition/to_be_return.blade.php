<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Owned Item') }}
    </h2>
  </x-slot>

  <div class="py-6">
    <div class="mx-auto ">
      <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">

        <div class="p-3 bg-white border-b border-gray-200">

          <div>
            <x-slot name="header">
              {{ __('Approved Requisition') }}
            </x-slot>

            <div class=" bg-white rounded-lg shadow-xs">
              <div class=" flex justify-between space-x-4 mb-3">
                <x-input wire:model.debounce.300ms="search" id="search" class=" right-0 w-1/3" type="search"
                  name="search" placeholder="Search Item" :value="old('search')" />
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
                        <th class="px-4 py-3">Approved by</th>
                        <th class="px-4 py-3">Purpose</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                      @foreach($items as $index => $item)
                      <tr class="text-gray-700">

                        <td class="px-4 py-3 text-sm">
                          @foreach ($item->unit as $request)
                          <ol class="list-decimal">

                            {{ $request->pivot->quantity }}

                          </ol>
                          @endforeach


                        </td>
                        <td class="px-4 py-3 text-sm">
                          @foreach ($item->unit as $request)
                          <ol class="list-decimal">

                            {{ $request->unit }}

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
                          {{ $item->approved?->full_name }}
                        </td>


                        <td class="px-4 py-3 text-sm">
                          {{ $item->purpose }}
                        </td>

                        <td class="px-4 py-3 text-sm">
                          @if($item->status == 1)
                          <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-white">
                            Pending
                          </span>
                          @elseif ($item->status == 2)
                          <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">
                            Approved
                          </span>
                          @elseif ($item->status == 3)
                          <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">
                            Declined
                          </span>
                          @elseif ($item->status == 4)
                          <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-500 text-white">
                            Returning
                          </span>
                          @elseif ($item->status == 5)
                          <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-500 text-white">
                            Issued
                          </span>
                          @endif
                        </td>


                        <td class="flex  px-4 py-3 text-sm">

                          @if ($item->status != $item::STATUS_TO_RETURN)
                          <a href="#" class="text-red-600 hover:text-red-900 mt-3">
                            <form action="{{ route('returnItem', $item) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <button type="submit" onclick="return confirm('Are you sure?')" class="w-4 h-4">
                                <i class="gg-folder-remove"></i>
                              </button>
                            </form>

                          </a>

                          @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div
                  class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
                  {{ $items->links() }}
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>