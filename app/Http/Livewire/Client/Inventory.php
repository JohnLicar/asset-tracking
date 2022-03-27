<?php

namespace App\Http\Livewire\Client;

use App\Models\Inventory as ModelsInventory;
use Livewire\Component;
use Livewire\WithPagination;

class Inventory extends Component
{
    use WithPagination;
    public function render()
    {
        $items = ModelsInventory::paginate(10);
        return view('livewire.client.inventory', compact('items'));
    }
}
