<div class="h-auto">
    <div class="w-9/12 ">
        <div class="bg-white shadow-sm w-96 sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <form action="{{ route('approved-requisition.issue', $requisition[0]->requisition_id) }}" method="PUT">
                    @csrf
                    @method('DELETE')


                    <div class="mb-5">
                        <p class="text-xl font-medium text-left">Add the qr code that is in the item</p>
                        <p class="text-sm text-left text-gray-500">All fields are required</p>
                    </div>

                    <div>
                        <!-- Dropdown -->

                        @foreach ($requisition as $requist)

                        <p>{{ $requist->unit->unit }} : {{ $length }} : {{ $requist->quantity }}</p>
                        @for ($i = 0; $i < $requist->quantity; $i++) <select
                                id="qr_code[{{ $requist->unit->id }}][{{ $i }}]"
                                name="qr_code[{{ $requist->unit->id }}][{{ $i }}]"
                                class="block w-full mt-4 border-gray-300 rounded-md shadow-sm qr_code focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value=''>Select QR Code {{ $i }}</option>
                                @foreach ($qr_codes as $qr_code)
                                <option value='{{ $qr_code->id }}'>{{ $qr_code->qr_code }}</option>
                                @endforeach
                            </select>
                            {{-- @break

                            @endif --}}
                            <p class="mt-3">
                            </p>
                            @endfor
                            @endforeach


                    </div>

                    <input type="text" name="requisition_item_id" hidden value="{{$requisition[0]->id  }}">
                    <div class="mt-4">
                        <div class="flex items-center justify-end mt-4">
                            <x-back-button wire:click="$emit('closeModal')">
                                {{ __('Back') }}
                            </x-back-button>
                            <x-button>
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){

        // Initialize select2
        $(".qr_code").select2();
        });
    </script>
</div>
