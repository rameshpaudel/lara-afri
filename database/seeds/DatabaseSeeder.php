<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Database\Eloquent\Model::unguard();
            $this->call(UsersTableSeeder::class);
            $this->call(WatchtowerSeeder::class);
            $this->call(PostsSeeder::class);
            $this->call(ProfilesTableSeeder::class);
            $this->call(UploadsTableSeeder::class);
        \Illuminate\Database\Eloquent\Model::reguard();

    }
}
