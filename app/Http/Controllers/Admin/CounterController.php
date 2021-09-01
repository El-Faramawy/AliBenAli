<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutInfo;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function index(){
        $counters = Counter::all();
        return view('Admin/counter/index',compact('counters'));
    }

    public function add(){
        return view('Admin/counter/add_counter');
    }

    public function create(StoreAboutInfo $request){
        try{
            $inputs = $request->all();
            Counter::create($inputs);
            toastr()->success('تم اضافة عداد جديد');
            return redirect()->route('Counter');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }

    public function update(StoreAboutInfo $request){
        return $request;
    }

    public function delete(request $request){
        Counter::findOrFail($request->id)->delete();
        toastr()->success('تم حذف العداد بنجاح');
        return back();
    }
}
