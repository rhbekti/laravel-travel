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
        Role::create(['name' => 'user']);
        $role = Role::create(['name' => 'admin']);

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);

        $user->assignRole($role);
    }
}
