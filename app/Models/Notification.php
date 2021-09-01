<?php

namespace App\Models;

use App\Admin;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function doctor(){
        return $this->belongsTo(Admin::class,'doctor_id');
    }
    public function reservation(){
        return $this->belongsTo(Reservation::class,'reservation_id');
    }

    protected $appends = ['title','message'];

    public function getTitleAttribute()
    {
        return $this->{"title_".language()};
    }
    public function getMessageAttribute()
    {
        return $this->{"message_".language()};
    }

}
