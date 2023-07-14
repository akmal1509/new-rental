<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentCar extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'rentals';
    protected $guarded = ['id'];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'rentalId', 'id');
    }

    public function getTotalPaymentAttribute()
    {
        return $this->payments->sum('price');
    }

    public function getPercentPaymentAttribute()
    {
        $price = $this->price;
        $total = $this->totalPayment;

        return $total * 100 / $price;
    }
    public function getRemainingPaymentAttribute()
    {
        $price = $this->price;
        $total = $this->totalPayment;

        return $price - $total;
    }
}
