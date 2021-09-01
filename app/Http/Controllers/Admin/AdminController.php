<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    use PhotoTrait;
    public function get(){
        $get=Admin::where('type','admin')->get();
        return view('Admin/Admin/index',compact('get'));
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store_admin(Request $request){
        try {
            $valedator = Validator::make($request->all(), [
                'email' => ['unique:admins'],
            ]);
            if ($valedator->fails()) {
                return back()->with(notification('هذا البريد الالكترونى موجود مسبقا', 'error'));
            }
            $new = new Admin();
            if($request->has('image')) {
                $file = $this->saveImage($request->image, 'uploads/admins/');
                $new->image = 'uploads/admins/' . $file;
            }
            $new->email = $request->email;
            $new->password = Hash::make($request->password);
            $new->phone = $request->phone;
            $new->type = 'admin';
            $new->name_ar = $request->name;
            $new->save();
            return redirect('admin/show-admins')->with(notification('تم الحفظ', 'success'));
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function admin_delete(Request $request){
        $get=Admin::where('id',$request->id)->first();
        if($get->id != admin()->user()->id) {
             delete_file($get->image);
            $delete = Admin::find($request->id)->delete();
            return redirect('admin/show-admins')->with(notification('تم الحذف', 'warning'));
        }
        else
            return redirect('admin/show-admins')->with(notification('لا يمكن حذف المشرف المسجل به', 'error'));
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function admin_edit($id){
        $get=Admin::where('id',$id)->get();
        return view('Admin/Admin/edit',['data'=>$get]);
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store_admin_update(Request $request){
        $update=Admin::find($request->id);
        $email=Admin::where('id',$request->id)->get();
        foreach ($email as $back){

            if ($back->email != $request->email){
                $valedator =Validator::make($request->all(),[
                    'email'=> [ 'unique:admins'],
                ]);
                if ($valedator->fails()) {
                    return redirect('admin/show-admins')->with(notification('هذا البريد الالكترونى موجود مسبقا','error'));
                }
            }
            if (isset($request->password)){
                $update->password=Hash::make($request->password);
            }
            if (isset($request->image)){
                $file = $this->saveImage($request->image, 'uploads/admins/');
                $update->image = 'uploads/admins/' . $file;;
            }
        }
        $update->name_ar=$request->name_ar;
        $update->email=$request->email;
        $update->phone=$request->phone;
        $update->save();
        return redirect('admin/show-admins')->with(notification('تم التعديل','info'));
    }//end fun
    public function admin_check_delete(Request $request){
        $ids = explode(",", $request->id);
        $get=Admin::whereIn('id', $ids)->get();
        foreach ($get as $delete_){
            if ($delete_->image!=null){
                delete_file($delete_->image);
            }
        }
        $delete_=Admin::whereIn('id', $ids)->delete();
        return redirect('admin/show-admins')->with(notification('تم الحذف','warning'));
    }

    public function save_profile(Request $request){
        if (auth()->guard('admin')->user()->email != $request->email){
            $valedator =Validator::make($request->all(),[
                'email'=> [ 'unique:admins'],
            ]);
            if ($valedator->fails()) {
                return back()->with(notification('هذا البريد الإلكترونى موجود مسبقا','warning'));
            }
        }
        $update=Admin::find(auth()->guard('admin')->user()->id);
        $update->name=$request->name;
        $update->email=$request->email;
        $update->phone=$request->phone;
        if (isset($request->password)){
            $update->password=Hash::make($request->password);
        }
        if (isset($request->image)){
            $update->image = upload_image('admin','image',auth()->guard('admin')->user()->image);
        }
        $update->save();
        return back()->with(notification('تم التعديل','info'));
    }//end fun

    public function my_profile(){
        return view('Admin/profile/index');
    }//end fun
}
