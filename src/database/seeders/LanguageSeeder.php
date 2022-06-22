<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::truncate();

        Language::create([
            'language' => 'HTML',
            'color_code' => '#59DEEB',
        ]);
        Language::create([
            'language' => 'CSS',
            'color_code' => '#49BCF2',
        ]);
        Language::create([
            'language' => 'JavaScript',
            'color_code' => '#4D8DDB',
        ]);
        Language::create([
            'language' => 'PHP',
            'color_code' => '#496EF2',
        ]);
        Language::create([
            'language' => 'Laravel',
            'color_code' => '#4F4DEB',
        ]);
        Language::create([
            'language' => 'SQL',
            'color_code' => '#633BD4',
        ]);
        Language::create([
            'language' => 'SHELL',
            'color_code' => '#A34DF8',
        ]);
        Language::create([
            'language' => '情報システム基礎知識(その他)',
            'color_code' => '#B63AE0',
        ]);
    }
}
