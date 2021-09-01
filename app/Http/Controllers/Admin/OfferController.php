<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutInfo;
use App\Http\Requests\StoreAboutUS;
use App\Http\Requests\StoreOfferRequest;
use App\Models\Clinic;
use App\Models\DoctorDate;
use App\Models\DoctorHour;
use App\Models\Offer;
use App\Models\OfferSlider;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    use PhotoTrait;
    public function index(){
        $offers  = Offer::all();
        $sliders =  OfferSlider::all();
        return view('Admin/offers/index',compact('offers','sliders'));
    }

    public function delete(request $request){
        Offer::where('id',$request->id)->delete();
        OfferSlider::where('offer_id',$request->id)->delete();
        toastr()->success('تم حذف العرض بنجاح');
        return back();
    }

    public function add(){
        $clinics = Clinic::all();
        return view('Admin/offers/add',compact('clinics'));
    }

    public function create(StoreOfferRequest $request){
        try {
            $offer = new Offer();
            $offer->title_ar   = $request->title_ar;
            $offer->title_en   = $request->title_en;
            $offer->details_ar = $request->details_ar;
            $offer->details_en = $request->details_en;
            $offer->old_price  = $request->old_price;
            $offer->offer      = $request->offer;
            $offer->new_price  = $request->new_price;
            $offer->clinic_id  = $request->clinic_id;
            $offer->save();
            foreach($request->date as $date){
                DoctorDate::create([
                    'offer_id' => $offer->id,
                    'date'     => $date,
                ]);
            }
            if ($request->has('image')) {
                foreach ($request->image as $image) {
                    $file_name = $this->saveImage($image, 'uploads/offers');
                    OfferSlider::create([
                        'offer_id' => $offer->id,
                        'image'    => 'uploads/offers/' . $file_name,
                    ]);
                }
            }
            else{
                toastr()->error('يرجي رفع صورة او اكثر');
            }
            toastr()->success('تم اضافة عرض جديد بنجاح');
            return redirect()->route('admin.offers');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }
        public function edit($id){
        $offer   = Offer::findOrFail($id);
        $clinics = Clinic::all();
        return view('Admin/offers/edit',compact('clinics','offer'));
    }

    public function update(StoreOfferRequest $request)
    {
        try {
            $offer = Offer::findOrFail($request->id);
            $offer->update([
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'details_ar' => $request->details_ar,
                'details_en' => $request->details_en,
                'old_price' => $request->old_price,
                'offer' => $request->offer,
                'new_price' => $request->new_price,
                'clinic_id' => $request->clinic_id,
            ]);
            $offer->save();
            if ($request->has('image')) {
                OfferSlider::where('offer_id', $request->id)->delete();
                foreach ($request->image as $image) {
                    $file_name = $this->saveImage($image, 'uploads/offers');
                    OfferSlider::create([
                        'offer_id' => $request->id,
                        'image' => 'uploads/offers/' . $file_name,
                    ]);
                }
            }
            toastr()->success('تم تحديث العرض بنجاح');
            return redirect()->route('admin.offers');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function offerDate($id){
        $offer = Offer::where('id',$id)->first();
        $dates  =  $offer->date;
        return view('Admin.offers.dates',compact('offer','dates'));
    }

    public function cancel_day(request $request){
        try {
            $date = DoctorDate::where('id', $request->id)->first();
            $date->offer_id = null;
            $date->save();
            toastr()->success('تم الغاء اليوم من العرض');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    public function cancel_hour(request $request){
        if($request->hour_id == ''){
            toastr()->error('يرجي تحديد الساعة بشكل صحيح');
            return back();
        }
        DoctorHour::where('id',$request->hour_id)->delete();
        toastr()->success('تم الغاء الساعة من العرض');
        return back();
    }

    public function add_hour(request $request){
        if($request->has('hours')){
            foreach ($request->hours as $hour) {
                DoctorHour::create([
                    'date_id'     => $request->id,
                    'is_reserved' => 'no',
                    'hour'        => $hour,
                ]);
            }
            toastr()->success('تم الاضافة بنجاح');
            return back();
        }
        else{
            toastr()->error('يرجي اختيار ساعة او اكثر');
        }

    }
}
