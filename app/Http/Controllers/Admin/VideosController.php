<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicalVideosRequest;
use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function index()
    {
        $show_videos=Video::all();
        return view('Admin/media_center/videos' , compact('show_videos'));
    }

    public function create(MedicalVideosRequest $request){

        try {
            $file_extension = $request -> image -> getClientOriginalExtension();
            $file_name = time(). '.' . $file_extension;
            $path='uploads/media_center/videos/';
            $request->image->move($path , $file_name);
            $add_video=new Video;
            $add_video->link=$request->link;
            $add_video->image=$path .$file_name;
            $add_video->save();

//            $validated = $request->validated();
//            toastr()->success('تم اضافه الصوره ');
            return back();


        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }



    }

    public function update(MedicalVideosRequest $request)
    {
        try {

            $edit_news = Video::findOrFail($request->id);

            if ($request->has('image')) {
                $file_extension = $request -> image -> getClientOriginalExtension();
                $file_name = time(). '.' . $file_extension;
                $path='uploads/media_center/videos/';
                $request->image->move($path , $file_name);
                $edit_news->update([
                    'image' =>$path .$file_name,
                ]);
            }



            // update
            $edit_news->update([
                'link'    => $request->link,
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
        Video::findOrFail($request->id)->delete();
//        toastr()->success('تم حذف الصوره بنجاح');
        return back();
    }



}
