<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;

class CustomLog extends Activity
{
    public function logStatus()
    {
        return $this->hasMany(StatusLog::class, 'logId', 'id');
    }

    public function userLog()
    {
        return $this->belongsToMany(User::class, 'status_logs', 'logId', 'userId');
    }

    public function userStatus()
    {
        // return $this->logStatus->where('userId', auth()->user()->id)->where('status', '0');
        return $this->logStatus()->status();
    }

    public function userNotif()
    {
        return $this->logStatus()->notif();
    }

    public function bookings()
    {
        return $this->belongsTo(Booking::class, 'subject_id', 'id');
    }

    // public function getFullNameBookingAttribute()
    // {
    //     return $this->booking->name;
    // }
}
