<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Content::truncate();

        Content::create([
            'content' => 'ドットインストール',
            'color_code' => '#A3E0FF',
        ]);
        Content::create([
            'content' => 'N予備校',
            'color_code' => '#72CDFA',
        ]);
        Content::create([
            'content' => 'POSSE課題',
            'color_code' => '#3184AD',
        ]);
    }
}
