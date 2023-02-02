<?php
declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('news_source')->insert($this->getNewsSource());
    }

    public function getNewsSource(): array
    {
        $data = [];
        for($i = 0; $i < 10; $i++) {
            $data[] =
            [
                'news_id' => \fake()->numberBetween(1, 10),
                'name' => \fake()->lastName(),
                'url' => \fake()->url(),
            ];
        }
        return $data;
    }
}
