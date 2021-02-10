<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('folders')->delete();
        $user = DB::table('users')->first();

        $folder_seeds = [
            [
                'id' => 1,
                'user_id' => $user->id,
                'title' => 'プライベート',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'user_id' => $user->id,
                'title' => '仕事',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'user_id' => $user->id,
                'title' => '旅行',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        foreach ($folder_seeds as $folder) {
            DB::table('folders')->insert($folder);
        }
    }
}

