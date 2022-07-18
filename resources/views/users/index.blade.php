<x-app-layout>
    <x-slot name="header">
        {{ __('Users List') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="my-3">
            <a href="{{ route('users.create') }}">
                <x-button class="flex">
                    <i class="gg-add-r mr-2"></i>
                    {{ __('Create User') }}
                </x-button>
            </a>
        </div>

        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
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
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @if ($user->avatar)
                                        <img src="{{asset('images/profile/'.$user->avatar)}}" alt="User Picture"
                                            class="h-10 w-10 rounded-full">
                                        @else
                                        <img src="https://ui-avatars.com/api/?name={{ $user->full_name }}"
                                            class="mx-2 h-10 w-10 rounded-full" />
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
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">
                                    {{ $user->roles[0]?->display_name }}
                                </span>
                                @else
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-white">
                                    {{ $user->roles[0]?->display_name }}
                                </span>
                                @endif
                            </td>

                            <td class="flex  px-4 py-3 text-sm">
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="mt-2 mr-5 text-indigo-600 hover:text-indigo-900">
                                    <i class="gg-pen"></i>

                                </a>
                                <a href="{{ route('show-issued-item', 'up9BDMmSJjHPJJAfjhBJ4cSAeWt4D31eMnQvDbzS') }}"
                                    class="mt-2 mr-5 text-green-600 hover:text-indigo-900">
                                    <i class="gg-pen"></i>

                                </a>
                                <a href="#" class=" text-red-600 hover:text-red-900">
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
                class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
                {{ $users->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
