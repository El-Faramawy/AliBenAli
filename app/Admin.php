<?php

namespace App;

use App\Models\Clinic;
use App\Models\Country;
use App\Models\Cv;
use App\Models\DoctorDate;
use App\Models\Rate;
use App\Models\Reservation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];


    private $guard= 'admins';
    protected $table='admins';
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];


    public function country(){
        return $this->hasOne(Country::class,'id','country_id');
    }
    public function clinic(){
        return $this->hasOne(Clinic::class,'id','clinic_id');
    }
    public function cv(){
        return $this->hasMany(Cv::class,'doctor_id','id');
    }
    public function date(){
        return $this->hasMany(DoctorDate::class,'doctor_id','id');
    }
    public function available_date(){
        return $this->hasMany(DoctorDate::class,'doctor_id','id')
            ->where([['date','>=',date('Y-m-d')],['is_reserved','=','no']])
            ->whereHas('hour',function ($query){
                $query->where([['hour','>=',date('h:i:s')],['is_reserved','=','no']]);
            });
    }
    public function reservation(){
        return $this->hasMany(Reservation::class,'doctor_id','id');
    }
    public function rates(){
        return $this->hasMany(Rate::class,'doctor_id');
    }
    protected $appends = ['name','category'];

    public function getNameAttribute()
    {
        return $this->{"name_".language()};
    }
    public function getCategoryAttribute()
    {
        return $this->{"category_".language()};
    }
}//end fun
