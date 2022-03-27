<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-validation-errors />
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{  route('users.update', $user) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-3 gap-6">
                            <div>
                                <x-label for="name" :value="__('ID Number')" />
                                <x-input id="idnumber" class="block mt-1 w-full" type="number" name="idnumber" value="{{ $user->idnumber }}" autofocus />
                            </div>

                            <div>
                                <x-label for="name" :value="__('First Name')" />
                                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" value="{{ $user->first_name }}"  />
                            </div>

                            <div>
                                <x-label for="middle_name" :value="__('Middle Name')" />
                                <x-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" value="{{ $user->middle_name }}" />
                            </div>

                            <div>
                                <x-label for="last_name" :value="__('Last Name')" />
                                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" value="{{ $user->last_name }}" />
                            </div>

                            <div>
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" />
                            </div>

                            <div>
                                <x-label for="email" :value="__('Contact Number')" />
                                <x-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" value="{{ $user->contact_number }}"/>
                            </div>

                            <div>
                                <x-label for="role" :value="__('Role')" />

                                <div class="form-check">
                                    <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" value="client" name="role" id="role"
                                        @if($user->isA('client')) checked @endif>
                                    <label class="form-check-label inline-block text-gray-800" for="role">
                                     Client
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" value="administrator" name="role" id="role"
                                        @if($user->isA('administrator')) checked @endif>
                                    <label class="form-check-label inline-block text-gray-800" for="role">
                                     Admin
                                    </label>
                                </div>
                            </div>

                            <div>
                                <x-label for="avatar" :value="__('Image')" />
                                <div class="flex">
                                  @if ($user->avatar)
                                  <img src="{{asset('images/profile/'. $user->avatar)}}" alt="Teacher Picture"
                                    class="w-12 h-12 border dark:border-coolGray-700">
                                  @endif
                                  <x-input id="avatar" class="block ml-3 mt-1 w-full" type="file" name="avatar"
                                    :value="old('avatar')" />
                                </div>
                            </div>

                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-back-button href="{{ route('users.index') }}" class="ml-3">
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
