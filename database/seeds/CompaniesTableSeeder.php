<?php

use \Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Company');

        for ($i = 0; $i < 50; $i++) {
            DB::table('companies')->insert([
                'name' => $faker->company,
                'email' => $faker->companyEmail,
                'logo' => $faker->imageUrl(),
                'website' => $faker->url,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
