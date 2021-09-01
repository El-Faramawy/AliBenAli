<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $show_countries=Country::all();
        return view('Admin/Country/index' , compact('show_countries'));
    }

    public function create(CountryRequest $request){
        try {
            $file_extension = $request -> image -> getClientOriginalExtension();
            $file_name = time(). '.' . $file_extension;
            $path='uploads/Countries/';
            $request->image->move($path , $file_name);
            $add_country=new Country();
            $add_country->name_ar=$request->name_ar;
            $add_country->name_en=$request->name_en;
            $add_country->image=$path .$file_name;
            $add_country->save();

//            $validated = $request->validated();
//            toastr()->success('تم اضافه الصوره ');
            return back();


        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }



    }
    public function destroy(request $request){

        Country::findOrFail($request->id)->delete();
//        toastr()->success('تم حذف الجنسية بنجاح');
        return back();
    }

    public function deleteAll(){
        Country::query()->delete();
//        toastr()->success('تم حذف جميع الجنسيات بنجاح');
        return back();
    }


}
