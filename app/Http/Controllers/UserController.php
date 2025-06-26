<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

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
        return inertia('admin/users/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        dd($request->all(['name', 'email', 'password']));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) {
        //
    }
}
