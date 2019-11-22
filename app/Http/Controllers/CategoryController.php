<?php

namespace App\Http\Controllers;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryService::allCategories();
        return response()->json($categories);
    }
}
