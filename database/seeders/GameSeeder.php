<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fake = Faker::create();
        foreach(range(1 , 10) as $index){
            DB::table('games')->insert([
              'name'=>$fake->word, 
              'cover_art'=> '...',
              'developer'=>$fake->company,
              'release_year'=>$fake->year,
              'genre'=>$fake->word,
            ]);
        }
    }
}
