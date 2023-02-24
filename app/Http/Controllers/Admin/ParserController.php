<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use Illuminate\Http\Request;
use App\Services\Contracts\Parser;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $urls = [
        'https://news.rambler.ru/rss/tech',
        'https://news.rambler.ru/rss/starlife',
        'https://news.rambler.ru/rss/games',
        'https://news.rambler.ru/rss/politics',
        'https://news.rambler.ru/rss/community',
    ];

    foreach($urls as $url) {
        \dispatch(new JobNewsParsing($url));
    }
    return "Parsing complited";
       // $load = $parser->setLink("https://mytaganrog.com/news-yandex.xml")->getParseData();

    }
}
