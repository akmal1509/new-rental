<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function rentals()
    {
        return $this->belongsTo(RentCar::class, 'rentalId', 'id');
    }

    public function getCustomerNameAttribute()
    {
        return $this->rentals->customerName;
    }
}
