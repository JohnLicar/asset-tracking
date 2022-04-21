<?php

namespace App\Http\Livewire;

use App\Models\Requisition;
use App\Models\UserLog;
use Livewire\Component;
use Livewire\WithPagination;

class Logs extends Component
{
    use WithPagination;
    public $search = '';
    public $userlogsearch = '';
    public function render()
    {
        $requisitions = Requisition::search($this->search)
            ->with('request.unit', 'approved', 'requested')
            ->onlyTrashed()
            ->paginate(6);

        $userlogs = UserLog::search($this->userlogsearch)
            ->with('user')
            ->paginate(6);

        return view('livewire.logs', compact('requisitions', 'userlogs'));
    }
}
