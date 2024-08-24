<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(){

        //model user search by name, pagination 10
        $users = User::where('name', 'like', '%'.request('search').'%')->orderBy('id', 'desc')->paginate(10);
        return view('pages.users.index', compact('users'));
    }

    public function create(){
        return view('pages.users.create');
    }

    public function store(Request $request){
        //validate
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);
        //create user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position' => $request->position,
            'department' => $request->department,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    //show
    public function show(User $user){
        return view('pages.users.show', compact('user'));
    }

    //edit
    public function edit(User $user){
        return view('pages.users.edit', compact('user'));
    }

    //update
    public function update(Request $request, User $user){
        //validate
        $validasiData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required',
            'role' => 'required',
            'position' => 'max:255',
            'department' => 'max:255',
            'role' => 'required',
        ]);
        if($request->has('password')){
            $validasiData['password'] = Hash::make($request->password);
        }
        //update user
        $user->update($validasiData);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    //delete
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    //search model User by name with pagination 10
    public function search(){
        $users = User::where('name', 'like', '%'.request('search').'%')->orderBy('id', 'desc')->paginate(10);
        return view('pages.users.index', compact('users'));
    }



}
