<div>
    <div class="relative mb-3">
        <select wire:model.debounce.300ms="year"
            class="block w-1/4 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="" selected>All</option>
            @foreach ($years as $service)
            <option value="{{ $service}}">
                {{ $service }}
            </option>
            @endforeach
        </select>
    </div>
    {!! $reportChart->container() !!}
    {{ $reportChart->script() }}

</div>
