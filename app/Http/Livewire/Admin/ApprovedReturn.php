<?php

namespace App\Http\Livewire\Admin;

use App\Models\Requisition;
use Livewire\Component;
use Livewire\WithPagination;

class ApprovedReturn extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $requisitions = Requisition::search($this->search)
            ->with('request.unit', 'approved', 'requested')
            ->where('status', Requisition::STATUS_TO_RETURN)
            ->paginate(6);

        return view('livewire.admin.approved-return', compact('requisitions'));
    }
}
