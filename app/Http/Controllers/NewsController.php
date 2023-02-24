<?php
declare (strict_types = 1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QueryBuilders\NewsQueryBuilder;
use App\Models\News;

class NewsController extends Controller
{
    use NewsTrait;

     /**
     * Display a listing of the resource.
     *
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return View
     */

    public function index(NewsQueryBuilder $newsQueryBuilder)
    {
        return \view('news.index', [
            'newsList' => $newsQueryBuilder->getNewsWithPagination(),
        ]);
    }

    public function show(News $news)
    {
        return \view('news.show', [
            'news' => $news
        ]);

    }
}
