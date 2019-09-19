<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'         => 1,
                'title'      => 'Admin',
                'created_at' => '2019-09-18 10:58:47',
                'updated_at' => '2019-09-18 10:58:47',
            ],
            [
                'id'         => 2,
                'title'      => 'User',
                'created_at' => '2019-09-18 10:58:47',
                'updated_at' => '2019-09-18 10:58:47',
            ],
        ];

        Role::insert($roles);
    }
}
