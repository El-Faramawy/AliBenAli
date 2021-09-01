<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class FamousController extends Controller
{
    public function index(){
        $famous_list = User::where('type','famous')->get();
        return view('Admin.famous.all',compact('famous_list'));
    }
}
