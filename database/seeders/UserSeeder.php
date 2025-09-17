<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedUsers = [
            [
                'id' => 99,
                'name' => 'Super Admin',
                'email' => 'supervisor@example.com',
                'password' => 'Password1',
                'email_verified_at' => now(),
                'roles' => ['super-user', 'admin'],
                'permissions' => [],
            ],

            [
                'id' => 100,
                'name' => 'Admin I Strator',
                'email' => 'admin@example.com',
                'password' => 'Password1',
                'email_verified_at' => now(),
                'roles' => ['admin'],
                'permissions' => [],
            ],

            [
                'id' => 200,
                'name' => 'Staff User',
                'email' => 'staff@example.com',
                'password' => 'Password1',
                'email_verified_at' => now(),
                'roles' => ['staff'],
                'permissions' => [],
            ],

            [
                'id' => 300,
                'name' => 'Client User',
                'email' => 'client@example.com',
                'password' => 'Password1',
                'email_verified_at' => now(),
                'roles' => ['client'],
                'permissions' => [],
            ],

            [
                'id' => 301,
                'name' => 'Client User II',
                'email' => 'client2@example.com',
                'password' => 'Password1',
                'email_verified_at' => null,
                'roles' => ['client'],
                'permissions' => [],
            ],

            [
                'id' => 302,
                'name' => 'Client User III',
                'email' => 'client3@example.com',
                'password' => 'Password1',
                'email_verified_at' => null,
                'roles' => ['client'],
                'permissions' => [],
            ],
        ];

        foreach ($seedUsers as $newUser) {

            // grab the roles & additional permissions from the seed users
            $roles = $newUser['roles'];
            unset($newUser['roles']);

            $permissions = $newUser['permissions'];
            unset($newUser['permissions']);

            $user = User::updateOrCreate(
                ['id' => $newUser['id']],
                $newUser
            );

            // Uncomment this line when using Spatie Permissions
            // $user->assignRole($roles);
            // $user->assignPermissions($permissions);

        }

        // Uncomment the line below to create (10) randomly named users using the User Factory.
        // User::factory(10)->create();

    }
}
