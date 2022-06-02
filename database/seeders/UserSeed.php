<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Wesley Alves',
            'email' => 'wesley.alvesxll@gmail.com',
            'password' => Hash::make('teste@123'),
            'created_at' => '2022/05/20 00:00:00',
            'updated_at' => '2022/05/20 00:00:00'
        ]);
    }
}
