<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TermsController extends Controller
{
  public function terms(){
      $data = url('terms#2');
      return response()->json(['data' => $data, 'code' => 200, 'message' => ''], 200);
  }
  public function about(){
      $data = url('terms#3');
      return response()->json(['data' => $data, 'code' => 200, 'message' => ''], 200);
  }
  public function contact(Request $request){
      $data = $request->all();
      $contact = Contact::create($data);
      return response()->json(['data' => $contact, 'code' => 200, 'message' => 'message sent successfully'], 200);
  }
}
