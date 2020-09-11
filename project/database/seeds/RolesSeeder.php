<?php

use App\Support\PermissionsHelper;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $profiles = config('profile-permissions');

        foreach ($profiles as $profile => $permissions) {
            $rolePermissions = PermissionsHelper::getFlattenPermissions($permissions);
            $role = Role::firstOrCreate([
                'name' => $profile,
                'guard_name' => 'web',
            ]);
            $role->syncPermissions($rolePermissions);
        }
    }
}
