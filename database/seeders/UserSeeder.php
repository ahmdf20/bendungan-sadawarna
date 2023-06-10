<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ahmad Fadilah',
            'email' => 'ahmadfadilah202003@gmail.com',
            'phone' => '085795069461',
            'password' => Hash::make('admin'),
            'photo' => 'image/profile-default.jpg'
        ]);
    }
}
