<div>
    <div class="bg-white px-4 pt-5 pb-4 sm:px-6">
        <div class="w-full mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="my-4 text-lg leading-6 font-medium text-gray-900" id="modal-title">
                Request for Approval
            </h3>

            {{-- <div>
                <x-label for="quantity" :value="__('Quantity')" />
                <x-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" wire:model='quantity'
                    placeholder="Request {{ $item->quantity }} quantity" :value="old('quantity')" />
                @error('quantity') <span class="text-red-900">{{ $message }}</span> @enderror
            </div> --}}
            <div class="mt-2 w-full">
                <x-label for="remark" :value="__('Remark')" />
                <textarea cols="42" rows="3" id="remarks" wire:model='remarks'
                    class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-primary-600"
                    name="remarks">{{ old('remark') }}</textarea>
                @error('remarks') <span class="text-red-900">{{ $message }}</span> @enderror

            </div>

        </div>
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button wire:click='approve' type="button"
            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-geen-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
            Confirm Approve
        </button>
        <button type="button" wire:click='closeApproveModal'
            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
        </button>
    </div>
</div>