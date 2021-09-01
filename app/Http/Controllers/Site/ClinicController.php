<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClinicController extends Controller
{
    public function index(Request $request){
        $clinics = Clinic::all();
        return view('Site/clinic',compact('clinics'));

    }



}
