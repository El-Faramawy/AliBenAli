<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApplyJobRequest;
use App\Http\Requests\MedicalNewsRequest;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use App\Traits\DashboardTrait;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function index()
    {
        $show_news=News::all();
        return view('Admin/media_center/news' , compact('show_news'));
    }
    public function create(MedicalNewsRequest $request){
        try {
            $current_time_month = Carbon::now()->monthName;
            $file_extension = $request -> image -> getClientOriginalExtension();
            $file_name = time(). '.' . $file_extension;
            $path='uploads/media_center/news/';
            $request->image->move($path , $file_name);
            $add_news=new News;
            $add_news->image=$path .$file_name ??null;
            $add_news->title_ar=$request->get('title_ar');
            $add_news->title_en=$request->get('title_en');
            $add_news->content_ar=$request->get('content_ar');
            $add_news->content_en=$request->get('content_en');
            $add_news->date= $current_time_month;
            $add_news->save();
//            $validated = $request->validated();
//            toastr()->success('تم اضافه بيانات الخبر ');
            return back();


        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }


    }
    public function update(MedicalNewsRequest $request)
    {
        try {
            $current_time_month = Carbon::now()->monthName;

            $edit_news = News::findOrFail($request->id);

            if ($request->has('image')) {
                $file_extension = $request -> image -> getClientOriginalExtension();
                $file_name = time(). '.' . $file_extension;
                $path='Site/img';
                $request->image->move($path , $file_name);
                $edit_news->update([
                    'image' => $file_name,
                ]);
            }



            // update
            $edit_news->update([
                'title_ar'    => $request->title_ar,
                'title_en'    => $request->title_en,
                'content_ar'  => $request->content_ar,
                'content_en'  => $request->content_en,
                'date'        => $current_time_month,
            ]);
//            toastr()->success('تم تحديث المنتج بنجاح');
            return back();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }
    public function destroy(request $request){
        News::findOrFail($request->id)->delete();
//        toastr()->success('تم حذف الاعلان بنجاح');
        return back();
    }
    public function deleteAll(){
        News::truncate();
//        toastr()->success('تم حذف جميع الاعلانات بنجاح');
        return back();
    }


}
