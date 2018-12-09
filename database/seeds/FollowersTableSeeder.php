<?php

use Illuminate\Database\Seeder;
use App\User;
class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,1000) as $index) {
            DB::table('followers')->insert([
                'user_id' => User::all()->random()->id,
                'follower_id' => User::all()->random()->id,
            ]);
        }
    }
}
