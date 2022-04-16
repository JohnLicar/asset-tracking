<?php

namespace App\Http\Livewire\Admin;

use App\Models\Requisition;
use Livewire\Component;

class ApprovedRequisition extends Component
{
    public function render()
    {

        $requisitions = Requisition::with('request.unit', 'approved', 'requested')
            ->where('status', 2)
            ->paginate(6);

        return view('livewire.admin.approved-requisition', compact('requisitions'));
    }
}
