<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    //public $fillable = ['title', 'body']; Указываем поля которые можно заполнять массивом
    public $guarded = []; //Поля которые защищены от заполнения массивом

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function scopeIncompleted($query)
    {
        return $query->where('completed', 0);
    }
}
