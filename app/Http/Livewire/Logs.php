<?php

namespace App\Http\Livewire;

use App\Models\Requisition;
use Livewire\Component;
use Livewire\WithPagination;

class Logs extends Component
{
    use WithPagination;
    public $search = '';
    public function render()
    {
        $requisitions = Requisition::search($this->search)
            ->with('request.unit', 'approved', 'requested')
            ->onlyTrashed()
            ->paginate(6);

        return view('livewire.logs', compact('requisitions'));
    }
}
