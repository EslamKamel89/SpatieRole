<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return inertia('admin/users/Index', [
            'users' => UserResource::collection(User::all()),
            // 'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return inertia('admin/users/Create', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated =   $request->validate([
            'name' => ['required', 'max:255', 'min:2'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:255'],
        ]);
        $user =    User::create($validated);
        return redirect()->route('users.index')->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user) {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user) {
        return inertia('admin/users/Update', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user) {
        $validated =   $request->validate([
            'name' => ['required', 'max:255', 'min:2'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignoreModel($user)],
            'password' => ['sometimes', 'nullable', 'min:6', 'max:255'],
        ]);
        if ($validated['password'] == '') {
            unset($validated['password']);
        }
        $user->update($validated);
        return redirect()->route('users.index')->with('success', 'User Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User Deleted Successfully');
    }
}
