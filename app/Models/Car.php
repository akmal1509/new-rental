<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use Sluggable, HasFactory, SoftDeletes;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */

    // protected $with = ['brands', 'users'];
    // protected $table = 'cars';
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'name',
    //     'slug',
    //     'capacity',
    //     'year',
    //     'price',
    //     'brandId',
    //     'userId',
    //     'image',
    //     'isActive'
    // ];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ],
        ];
    }


    public function locations()
    {
        return $this->belongsToMany(Location::class, 'location_cars', 'carId', 'locationId');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function getLocationAttribute()
    {
        $numItems = count($this->locations);
        $i = 0;
        foreach ($this->locations as $location) {
            echo $location->name;
            if (++$i !== $numItems) {
                echo ", ";
            };
        };
        return;
    }

    public function getHalfBodyAttribute()
    {
        return Str::words($this->body, 70, ' ...');
    }

    public function getLocationIdAttribute()
    {
        return $this->locations->pluck('id')->toArray();
    }
}
