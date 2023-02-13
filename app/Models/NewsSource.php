<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsSource extends Model
{
    use HasFactory;

    protected $table = 'news_source';

    protected $fillable = [      // указываем поля котоые нужно заполнять
        'news_id',
        'name',
        'url',
    ];
    public $timestamps = false;

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }
}
