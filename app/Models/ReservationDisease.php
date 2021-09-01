<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationDisease extends Model
{
    protected $guarded = [];
    protected $table ='reservation_disease';
    public function diseases(){
        return $this->belongsTo(Disease::class,'disease_id');
    }
}
