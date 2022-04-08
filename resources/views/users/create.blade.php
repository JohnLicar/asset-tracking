<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-validation-errors />
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{  route('users.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-3 gap-6">

                            <div>
                                <x-label for="name" :value="__('ID Number')" />
                                <x-input id="idnumber" class="block mt-1 w-full" type="number" name="idnumber"
                                    :value="old('idnumber')" autofocus />
                            </div>

                            <div>
                                <x-label for="name" :value="__('First Name')" />
                                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                                    :value="old('first_name')" />
                            </div>

                            <div>
                                <x-label for="middle_name" :value="__('Middle Name')" />
                                <x-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name"
                                    :value="old('middle_name')" />
                            </div>

                            <div>
                                <x-label for="last_name" :value="__('Last Name')" />
                                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                    :value="old('last_name')" />
                            </div>

                            <div>
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" />
                            </div>

                            <div>
                                <x-label for="contact_number" :value="__('Contact Number')" />
                                <x-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number"
                                    :value="old('contact_number')" />
                            </div>

                        </div>
                        @livewire('super-admin.create-position')

                        <div class="flex items-center justify-end mt-4">
                            <x-back-button href="{{ route('users.index') }}" class="ml-3">
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