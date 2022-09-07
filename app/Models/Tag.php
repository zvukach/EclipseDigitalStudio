<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class, 'tag_id', 'id');
    }
}
