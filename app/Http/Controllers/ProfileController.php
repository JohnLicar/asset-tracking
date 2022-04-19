<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {

        auth()->user()->update($request->only('first_name', 'middle_name', 'last_name', 'email'));

        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        // if ($request->name) {
        //     auth()->user()->update([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //     ]);
        // }


        if ($request->hasFile('signature')) {
            $signature =  auth()->id() . '-' .   auth()->user()->first_name . '-' .   auth()->user()->last_name . '.' . $request->signature->getClientOriginalExtension();
            $request->signature->move(public_path('images/signatures'), $signature);
            auth()->user()->update(['signature' =>  $signature]);
        }



        return redirect()->back()->with('success', 'Profile updated.');
    }
}
