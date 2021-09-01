<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\Notifications;
use App\Models\Disease;
use App\Models\DoctorHour;
use App\Models\Notification;
use App\Models\Reservation;
use App\Models\ReservationDiseases;
use App\Models\ReservationFiles;
use App\Models\ReservationReports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    use Notifications;
    public function index(Request $request){

        $rules = [
            'user_id'       => 'required',
            'doctor_id'     => 'required',
            'date_id'       => 'required',
            'hour_id'       => 'required',
            'name'          => 'required',
            'phone'         => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],422);
        }

        else{
            $data = $request->only('date_id','doctor_id','user_id','hour_id','name','phone','call_type','gender','age');
            $reservation = Reservation::create($data);

            if($request->reservation_diseases && $request->reservation_diseases != ''){
                foreach ($request->reservation_diseases as $disease){
                    $new_disease = new ReservationDiseases ;
                    $new_disease->disease_id        = $disease;  // $disease['disease_id'];
                    $new_disease->reservation_id    = $reservation->id;
                    $new_disease->save();
                }
            }

            if($request->reservation_files && $request->reservation_files != ''){
                foreach ($request->reservation_files as $files){
                    $new_file = new ReservationFiles();
                    $new_file->file              =  'storage/'.$files->store('offer_reservation_files','public');  //$files['file'];
                    $new_file->reservation_id    = $reservation->id;
                    $new_file->save();
                }
            }

            $date = DoctorHour::where('id',$request->hour_id)->first();
            $date->is_reserved = 'yes';
            $date->save();

            $doctor = Reservation::with('doctor','date','hour','reservation_diseases.diseases','files')
                ->where(['id'=>$reservation->id])->first();

            return response()->json(['data'=>$doctor,'code'=>200,'message'=>''],200);
        }

    }
    //========================================================================================
    public function update_reservation(Request $request){
        $rules = [
            'reservation_id'=> 'required|exists:reservations,id',
            'date_id'       => 'required',
            'hour_id'       => 'required',
            'name'          => 'required',
            'phone'         => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],422);
        }

        else{
            $data = $request->only('date_id','hour_id','name','phone');
            $reservation = Reservation::find($request->reservation_id);

            $old_date = DoctorHour::where('id',$reservation->hour_id)->first();
            $old_date->is_reserved = 'no';
            $old_date->save();

            $date = DoctorHour::where('id',$request->hour_id)->first();
            $date->is_reserved = 'yes';
            $date->save();

            $reservation->update($data);

            $doctor = Reservation::with('doctor','date','hour','reservation_diseases.diseases','files')
                ->where(['id'=>$reservation->id])->first();

            return response()->json(['data'=>$doctor,'code'=>200,'message'=>''],200);
        }

    }
    //=======================================================================================
    public function my_reservations(Request $request){
        $rules = [
            'user_id'       => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],422);
        }

        else{
            if ($request->paginate=='on') {
                $number = $request->page_num==null?10:$request->page_num;
                $doctor = Reservation::with('doctor','date','hour','reservation_diseases.diseases','files')
                    ->where(['user_id'=>$request->user_id,'type'=>'online'])->paginate($number);
                $json = collect(["message" => "","code" => 200]) ;
                $json =  $json->merge($doctor);
                return response()->json($json,200);
            }else{
                $doctor = Reservation::with('doctor','date','hour','reservation_diseases.diseases','files')
                    ->where(['user_id'=>$request->user_id,'type'=>'online'])->get();
            }

//            $count = 0;
//            foreach ($doctor as $doc){
////                $count = $doc->whereHas('date',function ($query){
////                    $query->where(['date','>=',date('Y-m-d')]);
////                })->count();
//                if ($doc->date > date('Y-m-d') ||($doc->date == date('Y-m-d')&&$doc->hour >= date('h:i:s') )) {
//                    $doc->can_deleted  = 'no';
//                    $doc->can_canceled = 'no';
//                    $doc->can_updated  = 'no';
//                }
//            }

            return response()->json(['data'=>$doctor,'code'=>200,'message'=>''],200);
        }

    }
    //=======================================================================================
    public function delete_reservation(Request $request){
        $rules = [
            'reservation_id'       => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'code'=>422,'message'=>$validator->errors()],422);
        }

        else{
            $doctor = Reservation::with('doctor','date','hour','reservation_diseases.diseases','files')
                ->where(['id'=>$request->reservation_id])->first();
            $doctor->is_deleted = 'yes';
            $doctor->save();

            return response()->json(['data'=>$doctor,'code'=>200,'message'=>''],200);
        }

    }
    //=======================================================================================

    public function diseases(Request $request){
        if ($request->paginate=='on') {
            $number = $request->page_num==null?10:$request->page_num;
            $doctor = Disease::paginate($number);
            $json = collect(["message" => "","code" => 200]) ;
            $json =  $json->merge($doctor);
            return response()->json($json,200);
        }else{
            $doctor = Disease::get();
            return response()->json(['data'=>$doctor,'code'=>200,'message'=>''],200);
        }
    }

    //===================================================================================
    //===================================================================================
    //===================================================================================
    //===============================  Doctor  ==============================================
    //===================================================================================
    //===================================================================================

    public function reservations_dates(Request $request){
        $date = [];
        for ($i = 0; $i < 5; $i++) {
            $date_ = date('Y-m-d', strtotime('+' . $i . ' day'));
            $date[$i] = [
                'date'=>$date_,
                'day_number'=>date('d',strtotime($date_)),
                'day_text'=>language()=='ar'?ArabicDate($date_)['ar_day']:date('l',strtotime($date_)),
                ];

            if ($date_ == date('Y-m-d')){
                $date[$i]['day_text'] = language()=='ar'?'اليوم ':'today';
            }
            if ($date_ == date('Y-m-d', strtotime('+ 1 day'))){
                $date[$i]['day_text'] = language()=='ar'?'غدا ':'tomorrow';
            }
        }
        return response()->json(['data' => $date, 'code' => 200, 'message' => ''], 200);

    }

    //==================================================================================

    public function doctor_reservations(Request $request)
    {
        $rules = [
            'doctor_id' => 'required|exists:admins,id',
            'date' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['data' => null, 'code' => 422, 'message' => $validator->errors()], 422);
        } else {
            $date = $request->date;
            if ($request->paginate == 'on') {
                $number = $request->page_num == null ? 10 : $request->page_num;

//                for ($i = 0; $i < 5; $i++) {
//                    return date('Y-m-d', strtotime('+' . $i . ' day'));
                $doctor = Reservation::with('doctor', 'user', 'date', 'hour', 'reservation_diseases.diseases', 'files')
                    ->where(['doctor_id' => $request->doctor_id,'type' => 'online'])
                    ->whereIn('status',['accepted','ended'])
                    ->whereHas('date', function ($query) use ($date) {
                        $query->where('date', $date);
                    })
                    ->paginate($number);
//                }
                $json = collect(["message" => "", "code" => 200]);
                $json = $json->merge($doctor);
                return response()->json($json, 200);
            } else {

//                for ($i = 0; $i < 5; $i++) {
                $doctor = Reservation::with('doctor', 'user', 'date', 'hour', 'reservation_diseases.diseases', 'files')
                    ->where(['doctor_id' => $request->doctor_id,'type' => 'online'])
                    ->whereIn('status',['accepted','ended'])
                    ->whereHas('date', function ($query) use ($date) {
                        $query->where('date', $date);
                    })
                    ->get();
//                }
            }

            return response()->json(['data' => $doctor, 'code' => 200, 'message' => ''], 200);
        }
    }

    //==========================================================================================
    public function one_reservation(Request $request)
    {
        $rules = [
            'reservation_id' => 'required|exists:reservations,id',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['data' => null, 'code' => 422, 'message' => $validator->errors()], 422);
        }

        $doctor = Reservation::with('doctor', 'user', 'date', 'hour', 'reservation_diseases.diseases', 'files','reports')
            ->where(['id' => $request->reservation_id])->first();
