<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("users.index")->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.new');
    }

    public function createUser(array $validatedData)
    {
        $user = new User();

        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->email = $validatedData['email'];
        $user->phone_no = $validatedData['phone_no'];
        $user->password = Hash::make($validatedData['password']); // Use bcrypt to hash the password
        $user->user_role = $validatedData['user_role'];

        $user->save();

        return $user;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'password' => 'required|min:6|max:20|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@$!%*?&]/',
            'user_role' => 'required',
        ], [
            'password_rules' => 'The password must be at least 6 characters long and contain at least one uppercase letter, one lowercase letter, and one number.',
        ]);

        if ($validatedData) {

            $user = $this->createUser($validatedData);

            return redirect('/users')->with('success', 'User added successfully.');
        } else {
            return redirect()->back()->withErrors([
                'password_rule' => 'Password must be betwwen 6 upto 20 characters long and must contain a small letter, a capital letter and special characters (@$!%*?&)!',
            ])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
