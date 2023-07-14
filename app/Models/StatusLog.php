<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusLog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeStatus(Builder $query)
    {
        if (\Auth::hasUser()) {
            $query->where('userId', auth()->user()->id)->where('status', '1');
        }
    }
    public function scopeNotif(Builder $query)
    {
        if (\Auth::hasUser()) {
            $query->where('userId', auth()->user()->id)->where('notif', '1');
        }
    }

    public function log()
    {
        return $this->belongsTo(CustomLog::class, 'logId', 'id');
    }
}
