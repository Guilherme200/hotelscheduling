<?php

use App\Enums\UserRolesEnum;
use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    public function run()
    {
        $this->createHotel();
    }

    private function createHotel()
    {
        $user = Hotel::create([
            'name' => 'Hotel 01',
            'phone' => '(42) 99999-9999',
            'city' => 'Guarapuava',
            'complement' => '------'
        ]);
    }
}
