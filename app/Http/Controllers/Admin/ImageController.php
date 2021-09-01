<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicalImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $show_images=Image::all();
        return view('Admin/media_center/images' , compact('show_images'));
    }

    public function create(MedicalImageRequest $request){
        try {
            $file_extension = $request -> image -> getClientOriginalExtension();
            $file_name = time(). '.' . $file_extension;
            $path='uploads/media_center/image/';
            $request->image->move($path , $file_name);
            $add_image=new Image;
            $add_image->image=$path .$file_name;
            $add_image->save();

//            $validated = $request->validated();
//            toastr()->success('تم اضافه الصوره ');
            return back();


        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }


    }

    public function destroy(request $request){
        Image::findOrFail($request->id)->delete();
//        toastr()->success('تم حذف الصوره بنجاح');
        return back();
    }


}
