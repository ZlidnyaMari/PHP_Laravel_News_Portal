<?php
declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\News;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class NewsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = News::query();
    }

    public function getNewsByStatus(string $status): Collection
    {
        return $this->model->where('status', $status)->get();
    }

    public function getNewsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('categories')->paginate($quantity);
    }

    public function getNewsSource()
    {
        return $this->model->with('source');
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }
}
