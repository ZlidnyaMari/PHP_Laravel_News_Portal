<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsSource\CreateRequest;
use App\Http\Requests\NewsSource\EditRequest;
use App\Models\News;
use App\Models\NewsSource;
use App\QueryBuilders\NewsSourceQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

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
     * @param  CreateRequest  $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $source = NewsSource::create($request->validated());

        if ($source) {
            return \redirect()->route('admin.source.index')->with('succses', __('messages.source.create.sucсess'));
        }
        return \back()->with('error', __('messages.source.create.fail'));
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
     * @param  EditRequest  $request
     * @param  NewsSource $source
     * @param  News $news
     * @return RedirectResponse
     */
    public function update(EditRequest $request, NewsSource $source, News $news): RedirectResponse
    {
        $source = $source->fill($request->validated());

        if ($source) {

           // $source->news()  ($request->getNewsId());

            return \redirect()->route('admin.source.index')->with('succses', __('messages.source.edit.sucсess'));
        }
            return \back()->with('error', __('messages.source.edit.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  NewsSource $source
     * @return JsonResponse
     */
    public function destroy(NewsSource $source): JsonResponse
    {
        try{
            $source->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
