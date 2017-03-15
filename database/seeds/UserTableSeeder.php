<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use App\UserNotification;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $user = User::create([
            'name'=> 'Max',
            'email'=> 'max@hotmail.com',
            'type'=> 'admin',
            'password'=>\Hash::make('secret'),
        ]);

        UserNotification::create([
            'm'=> 'Bienvenido',
            'user_id'=> $user->id,
            'v'=>0
        ]);
    }
}
