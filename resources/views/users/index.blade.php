<x-app-layout>
    <x-slot name="header">
        {{ __('Users List') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="my-3">
            <a href="{{ route('users.create') }}">
                <x-button class="flex">
                    <i class="mr-2 gg-add-r"></i>
                    {{ __('Create User') }}
                </x-button>
            </a>
        </div>

        <div class="w-full mb-8 overflow-hidden border rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Contact Number</th>
                            <th class="px-4 py-3">Position</th>
                            <th class="px-4 py-3">Role</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach($users as $user)
                        <tr class="text-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        @if ($user->avatar)
                                        <img src="{{asset('images/profile/'.$user->avatar)}}" alt="User Picture"
                                            class="w-10 h-10 rounded-full">
                                        @else
                                        <img src="https://ui-avatars.com/api/?name={{ $user->full_name }}"
                                            class="w-10 h-10 mx-2 rounded-full" />
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $user->full_name }}

                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $user->contact_number }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $user->position?->description ?? 'Property Custodian'}}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                @if($user->roles[0]?->display_name == 'Administrator')
                                <span
                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-green-500 rounded-full">
                                    {{ $user->roles[0]?->display_name }}
                                </span>
                                @else
                                <span
                                    class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-yellow-500 rounded-full">
                                    {{ $user->roles[0]?->display_name }}
                                </span>
                                @endif
                            </td>

                            <td class="flex px-4 py-3 text-sm">
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="mt-2 mr-5 text-indigo-600 hover:text-indigo-900">
                                    <i class="gg-pen"></i>

                                </a>
                                {{-- <a
                                    href="{{ route('show-issued-item', 'up9BDMmSJjHPJJAfjhBJ4cSAeWt4D31eMnQvDbzS') }}"
                                    class="mt-2 mr-5 text-green-600 hover:text-indigo-900">
                                    <i class="gg-pen"></i>

                                </a> --}}
                                <a href="#" class="text-red-600  hover:text-red-900">
                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="w-4 h-4">
                                            <i class="gg-trash"></i>
                                        </button>
                                    </form>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div
                class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9">
                {{ $users->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
