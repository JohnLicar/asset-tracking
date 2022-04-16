<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use App\Models\Requisition;
use App\Models\RequisitionItem;
use App\Models\User;
use App\Notifications\ApproveRequestNotification;
use LivewireUI\Modal\ModalComponent;

class ApproveModal extends ModalComponent
{

    public  $items;
    public $remarks;

    public function mount($requisition)
    {
        $this->items = RequisitionItem::with('requester', 'unit', 'requesition.approved')->inventory($requisition)->get();
    }

    public function render()
    {
        return view('livewire.approve-modal');
    }

    protected $rules = [
        'remarks' => 'required',
    ];

    public function approve()
    {
        $this->validate();

        foreach ($this->items as $item) {
            $item->unit->update([
                'quantity' => ($item->unit->quantity - $item->quantity)
            ]);
        }

        $this->items[0]->requesition->update([
            'status' => 2,
            'approved_by' => auth()->id(),
            'remarks' => $this->remarks,
            'approved_date' => now(),

        ]);

        $clientData = [
            'body' => 'Good Day <strong>' . $this->items[0]->requester->full_name . '</strong> GREGORIO CATENZA NATIONAL HIGHSCHOOL Asset Tracking System!
            Your request for <strong>  <br> ' . $this->items[0]->requesition->purpose  . '</strong> was approved by <strong>' .  $this->items[0]->requesition->full_name . '</strong>',

            'thankyou' => 'Thank you for using GREGORIO CATENZA NATIONAL HIGHSCHOOL Asset Tracking System',
        ];

        $this->items[0]->requester->notify(new ApproveRequestNotification($clientData));

        $this->closeModal();
        toast('Request Approved successfully', 'success');
        return redirect()->route('requisitions.index');
    }

    public function closeApproveModal()
    {
        $this->closeModal();
    }
}
