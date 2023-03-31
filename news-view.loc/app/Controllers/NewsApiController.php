<?php

namespace App\Controllers;

class NewsApiController extends BaseController
{
    public function getCount($language, $count, $categoryName)
    {
      // Get content from API server
      $data =  file_get_contents("http://news-api.loc/api/v1/language/$language/news/count/$count/category/$categoryName");

      return $data;
    }

    public function getByTitle($language, $title)
    {
        $data =  file_get_contents("http://news-api.loc/api/v1/language/$language/news/title/$title");

        return $data;
    }

}
