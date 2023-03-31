<?php

namespace App\Controllers;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function index()
    {
        // return view('welcome_message');
        $data = CategoryModel::all();
        var_dump($data);
    }

    public function getCategoryId($categoryName)
    {
        $category = CategoryModel::where('category_name_en', $categoryName)->first();
//        var_dump($category->id);
        if ($category) {
            return $category->id;
        } else {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }
}
