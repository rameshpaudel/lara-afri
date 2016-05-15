<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        foreach(range(1,10) as $r)
        {
            DB::table('users')->insert([
                'name' => $faker->name,
                'username' => $faker->userName,
                'password' => bcrypt('123456789'),
                'email' => $faker->email,
                'status' => 0,
                'user_registered' => rand(0,2),
                'user_type' => rand(0,3),
                'api_token' => str_random(60)

            ]);
        }
    }
}
