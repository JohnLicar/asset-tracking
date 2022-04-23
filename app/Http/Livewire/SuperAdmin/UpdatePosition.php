<?php

namespace App\Http\Livewire\SuperAdmin;

use App\Models\Position;
use App\Models\User;
use Livewire\Component;

class UpdatePosition extends Component
{
    public $role = '';
    public User $user;
    public function mount(User $user)
    {
        $this->role = $user->roles[0]->name;
        $this->user = $user;
    }
    public function render()
    {
        $positions = Position::all();

        return view('livewire.super-admin.update-position', compact('positions'));
    }
}
