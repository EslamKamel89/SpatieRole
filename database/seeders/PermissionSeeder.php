<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $permissions = [
            'users.view',
            'users.create',
            'users.delete',
            'users.update',
            'roles.view',
            'roles.create',
            'roles.delete',
            'roles.update',
        ];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    }
}
