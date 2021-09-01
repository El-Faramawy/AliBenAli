<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservationfile extends Model
{
    protected $guarded = [];
    protected $table ='reservation_files';
    protected $appends = ['getextention'];

    public function getextention(){
        $type = null;
        switch (['content-type']) {
            case "image/*":
                $type = "image";
                break;
            case "application/pdf":
                $type = "pdf";
                break;

        }
        return $type;
    }
}
