<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-validation-errors />
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{  route('inventory.update', $inventory) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="grid grid-cols-2 gap-6">

                            <div>
                                <x-label for="name" :value="__('Unit Name')" />
                                <x-input id="unit" class="block mt-1 w-full" type="text" name="unit"
                                    value="{{ $inventory->unit }}" />
                            </div>

                            <div>
                                <x-label for="quantity" :value="__('Quantity')" />
                                <x-input id="quantity" class="block mt-1 w-full" type="number" name="quantity"
                                    value="{{ $inventory->quantity }}" />
                            </div>

                            <div>
                                <x-label for="amount" :value="__('Amount')" />
                                <x-input id="amount" class="block mt-1 w-full" type="number" name="amount"
                                    value="{{ $inventory->amount }}" />
                            </div>


                            <div>
                                <x-label for="life_span" :value="__('Estimated Useful life')" />
                                <x-input id="life_span" class="block mt-1 w-full" type="text" name="life_span"
                                    value="{{ $inventory->life_span }}" />
                            </div>

                            <div>
                                <x-label for="status" :value="__('Status')" />
                                <select id="status" name="status"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                                    <option value="1" @if ($inventory->status === 1 )
                                        selected @endif>
                                        Available
                                    </option>

                                    <option value="3" @if ($inventory->status === 3 )
                                        selected @endif>
                                        Suspended
                                    </option>

                                </select>
                            </div>

                            <div>
                                <x-label for="consumable" :value="__('Consumable?')" />
                                <select id="isConsumable" name="isConsumable" class=" block mt-1 w-full rounded-md shadow-sm border-gray-300
                                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="" selected disabled>--Select true if Consumable--</option>

                                    <option value=1 @if ($inventory->isConsumable === 1 )
                                        selected @endif>
                                        True
                                    </option>
                                    <option value=0 @if ($inventory->isConsumable === 0 )
                                        selected @endif>
                                        False
                                    </option>
                                </select>
                            </div>



                            <div class="col-span-full">
                                <x-label for="description" :value="__('Description')" />
                                <textarea cols="42" rows="5" id="description"
                                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-primary-600"
                                    name="description">{{$inventory->description}}</textarea>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-back-button href="{{ route('inventory.index') }}" class="ml-3">
                                {{ __('Back') }}
                            </x-back-button>
                            <x-button class="ml-3">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>