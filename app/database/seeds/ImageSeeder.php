<?php

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $data = [];

        foreach (range(1 ,101) as $value) {
            $data[$value]['url'] = $faker->imageUrl();
        }

        DB::table('images')->insert($data);
    }
}
