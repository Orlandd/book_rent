<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('profile', [
            'users' => User::all()->where('id', auth()->user()->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('profileEdit', [
            'users' => User::all()->where('id', auth()->user()->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        if (auth()->guest() || auth()->user()->role_id !== 1) {

            $validated = [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'phone' => 'required|numeric|min:8',
                'address' => 'required'
            ];

            if ($request->username != auth()->user()->username) {
                $validated['username'] = 'required|unique:users|max:255|min:6';
            }

            $validatedData = $request->validate($validated);

            $validatedData['password'] = auth()->user()->password;


            User::where('id', auth()->user()->id)
                ->update($validatedData);

            return redirect('/profile/' . auth()->user()->id)->with('success', 'User has been update!');
        }

        // dd($request);

        $user->status = 'active';
        $user->save();

        return redirect('/dashboard/users')->with('success', 'User has been active!');

        // return ("testing");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success', 'User has been deleted!');
    }
}
