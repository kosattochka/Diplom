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
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.ru',
                'password' => Hash::make('admin'),
                'phone' => '123123123',
            ],
            [
                'name' => 'test',
                'email' => 'test@test.ru',
                'password' => Hash::make('test'),
                'phone' => '321321321',
            ],
        ]);
    }
}
