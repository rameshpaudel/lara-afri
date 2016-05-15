<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
class UploadsTableSeeder extends Seeder
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
        foreach($userId as $user){
            DB::table('uploads')->insert([
                'file_name' => $faker->image(base_path().'/public/uploads/certificates/'),
                'user_id' => $user,
                'approved' => 1

            ]);
        }
    }
}
