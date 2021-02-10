<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $user_seeds = [
            [
                'id' => 1,
                'name' => 'test01',
                'email' => 'test@test.test',
                'email_verified_at' => now(),
                'password' => Hash::make('testtest'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'test02',
                'email' => 'test02@test.test',
                'email_verified_at' => now(),
                'password' => Hash::make('testtest02'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        foreach ($user_seeds as $user) {
            DB::table('users')->insert($user);
        }
    }
}
