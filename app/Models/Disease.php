<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $guarded = [];
    protected $appends = ['title'];

    public function getTitleAttribute()
    {
        return $this->{"title_".language()};
    }
}
