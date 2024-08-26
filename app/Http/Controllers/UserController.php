<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Variable $users when passing to web page using compact(),
        // the string name inside of compact is the same as variable
        // but with quotation either double or single and no dollar sign.

        $users = User::all(); // Fetch all users from users table
        return view('users.index', compact('users')); // Return web page called index from users folder with users data
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate values from form to add new user
        // Call each field name attribute and set rules for each
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'password' => ['required', 'confirmed'], // Password and confirm password must matched
            'password_confirmation' => ['required'], // Don't replace the field name password_confirmation
            'is_admin' => ['required']
        ]);

        // Insert new user on users table by calling the model, each column and validated values from form
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => $validated['password'],
            'is_admin' => $validated['is_admin']
        ]);

        $users = User::all(); // Fetch all users from users table

        if ($user) {
            // If user successfully inserted in database, code here...
            return back()->with('message_success', 'User successfully saved.')->with('users', $users);
        } else {
            // If user failed to insert in database, code here...
            return back()->with('message_failed', 'Failed to save user.')->with('users', $users);
        }
    }

    /**
     * Display the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // Only validate password if it is present in the request
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $request->password ? bcrypt($validatedData['password']) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
