<?php

namespace App\Models;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    public function doctor(){
        return $this->hasMany(Admin::class,'clinic_id');
    }
    protected $guarded = [];

        protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->{"name_".language()};
    }


}
