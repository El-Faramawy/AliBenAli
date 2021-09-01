<?php

namespace App\Models;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class ReservationDiseases extends Model
{
    protected $guarded = [];
    protected $table = 'reservation_disease';

    public function diseases(){
        return $this->belongsTo(Disease::class,'disease_id');
    }
}
