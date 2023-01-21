<?php
declare(strict_types = 1);
namespace App\Http\Controllers;

trait CategoryTrait
{
    public function getCategory($id = null) 
    {
        $categoryNews = [];
        $quantityCategoryNews = 5;

        if ($id === null) {
            for($i = 1; $i < $quantityCategoryNews; $i++) {
                $categoryNews[$i] = [
                    'id' => $i,
                    'name' =>  \fake()->text(10),
                ];
            }
            return $categoryNews;
        }
        return [
            'id' => $id,
            'name' =>  \fake()->text(10),
        ];
    }
}
