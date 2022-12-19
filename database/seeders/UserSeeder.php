<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@localhost',
                'password' => bcrypt('admin'),
                'role_id' => 1,
            ]
            
        ];
        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
