<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            [
                'name' => 'admin',
                'description' => 'Administrator',
            ],
            [
                'name' => 'author',
                'description' => 'Author',
            ],
            [
                'name' => 'user',
                'description' => 'User',
            ],
        ];
        foreach ($roles as $role) {
            \App\Models\Role::create($role);
        }

    }
}
