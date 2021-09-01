<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MobileSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function slider(){
        $slider = MobileSlider::all();
        return response()->json(['data'=>$slider , 'message' => '', 'code' => 200], '200');
    }

}
