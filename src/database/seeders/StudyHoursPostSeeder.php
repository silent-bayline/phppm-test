<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudyHoursPost;
use Carbon\Carbon;

class StudyHoursPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = new Carbon(date('Y-m-d'));
        StudyHoursPost::truncate();

        StudyHoursPost::create([
            'user_id' => 2,
            'total_hour' => 2.5,
            'study_date' => $dt->addDay(),
        ]);

        StudyHoursPost::create([
            'user_id' => 1,
            'total_hour' => 4,
            'study_date' => $dt,
        ]);

        StudyHoursPost::create([
            'user_id' => 2,
            'total_hour' => 0.5,
            'study_date' => $dt->subDay(),
        ]);
    }
}
