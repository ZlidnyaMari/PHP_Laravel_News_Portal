<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsSource;
use App\QueryBuilders\NewsSourceQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\QueryBuilders\NewsQueryBuilder;

class NewsSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param NewsSourceQueryBuilder $newsSourceQueryBuilder
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return View
     */
    public function index (
        NewsSourceQueryBuilder $newsSourceQueryBuilder,
        NewsQueryBuilder $newsQueryBuilder
        ): View {
        return \view('admin.source.index', [
            'sourceList' => $newsSourceQueryBuilder->getAll(),
            'newsList' => $newsQueryBuilder->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return View
     */
    public function create(NewsQueryBuilder $newsQueryBuilder): View
    {
        return \view('admin.source.create',[
            'newsList' => $newsQueryBuilder->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required'
        ]);

        $source = new NewsSource($request->input());

        if ($source->save()) {
            return \redirect()->route('admin.source.index')->with('succses', 'новость добавлена');
        }
        return \back()->with('error', 'не удалось сохранить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  NewsSource $source
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return View
     */
    public function edit(NewsSource $source, NewsQueryBuilder $newsQueryBuilder)
    {
        return \view('admin.source.edit',[
        'source' => $source,
        'newsList' => $newsQueryBuilder->getAll(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  NewsSource $source
     * @param  News $news
     * @return RedirectResponse
     */
    public function update(Request $request, NewsSource $source, News $news): RedirectResponse
    {
        $source = $source->fill($request->input());

        if ($source->save()) {

            $news->source()->$request->input('news_ids');

            return \redirect()->route('admin.source.index')->with('succses', 'новость обновлена');
        }
            return \back()->with('error', 'не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
