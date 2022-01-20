<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@blog.com',
                'password' => bcrypt('admin0101'),
                'status' => 1
            ]
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
