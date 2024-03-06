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
        $users = [
            [
                'name'           => 'anas',
                'email'          => 'admin@anas.com',
                'password'       => bcrypt('987654321'),
                'remember_token' => null
            ],

        ];

        foreach ($users as $user){
            $create = User::create($user);
            $create->roles()->attach(3);
        }


    }
}
