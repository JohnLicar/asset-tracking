<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Position;
use App\Models\User;
use App\Notifications\WelcomeNotification;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles', 'position')->where('id', '!=', auth()->id())
            ->paginate(7);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user =  User::create($request->validated());
        if ($request->hasFile('avatar')) {
            $avatar =  $user->id . '-' . $request->first_name . '-' . $request->last_name . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('images/profile'), $avatar);
            $user->update(['avatar' => $avatar]);
        }
        $request->role == 'administrator' ? $user->attachRole('administrator') : $user->attachRole('client');
        toast('User Created successfully', 'success');

        $welcomeMessage = [
            'body' => 'Good Day <strong>' . $user->full_name . '</strong> <br> This email is to inform you that you have already been registered on the <strong> GREGORIO CATENZA NATIONAL HIGHSCHOOL Asset Tracking System!</strong> <br><br> Please change your password after your first login',

            'thankyou' => 'Thank you for using GREGORIO CATENZA NATIONAL HIGHSCHOOL Asset Tracking System',
        ];
        
        $user->notify(new WelcomeNotification($welcomeMessage));

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if ($user->avatar)  unlink("images/profile/" . $user->avatar);

        $user->update($request->validated());

        if ($request->role != $user->roles[0]->name) {
            $user->detachRole($user->roles[0]->name);
            $user->attachRole($request->role);
        }

        if ($request->hasFile('avatar')) {
            $avatar =  $user->id . '-' . $request->first_name . '-' . $request->last_name . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('images/profile'), $avatar);
            $user->update(['avatar' => $avatar]);
        }

        toast('User Updated successfully', 'success');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        toast('User Deleted successfully', 'success');
        return redirect()->route('users.index');
    }
}
