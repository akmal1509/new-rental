<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, Sluggable, SoftDeletes;
    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ],
        ];
    }

    public function categories()
    {
        return $this->belongsTo(BlogCategory::class, 'categoryId', 'id');
    }

    public function getCategoryNameAttribute()
    {
        return $this->categories->name;
    }
}
