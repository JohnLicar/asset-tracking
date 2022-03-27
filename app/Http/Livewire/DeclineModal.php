<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Requisition;

class DeclineModal extends ModalComponent
{

    public $item;
    public $remarks;

    public function mount(Requisition $requisition)
    {
        $this->item = $requisition; 
    }

    public function render()
    {
        return view('livewire.decline-modal');
    }

    public function decline()
    {

        $this->item->update([
            'status' => 3,
            'approved_by' => auth()->id(),
            'remarks' => $this->remarks,
        ]);
       
        $this->closeModal();
        toast('Request Declined successfully', 'success');
        return redirect()->route('requisitions.index');

    }

    public function closeApproveModal(){
        $this->closeModal();
    }
}
