<?php

namespace App\Http\Livewire\SuperAdmin;

use App\Models\Requisition as ModelsRequisition;
use Livewire\Component;
use Livewire\WithPagination;
class Requisition extends Component
{
    use WithPagination;
    public $search = '';
    public $status = '';
    
    public function render()
    {
       
        $requisitions = ModelsRequisition::search($this->search, $this->status)
        ->with(['unit'])
        ->where('status', '!=', ModelsRequisition::STATUS_TO_RETURN)
        ->orderBy('status')
        ->paginate(6);

        return view('livewire.super-admin.requisition', ['requisitions' =>  $requisitions]);
    }
}
