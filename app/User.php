<?php

namespace App;

use App\Models\Ads;
use App\Models\Jop;
use App\Models\Package;
use App\Models\PreviousAds;
use App\Models\Rating;
use App\Models\Reservation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    public function last_reservation(){
//        return $this->hasMany(Reservation::class,'user_id');
//            ->where('status','ended')
//            ->whereHas('date',function ($query){
//                $query->orderBy('date','DESC');
//            });
//    }


}
