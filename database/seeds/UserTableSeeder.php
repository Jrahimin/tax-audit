<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!User::where('email', 'admin@gmail.com')->first()){
            User::create([
                'name' => "admin",
                'email' => "admin@gmail.com",
                'email_verified_at' => now(),
                'mobile_no' => '01846999999',
                'type' => "admin",
                'password' => bcrypt('Password@1'),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
