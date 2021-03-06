<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Position;
use App\Models\UserLog;

class ProfileController extends Controller
{
    public function show()
    {
        $positions = Position::all();

        return view('auth.profile', compact('positions'));
    }

    public function update(ProfileUpdateRequest $request)
    {


        auth()->user()->update($request->only('first_name', 'middle_name', 'last_name', 'email'));

        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }


        if ($request->hasFile('signature')) {
            $signature =  auth()->id() . '-' .   auth()->user()->first_name . '-' .   auth()->user()->last_name . '.' . $request->signature->getClientOriginalExtension();
            $request->signature->move(public_path('images/signatures'), $signature);
            auth()->user()->update(['signature' =>  $signature]);
        }

        if ($request->position_id) {
            auth()->user()->update(['position_id' => $request->position_id]);
        }


        UserLog::create([
            'log_name' => 'Account Updated',
            'event' => 'logout',
            'user_id' => auth()->id(),
            'description' => 'You\'ve updated your account information. '
        ]);

        return redirect()->back()->with('success', 'Profile updated.');
    }
}
