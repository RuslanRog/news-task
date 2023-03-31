<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\NewsModel;

class NewsController extends BaseController
{
    // Showing some count of news from by category key.
    // http://news-api.loc/api/v1/language/en/news/count/2/category/Football/
    // http://news-api.loc/api/v1/language/ua/news/count/2/category/Футбол
    public function getCount($language, $count, $categoryName)
    {
        // Get category id from name
        $category = CategoryModel::where('category_name_' . $language, $categoryName)->first();
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        // Get data from News
        $news = NewsModel::select('title_' . $language, 'description_' . $language)
            ->where('category_id', $category->id)
            ->orderBy('created_at', 'desc')
            ->take($count)
            ->get();

        $newsArr = @json_decode(json_encode($news), true);

        return json_encode($newsArr, JSON_UNESCAPED_UNICODE);
    }

// Searching news by title-name from category
// http://news-api.loc/api/v1/language/en/news/title/Bethem news today
// http://news-api.loc/api/v1/language/ua/news/title/Новини про Бетхема
    public function getByTitle($language, $title)
    {
        // Search by title is News table
        $news = NewsModel::select('title_' . $language, 'description_' . $language)
            ->where('title_' . $language, $title)
            ->orderBy('created_at', 'desc')
            ->get();

        $newsArr = @json_decode(json_encode($news), true);

        return json_encode($newsArr, JSON_UNESCAPED_UNICODE);
    }

}

