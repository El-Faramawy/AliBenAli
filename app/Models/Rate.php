<?php

namespace App\Models;

use App\Admin;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $guarded = [];
    protected $table   = 'rates';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function doctor(){
        return $this->belongsTo(Admin::class,'doctor_id');
    }
    public function offer(){
        return $this->belongsTo(Offer::class,'offer_id');
    }

}
