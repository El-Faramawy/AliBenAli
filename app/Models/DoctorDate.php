<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorDate extends Model
{
    protected $guarded = [];

    public function hour(){
        return $this->hasMany(DoctorHour::class,'date_id','id');
    }
    public function available_hour(){
        return $this->hasMany(DoctorHour::class,'date_id','id')
            ->where([['hour','>=',date('h:i:s')],['is_reserved','=','no']]);
    }

    protected $appends = ['day_number','day_text','month'];

    public function getMonthAttribute()
    {
        return language()=='ar'?ArabicDate($this->date)['month']:date('F',strtotime($this->date));
    }
    public function getDayTextAttribute()
    {
        return language()=='ar'?ArabicDate($this->date)['ar_day']:date('l',strtotime($this->date));
    }
    public function getDayNumberAttribute()
    {
        return date('d',strtotime($this->date));
    }

}
