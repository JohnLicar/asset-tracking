<?php

namespace App\Http\Livewire\ViewIssuedItem;

use App\Models\QrCode;
use App\Models\Requisition;
use Livewire\Component;

class ShowIssuedItem extends Component
{
    public $headers = 'Post Compoent Page';
    public function mount($qrCode)
    {
        dd($qrCode);
    }

    public function render()
    {
        return view('livewire.view-issued-item.show-issued-item');
    }
}
