<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'family_name' => Str::random(5),
            'first_name' => Str::random(5),
            'family_name_hira' => Str::random(5),
            'first_name_hira' => Str::random(5),
            'email' => 'test@posse-ap.com',
            'password' => Hash::make('password'),
            'generation' => 1,
        ]);

        User::create([
            'family_name' => Str::random(5),
            'first_name' => Str::random(5),
            'family_name_hira' => Str::random(5),
            'first_name_hira' => Str::random(5),
            'email' => Str::random(8).'@gmail.com',
            'password' => Hash::make('password'),
            'generation' => 2,
        ]);
    }
}
