<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarLisence extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'lisence_plates';
    protected $guarded = ['id'];

    public function cars()
    {
        return $this->belongsTo(Car::class, 'carId', 'id');
    }

    public function getCarNameAttribute()
    {
        return $this->cars->name;
    }

    public function getCarPriceAttribute()
    {
        return $this->cars->price;
    }
}
