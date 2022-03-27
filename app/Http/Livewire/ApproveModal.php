<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use App\Models\Requisition;
use App\Models\User;
use App\Notifications\ApproveRequestNotification;
use LivewireUI\Modal\ModalComponent;

class ApproveModal extends ModalComponent
{

    public $item;
    public $remarks;
    public $quantity;

    public function mount(Requisition $requisition)
    {
        $this->item = $requisition; 
    }
    
    public function render()
    {
        return view('livewire.approve-modal');
    }

    protected $rules = [
        'quantity' => 'required|min:1|integer',
        'remarks' => 'required',
    ];

    public function approve()
    {
       
        $user = User::where('id', $this->item->requested_by)->firstOrFail();

        $item = Inventory::find($this->item->inventory_id);

        $this->validate();

        if ($item->quantity < $this->quantity) {
            toast('Available quantity wont be enough', 'danger');
            return redirect()->route('requisitions.index');
        }

        $item->update([
            'quantity' => ($item->quantity - $this->quantity)
        ]);

        $this->item->load('unit', 'approved')->update([
            'status' => 2,
            'approved_by' => auth()->id(),
            'remarks' => $this->remarks,
        ]);
       
       
       $approver = Requisition::with('approved')
       ->where('id', $this->item->id)->first();
 
       
        $clientData = [
            'body' => 'Good Day <strong>' . $user->full_name . '</strong> GREGORIO CATENZA NATIONAL HIGHSCHOOL Asset Tracking System!
            Your request of <strong>'. $this->item->unit->unit .'</strong> was approved by <strong>'.  $approver->approved->full_name .'</strong>',

            'thankyou' => 'Thank you for using GREGORIO CATENZA NATIONAL HIGHSCHOOL Asset Tracking System',
        ];
        
        $user->notify(new ApproveRequestNotification($clientData));

        $this->closeModal();
        toast('Request Approved successfully', 'success');
        return redirect()->route('requisitions.index');
    }

   

    public function closeApproveModal(){
        $this->closeModal();
    }
}
