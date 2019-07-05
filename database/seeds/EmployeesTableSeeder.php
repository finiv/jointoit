<?php

use Illuminate\Support\Facades\DB;
use App\Company;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Employee');

        $companies = Company::all()->pluck('id')->toArray();

        for ($i = 0; $i < 500; $i++) {
            $companyId = $faker->randomElement($companies);

            DB::table('employees')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'company_id' => $companyId,
                'phone' => $faker->phoneNumber,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
