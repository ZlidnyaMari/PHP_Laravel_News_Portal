<?php
declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\NewsSource;
use App\Models\News;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class NewsSourceQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = NewsSource::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }
}
