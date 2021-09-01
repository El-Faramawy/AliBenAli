<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ReservationReports extends Model
{
    protected $guarded = [];
    protected $table = 'reservation_reports';

    public function reservation(){
        return $this->belongsTo(Reservation::class,'reservation_id','id');
    }
}
