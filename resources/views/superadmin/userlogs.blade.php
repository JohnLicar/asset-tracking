<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Approved Return Item') }}
    </h2>
  </x-slot>

  <div class="py-6">
    <div class="mx-auto ">
      <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">

        <div class="p-3 bg-white border-b border-gray-200">

          <!-- component -->
          @livewire('superadmin.user-logs')
        </div>
      </div>
    </div>
  </div>
</x-app-layout>