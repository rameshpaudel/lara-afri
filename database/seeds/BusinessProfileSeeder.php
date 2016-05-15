<?php

use Illuminate\Database\Seeder;

class BusinessProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker\Generator();
        foreach(range(0,4) as $r){
            DB::table('business_profiles')->insert([
                'user_type' => rand(0,2),
                'company_name' => $faker->firstName,
                'city' => $faker->lastName,
                'country' => $faker->country,
                'address' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'established_on' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'user_id' => $r,

            ]);
        }
    }
}
