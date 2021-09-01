<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorHour extends Model
{
    protected $guarded = [];

    protected $appends = ['phone_hour','period'];

    public function getPhoneHourAttribute()
    {
        return date('g:i',strtotime($this->hour));
    }

    public function getPeriodAttribute()
    {
        if (language() == 'en') {
            return date('A', strtotime($this->hour));
        } else {
            if (date('A', strtotime($this->hour)) == 'PM') {
                return   'م';
               } else {
                return  'ص';
                   }
        }
//        return language() == 'ar' ? 'ص' : 'م';
    }

}
