<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('Admin/contact/index',compact('contacts'));
    }

    public function delete_one(request $request): \Illuminate\Http\RedirectResponse
    {
        Contact::findOrFail($request->id)->delete();
        toastr()->success('تم حذف الرسالة بنجاح');
        return back();
    }

    public function delete_all(): \Illuminate\Http\RedirectResponse
    {
        Contact::truncate();
        toastr()->success('تم حذف كل الرسائل بنجاح');
        return back();
    }


}
