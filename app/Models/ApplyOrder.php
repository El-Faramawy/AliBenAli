<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplyOrder extends Model
{
    public function apply_order(){
        return $this->hasOne(JoinUsDetails::class,'id','details_id');
    }
    protected $guarded = [];

}
