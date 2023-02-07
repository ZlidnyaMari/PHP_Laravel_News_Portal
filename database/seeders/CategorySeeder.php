<?php
declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getCategory());
    }

    public function getCategory(): array
    {
        $data = [];
        for($i = 0; $i < 10; $i++) {
            $data[] =
            [
                'title' => \fake()->jobTitle(),
                'description' => \fake()->text(100),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $data;
    }
}
