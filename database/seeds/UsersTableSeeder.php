<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$1ShZ8LgIOz48zB8jbvJiw.GbfJe/.g8Xyzuzm7aAa5xyFUzPVbfy6',
                'remember_token' => null,
                'created_at'     => '2019-09-18 10:58:47',
                'updated_at'     => '2019-09-18 10:58:47',
            ],
        ];

        User::insert($users);
    }
}
