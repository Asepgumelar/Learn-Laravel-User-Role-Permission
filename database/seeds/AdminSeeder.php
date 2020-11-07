<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user             = new User();
        $user->name       = 'Admin';
        $user->email      = 'admin@gmail.com';
        $user->password   = Hash::make('Fkjs7834hjasd');
        $user->joined_at  = now();
        $user->created_at = now();
        $user->save();

        $faker = Faker::create();

        for($i = 0; $i < 5; $i++) {
            $data             = new User();
            $data->name       = $faker->name;
            $data->email      = $faker->email;
            $data->password   = Hash::make('asdasdasd');
            $user->joined_at  = now();
            $user->created_at = now();
            $data->save();
        }
    }
}
