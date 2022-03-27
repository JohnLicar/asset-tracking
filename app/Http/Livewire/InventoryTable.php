<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use Livewire\Component;
use Livewire\WithPagination;

class InventoryTable extends Component
{
    use WithPagination;
    public function render()
    {
        $items = Inventory::paginate(10);
        return view('livewire.inventory-table', compact('items'));
    }
}
