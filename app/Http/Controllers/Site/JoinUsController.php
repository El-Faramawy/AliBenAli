<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplyJobRequest;
use App\Http\Requests\ContactRequest;
use App\Models\ApplyOrder;
use App\Models\JoinUs;
use App\Models\JoinUsDetails;
use App\Traits\DashboardTrait;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class JoinUsController extends Controller
{
    use PhotoTrait;
    public function index(){
        $join_us_details=JoinUsDetails::all();
        $join_us=JoinUs::all()->first();
        return view('Site/hire' , compact('join_us' , 'join_us_details'));
    }


    public function store(ApplyJobRequest $request )
    {
        try {
            $file_name = $this->renameAndSavePhoto($request->image, "Site/image");
            $apply_job=new ApplyOrder();
            $apply_job->image=$file_name;
            $apply_job->job_name=$request->get('job_name');
            $apply_job->name=$request->get('name');
            $apply_job->email=$request->get('email');
            $apply_job->phone=$request->get('phone');
            $apply_job->experience=$request->get('exp');
            $apply_job->work_address=$request->get('present_job');
            $apply_job->message=$request->get('massage');
            $apply_job->details_id =$request->id;
            $apply_job->save();
            Session::flash('massage', 'good');
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>'failed']);
        }
    }


}
