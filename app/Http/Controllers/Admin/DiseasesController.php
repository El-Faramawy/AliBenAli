<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiseaserRequest;
use App\Models\Disease;
use Illuminate\Http\Request;

class DiseasesController extends Controller
{
    public function index()
    {
        $show_diseases=Disease::all();
        return view('Admin/diseases/diseases' , compact('show_diseases'));
    }
    public function create(DiseaserRequest $request){
        try {
            $add_news=new Disease();
            $add_news->title_ar=$request->get('title_ar');
            $add_news->title_en=$request->get('title_en');
            $add_news->save();
            toastr()->success('تم اضافه بيانات المرض ');
            return back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }


    }
    public function update(DiseaserRequest $request)
    {
        try {
                $edit_news = Disease::findOrFail($request->id);
            // update
            $edit_news->update([
                'title_ar'    => $request->title_ar,
                'title_en'    => $request->title_en,
            ]);
            toastr()->success('تم تحديث بيانات المرض بنجاح');
            return back();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }
    public function destroy(request $request){
        Disease::findOrFail($request->id)->delete();
        toastr()->success('تم حذف المرض بنجاح');
        return back();
    }
    public function deleteAll(){
        Disease::query()->delete();
        toastr()->success('تم حذف جميع الامراض بنجاح');
        return back();
    }


}
