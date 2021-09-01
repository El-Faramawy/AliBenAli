<?php

namespace App\Models;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class OfferSlider extends Model
{
    protected $guarded = [];
    protected $table = 'offer_slider';

    public function sliders(){
        return $this->belongsTo(Offer::class,'offer_id');
    }

}
