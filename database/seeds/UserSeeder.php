<?php

use App\User;
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
        $data = [
            [
                'name' => 'client',
                'email' => 'client@client.com',
                'role' => 'client',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => bcrypt('password'),
            ]

        ];
        return User::insert($data);
    }
}
