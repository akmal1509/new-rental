<?php

namespace App\Models;

use App\Scopes\RoleScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new RoleScope);
    }
}
