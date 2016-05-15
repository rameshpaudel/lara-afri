<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;
class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $userId = User::lists('id');

        $users = User::all();
        foreach ($users as $user) {
            switch($user->user_registered){
                case '0':
                    DB::table('personal_profiles')->insert([
                        'first_name' => $faker->name,
                        'last_name' => $faker->lastName,
                        'country' => $faker->country,
                        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),

                        'user_id' => $user->id

                    ]);
                    break;
                case '1':
                    DB::table('personal_profiles')->insert([
                         'first_name' => $faker->name,
                        'last_name' => $faker->lastName,
                        'country' => $faker->country,
                        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),

                        'user_id' => $user->id

                    ]);
                    break;
                case '2':
                    $country = $faker->country;
                    DB::table('personal_profiles')->insert([
                         'first_name' => $faker->name,
                        'last_name' => $faker->lastName,
                        'country' => $country,
                        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),

                        'user_id' => $user->id

                    ]);
                    DB::table('business_profiles')->insert([
                        'user_type' => 2,
                        'company_name' => $faker->company,
                        'city' => $faker->city,
                        'country' => $country,
                        'address' => $faker->address,
                        'established_on' => $faker->date($format = 'Y-m-d', $max = 'now'),
                        'user_id' => $user->id
                    ]);
                    break;
                case '3':
                    $country = $faker->country;
                    DB::table('personal_profiles')->insert([
                         'first_name' => $faker->name,
                        'last_name' => $faker->lastName,
                        'country' => $country,
                        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),

                        'user_id' => $user->id

                    ]);
                    DB::table('business_profiles')->insert([
                        'user_type' => 3,
                        'company_name' => $faker->company,
                        'city' => $faker->city,
                        'country' => $country,
                        'address' => $faker->address,
                        'established_on' => $faker->date($format = 'Y-m-d', $max = 'now'),
                        'user_id' => $user->id
                    ]);
                    break;
                default:
                    break;
            }

        }
    }
}
