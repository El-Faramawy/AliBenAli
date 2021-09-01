<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index(){
        $settings=Setting::first();
return view("Site/contact" , compact('settings'));

    }



    public function Contact_massage(ContactRequest $request){
        try {
            $add_footer_contact=new Contact();
            $add_footer_contact->name=$request->get('name');
            $add_footer_contact->email=$request->get('email');
            $add_footer_contact->message=$request->get('massage');
            $add_footer_contact->phone=$request->get('phone_number');
            $add_footer_contact->save();
            Session::flash('massage', 'good');
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>'failed']);
        }

    }





}
