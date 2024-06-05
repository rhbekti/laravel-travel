<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);

        // create permissions
        Permission::create(['name' => 'edit travel']);
        Permission::create(['name' => 'delete travel']);
        $permission = Permission::create(['name' => 'add travel']);

        $role->givePermissionTo($permission);
        $permission->assignRole($role);

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);

        $user->assignRole($role);
    }
}
