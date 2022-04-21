<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Apply Requisition') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <x-auth-validation-errors />
        <div class="p-6 bg-white border-b border-gray-200">

          <form method="POST" action="{{  route('requisition.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-2 gap-6">

              <div>
                <x-label for="devision" :value="__('Devision')" />
                <x-input id="devision" class="block mt-1 w-full" type="text" name="devision" :value="old('devision')" />
              </div>

              <div>
                <x-label for="office" :value="__('Office')" />
                <x-input id="office" class="block mt-1 w-full" type="text" name="office" :value="old('office')" />
              </div>



            </div>
            @livewire('client.add-item', ['item' => $item])

            <div class="grid grid-cols-2 gap-6">
              <div class="col-span-full">
                <x-label for="purpose" :value="__('Purpose')" />
                <textarea cols="42" rows="5" id="purpose"
                  class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-primary-600"
                  name="purpose">{{ old('purpose') }}</textarea>
              </div>

            </div>

            <div class="flex items-center justify-end mt-4">
              <x-back-button href="{{ route('cdashboard') }}" class="ml-3">
                {{ __('Back') }}
              </x-back-button>
              <x-button class="ml-3">
                {{ __('Create') }}
              </x-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>