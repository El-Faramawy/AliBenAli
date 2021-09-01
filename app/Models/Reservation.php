<?php

namespace App\Models;

use App\Admin;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = [];
    public function doctor(){
        return $this->hasOne(Admin::class,'id','doctor_id');
    }
    public function offer(){
        return $this->hasOne(Offer::class,'id','offer_id');
    }
    public function date(){
        return $this->hasOne(DoctorDate::class,'id','date_id');
    }
    public function hour(){
        return $this->hasOne(DoctorHour::class,'id','hour_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
//    public function disease(){
//        return $this->hasMany(Disease::class,'id','disease_id');
//    }
    public function reservation_diseases(){
        return $this->hasMany(ReservationDiseases::class,'reservation_id');
    }
    public function files(){
        return $this->hasMany(ReservationFiles::class,'reservation_id');
    }
    public function reports(){
        return $this->hasMany(ReservationReports::class,'reservation_id','id');
    }
    protected $appends = ['can_deleted','can_canceled','can_updated'];

    public function getCanDeletedAttribute()
    {
        if ($this->status != 'refused' && ( $this->date > date('Y-m-d') ||($this->date == date('Y-m-d')&&$this->hour >= date('h:i:s') ))) {
            return 'no';
        }else{
            return 'yes';
        }
    }
    public function getCanCanceledAttribute()
    {
        if ($this->is_deleted == 'no' && $this->status == 'new' && ($this->date > date('Y-m-d') ||($this->date == date('Y-m-d')&&$this->hour >= date('h:i:s') ))) {
            return 'yes';
        }else{
            return 'no';
        }
    }
    public function getCanUpdatedAttribute()
    {
        if (in_array($this->status ,['new','accepted']) && $this->is_deleted == 'no' && $this->date > date('Y-m-d') ) {
            return 'yes';
        }else{
            return 'no';
        }
    }

}
