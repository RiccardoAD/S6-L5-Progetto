<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      for($i=0 ; $i < 30; $i++){
        Activity::create([
            "title"=> fake()->words(rand(3,10), true),
            "price"=>rand(15,100),
            
            "img"=>fake()->imageUrl(640, 480),
            "user_id"=>rand(1, 10),



        ]);
      }

    }
}
