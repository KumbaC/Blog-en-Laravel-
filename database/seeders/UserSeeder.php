<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Antonio Puerta",
            'email' => "antoniox-2@outlook.es",
            'password' =>bcrypt('12345'),
        ])->assignRole('admin');
        User::Factory(35)->create();
    }
}
