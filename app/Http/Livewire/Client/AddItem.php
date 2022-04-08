<?php

namespace App\Http\Livewire\Client;

use App\Models\Inventory;
use Livewire\Component;

class AddItem extends Component
{

    public $items = [];
    public $inventories = [];

    public function mount(Inventory $item)
    {
        $this->items = [
            [
            'unit' => $item->unit,
            'inventory_id' => $item->id,
            'quantity' => $item->quantity
            ]
        ];
        $this->inventories = Inventory::all();

        // dd($this->items);
    }

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function addItem()
    {
        $this->items[] = [ 'inventory_id' => '', 'quantity' => '' ];
    }

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }


    public function render()
    {
        return view('livewire.client.add-item');
    }

   
}
