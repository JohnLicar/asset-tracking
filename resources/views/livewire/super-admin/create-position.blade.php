<div>
    <div class="grid grid-cols-3 gap-6 mt-3">


        <div>
            <x-label for="role" :value="__('Role')" />
            <div class="form-check">
                <input wire:model='role'
                    class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                    type="radio" value="client" name="role" id="role">
                <label class="form-check-label inline-block text-gray-800" for="role">
                    Client
                </label>
            </div>
            <div class="form-check">
                <input wire:model='role'
                    class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                    type="radio" value="administrator" name="role" id="role">
                <label class="form-check-label inline-block text-gray-800" for="role">
                    Admin
                </label>
            </div>
        </div>

        @if ($role == "client")
        <div>
            <x-label for="position_id" :value="__('Position')" />
            <select id="position" name="position_id" :value="old('position_id')"
                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="" disabled selected>Select Position</option>

                @foreach ($positions as $position)
                <option value="{{ $position->id }}">
                    {{ $position->description }}
                </option>
                @endforeach
            </select>
        </div>
        @endif

        <div>
            <x-label for="avatar" :value="__('Image')" />
            <x-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" :value="old('avatar')" />
        </div>


    </div>
</div>