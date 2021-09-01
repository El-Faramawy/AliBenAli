<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplyOrder;
use Illuminate\Http\Request;

class ApplyJobController extends Controller
{
    public function index()
    {
        $show_Apply_jobs=ApplyOrder::all();
        return view('Admin/apply_job/index' , compact('show_Apply_jobs'));
    }


    public function destroy(request $request){
        ApplyOrder::findOrFail($request->id)->delete();
//        toastr()->success('تم حذف الصوره بنجاح');
        return back();
    }



}
