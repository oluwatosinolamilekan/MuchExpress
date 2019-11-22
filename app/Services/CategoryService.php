<?php

namespace App\Services;
use App\Models\Category;

class CategoryService
{
    public static function allCategories()
    {
        $categories = Category::all();
        return $categories;
    }
}