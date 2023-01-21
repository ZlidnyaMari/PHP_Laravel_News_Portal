<?php
declare (strict_types = 1);

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    use CategoryTrait;

    public function index() 
    {
        return \view('categories.index', [
            'categories' => $this->getCategory(),
        ]);
    }

    public function show(int $id) 
    {
        return $this->getCategory($id);
    }
}