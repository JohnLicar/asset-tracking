<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        @livewire('client.inventory')
    </div>
</x-app-layout>