//        return date('H:i:s');
        if ( $doctor->status == 'accepted' && ( date('Y-m-d') > date('Y-m-d',strtotime($doctor->date->date)) || (date('Y-m-d') == date('Y-m-d',strtotime($doctor->date->date)) && date('H:i:s') >  date('H:i:s',strtotime($doctor->hour->hour)) ) ))
            $doctor->can_end = 'yes';
        else
            $doctor->can_end = 'no';
        if ( $doctor->status == 'ended' && ( $doctor->report_text != '' || !$doctor->reports->isEmpty()))
            $doctor->status = 'report_added';

        return response()->json(['data' => $doctor, 'code' => 200, 'message' => ''], 200);
    }
    //==========================================================================================
    public function one_offer_reservation(Request $request)
    {
        $rules = [
            'reservation_id' => 'required|exists:reservations,id',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['data' => null, 'code' => 422, 'message' => $validator->errors()], 422);
        }

        $doctor = Reservation::with('offer.first_image','offer.images', 'user', 'date', 'hour', 'reservation_diseases.diseases', 'files')
            ->where(['id' => $request->reservation_id])->first();

        return response()->json(['data' => $doctor, 'code' => 200, 'message' => ''], 200);
    }

    //==========================================================================================
    public function end_reservation(Request $request)
    {
        $rules = [
            'reservation_id' => 'required|exists:reservations,id',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['data' => null, 'code' => 422, 'message' => $validator->errors()], 422);
        }

        $doctor = Reservation::with('doctor', 'user', 'date', 'hour', 'reservation_diseases.diseases', 'files')
            ->where(['id' => $request->reservation_id])->first();
        $doctor->status = 'ended';
        $doctor->call_start = 'off';
        $doctor->save();

        $notification = new Notification();
        $notification->title_ar = $request->reservation_id . 'حالة الحجز رقم ';
        $notification->title_en = 'status of reservation number ' . $request->reservation_id;
        $notification->message_ar = 'تم انهاء الحجز بنجاح';
        $notification->message_en = 'your reservation ended successfully';
        $notification->reservation_id = $doctor->id;
        $notification->date = $doctor->date->date;
        $notification->user_id = $doctor->user_id;
        $notification->save();

        if ($doctor->type == 'online' && $doctor->doctor_id != null){
        $no = new Notification();
        $no->title_ar = $request->id . 'حالة الحجز رقم ';
        $no->title_en = 'status of reservation number ' . $request->id;
        $no->message_ar = 'تم انهاء الحجز بنجاح';
        $no->message_en = 'your reservation ended successfully';
        $no->reservation_id = $doctor->id;
        $no->date = $doctor->date->date;
        $no->doctor_id = $doctor->doctor_id;
        $no->save();
            $this->doctor_notification($doctor->doctor_id, $no->title_ar, $no->message_ar);
        }
