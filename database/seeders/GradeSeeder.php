<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Grade;
use App\Models\Candidate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::truncate();
        $grades = [
            ["name" => "Assistant Manager",  "created_by" => 1, "updated_by" => 1],
            ["name" => "Assistant Vice President",  "created_by" => 1, "updated_by" => 1],
            ["name" => "Associate Vice President",  "created_by" => 1, "updated_by" => 1],
            ["name" => "Chief Manager",  "created_by" => 1, "updated_by" => 1],
            ["name" => "CXO",  "created_by" => 1, "updated_by" => 1],
            ["name" => "Deputy Manager",  "created_by" => 1, "updated_by" => 1],
            ["name" => "Executive Secretary",  "created_by" => 1, "updated_by" => 1],
            ["name" => "Graduate Trainee",  "created_by" => 1, "updated_by" => 1],
            ["name" => "Management Trainee",  "created_by" => 1, "updated_by" => 1],
            ["name" => "Manager",  "created_by" => 1, "updated_by" => 1],
            ["name" => "Manager Director & CEO",  "created_by" => 1, "updated_by" => 1],
            ["name" => "Officer",  "created_by" => 1, "updated_by" => 1],
            ["name" => "Retainer",  "created_by" => 1, "updated_by" => 1],
            ["name" => "Senior Manager",  "created_by" => 1, "updated_by" => 1],
            ["name" => "Senior Officer",  "created_by" => 1, "updated_by" => 1],
            ["name" => "Senior Vice President",  "created_by" => 1, "updated_by" => 1],
            ["name" => "Vice President",  "created_by" => 1, "updated_by" => 1],
        ];
        foreach ($grades as $grade) {
            Grade::create($grade);
        }

        // Candidate::truncate();
        $faker = \Faker\Factory::create();
        $data = [];
        foreach (range(1, 10000) as $index) {
            $data[] = [
                'client_ref_id' => $faker->numberBetween(),
                'employee_id' => $faker->numberBetween(),
                'sf_ref_no' => $faker->numerify('S-REF-######'),
                'name' => $faker->unique()->name,
                'father_name' => $faker->unique()->name,
                'gender' => $faker->randomElement(['female', 'male', 'other']),
                'zone' => $faker->randomElement(['North', 'South', 'East', 'West']),
                'business_unit' => $faker->realText(10),
                'grade' => collect(Grade::all()->modelKeys())->random(),
                'dob' => $faker->date('j, M Y'),
                'doj' => $faker->date('j, M Y'),
                'email' => $faker->unique()->safeEmail(),
                'mobile' => $faker->regexify('[0-9]{10}'),
                'passport_no' =>  $faker->regexify('[0-9]{10}'),
                'pancard_no' =>  $faker->regexify('[0-9]{10}'),
                'aadharcard_no' =>  $faker->regexify('[0-9]{10}'),
                'created_dt' => $faker->dateTimeThisYear(),
                'created_by' => 1,
                'updated_by' => 1,
                'updated_dt' => $faker->dateTimeThisYear(),
            ];
        }
        $chunks = array_chunk($data, 2000);
        foreach ($chunks as $chunk) {
            Candidate::insert($chunk);
        }
    }
}
