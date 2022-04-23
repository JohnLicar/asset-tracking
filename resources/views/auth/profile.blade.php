<x-app-layout>
    <x-slot name="header">
        {{ __('My profile') }}
    </x-slot>

    @if ($message = Session::get('success'))
    <div class="inline-flex w-full mb-4 overflow-hidden bg-white rounded-lg shadow-md">
        <div class="flex items-center justify-center w-12 bg-green-500">
            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                </path>
            </svg>
        </div>

        <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
                <span class="font-semibold text-green-500">Success</span>
                <p class="text-sm text-gray-600">{{ $message }}</p>
            </div>
        </div>
    </div>
    @endif

    <div class="p-4 bg-white rounded-lg shadow-md">

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-3 gap-6">
                <div>
                    <x-label for="name" :value="__('First Name')" />
                    <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                        value="{{ auth()->user()->first_name }}" autofocus />
                    @error('first_name')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div>
                    <x-label for="middle_name" :value="__('Middle Name')" />
                    <x-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name"
                        value="{{ auth()->user()->middle_name }}" autofocus />
                    @error('middle_name')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div>
                    <x-label for="last_name" :value="__('Last Name')" />
                    <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                        value="{{ auth()->user()->last_name }}" autofocus />
                    @error('last_name')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

            </div>

            <div class="grid grid-cols-2 gap-6 my-4">
                <div>
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                        value="{{ auth()->user()->email }}" autofocus />
                    @error('email')
                    <span class="text-xs text-red-600 dark:text-red-400">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                @if (auth()->user()->roles[0]->display_name == 'Client')
                <div>
                    <x-label for="position_id" :value="__('Position')" />
                    <select id="position_id" name="position_id"
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($positions as $position)
                        <option value="{{ $position->id }}" @if ($position->id === auth()->user()->position_id )
                            selected @endif>
                            {{ $position->description }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @endif

            </div>
            <div class="grid grid-col-2 gap-6">
                <div>
                    <x-label for="new_password" :value="__('New password')" />
                    <x-input id="new_password" class="block mt-1 w-full" type="password" name="password"
                        autocomplete="new-password" />
                </div>
                <div>
                    <x-label for="confirm_password" :value="__('Confirm password')" />
                    <x-input id="confirm_password" class="block mt-1 w-full" type="password"
                        name="password_confirmation" autocomplete="confirm-password" />
                </div>

                @error('password')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="mt-4">

                <img src="{{ asset('images/signatures/'.auth()->user()->signature ) }}" width="176" height="176">
                <span class="text-xs text-orange-600 dark:text-red-400">
                    Please use Transparent image for signature
                </span>
                @error('signature')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
                @enderror
                <x-input id="signature" class="block mt-1 w-full" type="file" name="signature"
                    :value="old('signature')" />
            </div>



            <div class="mt-4">
                <x-button class="block w-full">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>

    </div>
</x-app-layout>