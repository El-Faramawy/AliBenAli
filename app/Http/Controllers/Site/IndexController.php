<?php

namespace App\Http\Controllers\Site;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\FooterContactRequest;
use App\Models\Clinic;
use App\Models\Contact;
use App\Models\Counter;
use App\Models\Image;
use App\Models\News;
use App\Models\SecondSection;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index(Request $request){
    

    
     $show_sliders=Slider::all();
        $secound_section=SecondSection::first();
        $clinics=Clinic::all();
        $teb_images=Image::inRandomOrder()->limit(4)->get();
        $teb_videos=Video::inRandomOrder()->limit(2)->get();
        $teb_news=News::all()->take(3);
        $counters=Counter::inRandomOrder()->limit(4)->get();
        $doctors =Admin::where('type','doctor')->get();
        if ($request->ajax()){
            if ($request->clinic_id != 'all')
                $doctors =Admin::where(['type'=>'doctor','clinic_id'=>$request->clinic_id])->get();
            $HtmlView =view('Site/parts/doctor-search',['doctors'=>$doctors,'clinics'=>$clinics])->render();
            return response()->json(['html_here'=>$HtmlView],200);
        }
         return view('Site/index' , compact('show_sliders' ,'counters','teb_news','teb_videos', 'secound_section' , 'clinics' , 'teb_images') , ['doctors'=>$doctors,'clinics'=>$clinics,'clinic_'=>'']);
    }


    public function footer_massages(FooterContactRequest $request){
        try {
            $add_footer_contact=new Contact();
            $add_footer_contact->name=$request->get('footer_name');
            $add_footer_contact->email=$request->get('footer_email');
            $add_footer_contact->message=$request->get('footer_massage');
            $add_footer_contact->save();
            Session::flash('massage', 'good');
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>'failed']);
        }

    }



    public function search_by_clinic($id){
        $clinic = Clinic::where('id',$id)->first();
        $clinics = Clinic::all();
        $doctors =Admin::where(['type'=>'doctor','clinic_id'=>$id])->get();
        return view('Site/index',['doctors'=>$doctors,'clinics'=>$clinics,'clinic_'=>$clinic]);
    }//end fun


}
