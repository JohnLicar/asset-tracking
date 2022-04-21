<?php

namespace App\Http\Livewire\Superadmin;

use App\Models\Requisition;
use App\Models\UserLog;
use Livewire\Component;
use Livewire\WithPagination;

class UserLogs extends Component
{
    use WithPagination;
    public $search = '';
    public function render()
    {

        $userslog = UserLog::with('user')->get();
        dd($userslog);
        return view('livewire.superadmin.user-logs', compact('userslog'));
    }
}
