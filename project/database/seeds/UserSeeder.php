<?php

use App\Enums\UserRolesEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->createAdmin();
        $this->createClient();
    }

    private function createAdmin()
    {
        $user = User::create([
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'password' => \Hash::make('123456')
        ]);

        $user->assignRole(UserRolesEnum::ADMIN);
    }

    private function createClient()
    {
        $user = User::create([
            'name' => 'Cliente',
            'email' => 'client@email.com',
            'password' => \Hash::make('123456')
        ]);

        $user->assignRole(UserRolesEnum::CLIENT);
    }
}
