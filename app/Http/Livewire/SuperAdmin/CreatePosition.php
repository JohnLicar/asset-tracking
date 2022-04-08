<?php

namespace App\Http\Livewire\SuperAdmin;

use App\Models\Position;
use Livewire\Component;

class CreatePosition extends Component
{
    public $role = '';
    public function render()
    {
        $positions = Position::all();
        return view('livewire.super-admin.create-position', compact('positions'));
    }


}