//
        $this->notification($doctor->user_id, $notification->title_ar, $notification->message_ar);

        return response()->json(['data' => $doctor, 'code' => 200, 'message' => ''], 200);
    }

    //==========================================================================================
    public function add_reservation_report(Request $request)
    {
        $rules = [
            'reservation_id' => 'required|exists:reservations,id',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['data' => null, 'code' => 422, 'message' => $validator->errors()], 422);
        }

        $doctor = Reservation::with('doctor', 'user', 'date', 'hour', 'reservation_diseases.diseases', 'files')
            ->where(['id' => $request->reservation_id])->first();
        $doctor->report_text = $request->report_text;
        $doctor->save();
//        return $request->reports ;

        if ($request->reports && $request->reports != '') {
            foreach ($request->reports as $report) {
                $new_file = new ReservationReports;

                $repo = 'storage/' . $report->store('reservation_report_files', 'public');
                $new_file->report = $repo;  //$files['file'];
                $new_file->reservation_id = $request->reservation_id;
                $new_file->save();
            }
        }

        if ($request->report_text == null && $request->reports == '')
            return response()->json(['data' => null, 'code' => 422, 'message' => 'you should add text or report or both'], 200);

        return response()->json(['data' => $doctor, 'code' => 200, 'message' => ''], 200);
    }

    //=============================================================================================
    public function reservation_time()
    {
        $date = date('Y-m-d H:i', strtotime('+ 5 minute'));
//        $date2 = date('Y-m-d H:i:s', strtotime('+ 4 minute'));
//        return $date2;
        $reservation = Reservation::where(['status'=> 'accepted',['is_deleted','!=','']])->with('date', 'hour')
            ->whereHas('date', function ($query) use ($date) {
                $query->where('date', date('Y-m-d', strtotime($date)));
            })
//            ->whereHas('hour', function ($query2) use ($date,$date2) {
//                $query2->hour = date('H:i',strtotime($query2->hour));
//                $query2->whereBetween('hour',[ date('H:i:s',strtotime($date2)), date('H:i:s',strtotime($date))]);
//                $query2->where(date('H:i',strtotime($query2->hour)), date('H:i:s',strtotime($date)));
//        })
            ->get();
//        return $reservation;

        foreach ($reservation as $reserve) {
            if (date('H:i', strtotime($reserve->hour->hour)) == date('H:i', strtotime($date))) {
//            return $reserve->user_id;
                if ($reserve->type == 'online') {
                    if ($reserve->doctor_id != null) {
                        $notification = new Notification;
                        $notification->title_ar = ' حالة الطلب رقم ' . $reserve->id;
                        $notification->title_en = ' status of reservation number ' . $reserve->id;
                        $notification->message_ar = 'لديك معاد حجز بعد 5 دقائق ';
                        $notification->message_en = ' You have a reservation appointment after 5 minutes ';
                        $notification->message_en = ' You have a reservation appointment after 5 minutes ';
                        $notification->doctor_id = $reserve->doctor_id;
                        $notification->reservation_id = $reserve->id;
                        $notification->date = date('Y-m-d');
                        $notification->save();

                        $reserve->call_start = 'on';
                        $reserve->save();
                    }
                }
                if ($reserve->user_id != '') {
//                return $reserve;
                    $new_notification = new Notification;
                    $new_notification->title_ar = ' حالة الطلب رقم ' . $reserve->id;
                    $new_notification->title_en = ' status of reservation number ' . $reserve->id;
                    $new_notification->message_ar = 'لديك معاد حجز بعد 5 دقائق ';
                    $new_notification->message_en = ' You have a reservation appointment after 5 minutes ';
                    $new_notification->message_en = ' You have a reservation appointment after 5 minutes ';
                    $new_notification->user_id = $reserve->user_id;
                    $new_notification->reservation_id = $reserve->id;
                    $new_notification->date = date('Y-m-d');
                    $new_notification->save();
                }

                if ($reserve->doctor_id != null)
                    $this->doctor_notification($reserve->doctor_id, $new_notification->title_ar, $new_notification->message_ar);

                $this->notification($reserve->user_id, $new_notification->title_ar, $new_notification->message_ar);
            }
        }
        return response()->json(['data' => $reservation, 'code' => 200, 'message' => ''], 200);
    }
}













