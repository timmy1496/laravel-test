<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker): void
    {
        $data = [];

        for ($i = 0; $i <= 100; $i++) {
            $data[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt(Str::random(16)),
                'active' => rand(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        User::insert($data);
    }
}
