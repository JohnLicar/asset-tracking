<?php

namespace App\Http\Livewire;

use App\Models\QrCode;
use App\Models\Requisition;
use App\Models\RequisitionItem;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class IssueRequisitionModal extends ModalComponent
{
    public $requisition;
    public $length;


    public function mount($requisition)
    {
        $this->requisition =  RequisitionItem::with('unit')->where('requisition_id', $requisition)
            ->get();

        $this->length = $this->requisition->sum('quantity');
    }

    public function render()
    {

        $qr_codes = QrCode::where('status', false)->get();
        return view('livewire.issue-requisition-modal', compact('qr_codes'));
    }
}
