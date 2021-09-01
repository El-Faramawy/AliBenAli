<?php

namespace App\Models;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $guarded = [];
    protected $table = 'offers';

    public function clinic(){
        return $this->belongsTo(Clinic::class,'clinic_id');
    }
    public function images(){
        return $this->hasMany(OfferSlider::class,'offer_id');
    }
    public function first_image(){
        return $this->hasOne(OfferSlider::class,'offer_id');
    }

    public function date(){
        return $this->hasMany(DoctorDate::class,'offer_id','id');
    }
    public function available_date(){
        return $this->hasMany(DoctorDate::class,'offer_id','id')
            ->where([['date','>=',date('Y-m-d')],['is_reserved','=','no']])
            ->whereHas('hour',function ($query){
                $query->where([['hour','>=',date('h:i:s')],['is_reserved','=','no']]);
            });
    }
    public function reservation(){
        return $this->hasMany(Reservation::class,'offer_id','id');
    }
    public function rates(){
        return $this->hasMany(Rate::class,'offer_id');
    }

    protected $appends = ['title','details'];

    public function getTitleAttribute()
    {
        return $this->{"title_".language()};
    }
    public function getDetailsAttribute()
    {
        return $this->{"details_".language()};
    }


}
