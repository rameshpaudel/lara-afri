<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;
class PostsSeeder extends Seeder
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
        foreach ($userId as $user) {
              DB::table('posts')->insert([
                'title' => $faker->name,
                'content' => $faker->lastName,
                'user_id' => $user
            ]);

        }

    }

}
