<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            [
                'name' => 'Crystal Chantel-Leer',
                'email' => 'crystal@example.com',
                'password' => 'Password1',
                'email_verified_at' => now(),
                'roles' => ['client'],
                'permissions' => [],
            ],

            [
                'name' => 'Eileen Dover',
                'email' => 'eileen@example.com',
                'password' => 'Password1',
                'email_verified_at' => null,
                'roles' => ['client'],
                'permissions' => [],
            ],

            [
                'name' => 'Mjr Annie Flatt',
                'email' => 'annie@example.com',
                'password' => 'Password1',
                'email_verified_at' => null,
                'roles' => ['client'],
                'permissions' => [],
            ],
            [
                'name' => "Jacques d'Carre",
                'email' => 'jacques@example.com',
                'password' => 'Password1',
                'email_verified_at' => now(),
                'roles' => ['client'],
                'permissions' => [],
            ],

            [
                'name' => 'Ivanna Winn',
                'email' => 'ivanna@example.com',
                'password' => 'Password1',
                'email_verified_at' => null,
                'roles' => ['client'],
                'permissions' => [],
            ],

            [
                'name' => 'Roly Decks',
                'email' => 'roly@example.com',
                'password' => 'Password1',
                'email_verified_at' => null,
                'roles' => ['client'],
                'permissions' => [],
            ],

            [
                'name' => "Parker d'Carre",
                'email' => 'parker@example.com',
                'password' => 'Password1',
                'email_verified_at' => now(),
                'roles' => ['client'],
                'permissions' => [],
            ],

            [
                'name' => "Rolly d'Carre",
                'email' => 'rolly@example.com',
                'password' => 'Password1',
                'email_verified_at' => null,
                'roles' => ['client'],
                'permissions' => [],
            ],

            [
                'name' => 'Anita Bathe',
                'email' => 'anita@example.com',
                'password' => 'Password1',
                'email_verified_at' => null,
                'roles' => ['client'],
                'permissions' => [],
            ],

            [
                'name' => "Paige Turner",
                'email' => 'paige@example.com',
                'password' => 'Password1',
                'email_verified_at' => null,
                'roles' => ['client'],
                'permissions' => [],
            ],
        ];

        // Remember to Import the DB class using "use Illuminate\Support\Facades\DB;"
        DB::table('users')->truncate();

        foreach ($seedUsers as $newUser) {

            // grab the roles & additional permissions from the seed users
            $roles = $newUser['roles'];
            unset($newUser['roles']);

            $permissions = $newUser['permissions'];
            unset($newUser['permissions']);

            $user = User::updateOrCreate(
                ['id' => $newUser['id']??null],
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
