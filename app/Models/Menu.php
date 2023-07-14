<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $guarded = ['id'];
    // protected $with = ['subMenus'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ],
        ];
    }

    public function subMenus()
    {
        return $this->hasMany(Menu::class, 'mainMenu')->orderBy('sort', 'asc');
    }
}
