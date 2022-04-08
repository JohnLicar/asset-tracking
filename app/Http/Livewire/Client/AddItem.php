<?php

namespace App\Http\Livewire\Client;

use App\Models\Inventory;
use Livewire\Component;

class AddItem extends Component
{

    public $items = [];
    public $item = [];
    public $inventories = [];

    public function mount(Inventory $item)
    {
        $this->item = $item;
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
        // dd($this->items);
    }


    public function render()
    {
        // info($this->items);
        return view('livewire.client.add-item');
    }

   
}
