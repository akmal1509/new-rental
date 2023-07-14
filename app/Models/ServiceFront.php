<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceFront extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'service_front';
    protected $guarded = ['id'];
}
