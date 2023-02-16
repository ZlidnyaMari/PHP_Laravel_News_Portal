<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [      // указываем поля котоые нужно заполнять
        'title',
        'author',
        'status',
        'image',
        'description',
    ];

    protected $casts = [
        'categories_id' => 'array',
    ];

    // protected $guarded = [     // указывам поля которые не нужно заполнять !!метод не безопасный, лучше не использовть
    //     'id',
    // ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_has_news',
            'news_id', 'category_id', 'id', 'id');
    }

    public function source()
    {
        return $this->hasMany(NewsSource::class);
    }


    // public function getNews(): Collection
    // {
    //     return DB::table($this->table)->get();
    //     //return DB::select("select id, title, author, status, description, created_at from {$this->table}");
    // }

    // public function getNewsById(int $id): mixed
    // {
    //     return DB::table($this->table)->find($id);
    //     // return DB::selectOne(
    //     //     "select id, title, author, status, description, created_at from {$this->table} where id = :id", [
    //     //         'id' => $id,
    //     //     ]);
    // }
}
