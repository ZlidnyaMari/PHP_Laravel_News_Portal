<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews(): Collection
    {
        return DB::table($this->table)->get();
        //return DB::select("select id, title, author, status, description, created_at from {$this->table}");
    }

    public function getNewsById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
        // return DB::selectOne(
        //     "select id, title, author, status, description, created_at from {$this->table} where id = :id", [
        //         'id' => $id,
        //     ]);
    }
}
