<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return inertia('admin/roles/Index', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return inertia(
            'admin/roles/Create',
            ['permissions' => Permission::all()]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role) {
        //
    }
}
