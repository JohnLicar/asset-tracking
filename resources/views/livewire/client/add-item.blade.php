<div class="mt-3">
    <table class="min-w-max w-full table-fixed">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-md leading-normal">
                <th class="py-3 px-6 text-left w-2/6">Item</th>
                <th class="py-3 px-6 text-left w-2/6">Quantity</th>
                <th class="py-3 px-6 text-left w-1/6">Actions</th>
            </tr>
        </thead>
        <tbody class="text-base font-light">
            <div>
                <tr class="border-b border-gray-200 hover:bg-gray-100">

                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <x-input id="unit" class="block mt-1 w-full" type="text" name="unit" value="{{ $item->unit }}"
                            disabled />
                        <x-input id="inventory_id" class="block mt-1 w-full" type="hidden" name="inventory_id"
                            value="{{ $item->id }}" />
                    </td>

                    <td class="py-3 px-6 text-left whitespace-nowrap">

                        <x-input id="quantity" class="block mt-4 w-full" type="number"
                            placeholder="Available {{ $item->quantity }} quantity" :value="old('quantity')" />
                    </td>

                    <td class="py-3 px-6 text-left whitespace-nowrap">


                    </td>
            </div>
            @foreach ($items as $index => $position)
            <div>
                <tr class="border-b border-gray-200 hover:bg-gray-100">

                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <select id="unit" name="items[{{$index}}][inventory_id]"
                            wire:model="items.{{$index}}.inventory_id"
                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="" disabled>Select Item</option>

                            @foreach ($inventories as $inventory)
                            <option value="{{ $inventory->id }}">
                                {{ $inventory->description }}
                            </option>
                            @endforeach
                        </select>
                    </td>

                    <td class="py-3 px-6 text-left whitespace-nowrap">

                        <x-input id="quantity" class="block mt-4 w-full" type="number"
                            name="items[{{$index}}][quantity]" wire:model="items.{{$index}}.quantity" placeholder="Available {{ $item->quantity }} quantity" 
                            
                            />
                    </td>

                    <td class="py-3 px-6 text-center">
                        <div class="w-4 mr-2 mt-4 transform hover:text-red-500 hover:scale-110">
                            <button class="w-5 h-5" wire:click.prevent="removePosition({{$index}})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 1 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>

                        </div>

                    </td>
                </tr>
            </div>
            @endforeach
        </tbody>
    </table>


    <div class="flex items-center justify-end ">
        <x-add-position-button class="ml-3 mt-3 cursor-pointer" wire:click.prevent="addItem()">
            {{ __('Add Item') }}
        </x-add-position-button>
    </div>

</div>