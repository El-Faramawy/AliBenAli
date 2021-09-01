@extends('layouts.admin.app')
@section('page_name') تعديل طبيب @endsection
@section('content')
    <br>
    <br>
    <br>
    <br>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: '{{$errors->first()}}',
                text: 'حاول مرة اخري!',
                confirmButtonText: 'حسنا',

// footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    <div class="card card-custom mr-3">
        <div class="card-header">
            <div class="row">
                <h3 class="card-title fs-2">
                    تعديل بيانات طبيب
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form class="form" method="post" action="{{route('update_doctor')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div id="data_rebetd" class="card-body">
                <div class="text-center">
                    <!--begin::Image input-->
                    <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-150px h-150px" style="border-radius: 50%;background-image: url({{asset($doctor->image)}}" alt="image" id="image"></div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="اضافة صورة" data-original-title="">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <!--begin::Inputs-->
                            <input type="file" name="image" accept=".png, .jpg, .jpeg">
                            <input type="hidden" name="avatar_remove" value="1">
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="الغاء الصورة" data-original-title="">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                        <!--end::Cancel-->
                    </div>
                    <input type="hidden" name="id" value="{{$doctor->id}}">
                    <!--end::Image input-->
                    <!--begin::Hint-->
                    <div class="form-text mb-4">مسموح بالصيغ الاتية: png, jpg, jpeg.</div>
                    <!--end::Hint-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label required fw-bold fs-4">اسم الطبيب :</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" required name="name_ar" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="اسم الطبيب باللغة العربية" autocomplete="off" value="{{$doctor->name_ar}}">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" required name="name_en" class="form-control form-control-lg form-control-solid" placeholder="اسم الطبيب باللغة الانجليزية"  autocomplete="off" value="{{$doctor->name_en}}">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label required fw-bold fs-4">اسم التخصص :</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" required name="category_ar" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="تخصص الطبيب باللغة العربية" autocomplete="off" value="{{$doctor->category_ar}}">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" required name="category_en" class="form-control form-control-lg form-control-solid" placeholder="تخصص الطبيب باللغة الانجليزية"  autocomplete="off" value="{{$doctor->category_en}}">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label required fw-bold fs-4">البريد وكلمة المرور :</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" required name="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="البريد الالكتروني" autocomplete="off" value="{{$doctor->email}}">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="password" name="password" class="form-control form-control-lg form-control-solid" placeholder="******"  autocomplete="off">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label required fw-bold fs-4">الجنسية :</label>
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <select class="form-control form-select form-control-lg form-control-solid mb-lg-0" name="country_id">
                                    <option value="{{$doctor->country->id}}" selected>{{$doctor->country->name_ar}}</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name_ar}}</option>
                                @endforeach
                                </select>
                            </div>
                            <label class="col-lg-2 col-form-label required fw-bold fs-4">القسم :</label>
                            <div class="col-lg-4">
                                <select class="form-control form-select form-control-lg form-control-solid mb-lg-0" name="clinic_id">
                                    <option value="{{$doctor->clinic->id}}" selected>{{$doctor->clinic->name_ar}}</option>
                                @foreach($clinics as $clinic)
                                        <option value="{{$clinic->id}}">{{$clinic->name_ar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label required fw-bold fs-4">اصغر عمر للمريض :</label>
                    <div class="col-lg-2">
                        <input type="number" name="min_age" class="form-control form-control-lg form-control-solid mb-lg-0" max="120" min="0" value="{{$doctor->min_age}}">
                    </div>
                    <label class="col-lg-2 col-form-label required fw-bold fs-4">اكبر عمر للمريض :</label>
                    <div class="col-lg-2">
                        <input type="number" name="max_age" class="form-control form-control-lg form-control-solid mb-lg-0" max="120" min="0" value="{{$doctor->max_age}}">
                    </div>
                    <label class="col-lg-1 col-form-label required fw-bold fs-4">الهاتف :</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control form-control-lg form-control-solid mb-lg-0" name="phone" placeholder="" value="{{$doctor->phone}}"/>
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label required fw-bold fs-4">مكالمة الصوت :</label>
                    <div class="col-lg-2 form-check form-switch">
                        @if($doctor->audio =='yes' )
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="audio" style="border-radius: 10px" checked/>
                        @else
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="audio" style="border-radius: 10px" />
                        @endif
                    </div>

                    <label class="col-lg-2 col-form-label required fw-bold fs-4">مكالمة الفيديو :</label>
                    <div class="col-lg-2 form-check form-switch">
                        @if($doctor->video =='yes' )
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="video" style="border-radius: 10px" checked/>
                        @else
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="video" style="border-radius: 10px" />
                        @endif                    </div>

                    <label class="col-lg-1 col-form-label required fw-bold fs-4">السعر :</label>
                    <div class="col-lg-3">
                        <input type="number" class="form-control form-control-lg form-control-solid mb-lg-0"  required  name="price" placeholder="السعر الخاص بالطبيب" min="0" value="{{$doctor->price}}" />
                    </div>
                </div>

                <div class="separator separator-dashed my-8"></div>
                <h4 class="mt-2">السيرة الذاتية</h4>
                <div class="col-2">
                    <a href="javascript:;" id="add_row"  data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                        <i class="la la-plus"></i>ادراج سجل
                    </a>
                </div>
                <div id="kt_repeater_1" data-repeater-list="List_Classes">
                    <div class="form-group row data-repeater-item" id="kt_repeater_1">
                        @foreach($cvs as $cv)
                            <div data-repeater-list="" class="">
                            <div data-repeater-item class="form-group row align-items-center mt-4" id="my_row{{$loop->iteration}}">
                                <div class="col-md-2">
                                    <label>العنوان بالعربي :</label>
                                    <textarea rows="4" name="title_ar{{$loop->iteration}}" class="form-control fs-4" placeholder="">{{$cv->title_ar}}</textarea>
                                    <div class="d-md-none mb-2"></div>
                                </div>
                                <div class="col-md-2">
                                    <label>العنوان بالانجليزي :</label>
                                    <textarea rows="4" name="title_en{{$loop->iteration}}" class="form-control fs-4" placeholder="">{{$cv->title_en}}</textarea>
                                    <div class="d-md-none mb-2"></div>
                                </div>
                                <div class="col-md-3">
                                    <label>الوصف بالعربي :</label>
                                    <textarea rows="4" name="text_ar{{$loop->iteration}}" class="form-control fs-4" placeholder="">{{$cv->text_ar}}</textarea>
                                    <div class="d-md-none mb-2"></div>
                                </div>
                                <div class="col-md-3">
                                    <label>الوصف بالانجليزي :</label>
                                        <textarea rows="4" name="text_en{{$loop->iteration}}" class="form-control fs-4" placeholder="" >{{$cv->text_en}}</textarea>
                                    <div class="d-md-none mb-2"></div>
                                    <input name="count[]" id="count" type="hidden" value="{{$cvs->count()}}">
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:;" data-repeater-delete="" id="row{{$loop->iteration}}" class="btn btn-sm font-weight-bolder mt-4 btn-light-danger">
                                        <i class="la la-trash-o"></i>حذف
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @if($doctor->cv_image == null)
                <div class="form-check col-lg-2" id="change">
                    <input class="form-check-input cv_type" type="radio" name="flexRadioDefault" id="flexRadioDefault2"  value="2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        تبديل الي صورة
                    </label>
                </div>
                @endif

                <div class="d-none" id="cv_image1">
                    <div class="form-group">
                        <label for="image"><i class="fa fa-paperclip"></i>رفع CV للطبيب</label>
                        <input type="file" data-default-file="{{get_file($doctor->cv_image)}}" value="{{get_file($doctor->cv_image)}}" name="cv_image" class="dropify">
                    </div>
                </div>
                @if($doctor->cv_image)
                <div class="d-block" id="cv_image">
                    <div class="form-group">
                        <label for="image"><i class="fa fa-paperclip"></i>رفع CV للطبيب</label>
                        <input type="file" data-default-file="{{get_file($doctor->cv_image)}}" value="{{get_file($doctor->cv_image)}}" name="cv_image" class="dropify">
                    </div>
                </div>
                @endif
{{--                @if($doctor->cv_image)--}}
{{--                    <span onclick="$('.img').addClass('d-none')"><i class="fa fa-trash text-hover-danger cursor-pointer" title="حذف"></i></span>--}}
{{--                    <img class="img mr-5" src="{{asset($doctor->cv_image)}}" height="200px" width="350px">--}}
{{--                @endif--}}
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-2">
                        <button type="submit" class="btn font-weight-bold btn-success mr-2">حفظ البيانات</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>
<script src="{{url('/')}}/admin/assets/js/sweet.js"></script>

<script>
    $(document).ready(function() {
        if({{$cvs->count()}}){
            var i = parseInt($('#count').val())+1;
        }
        else{
            var i = 1;
        }
        $(document).on('click','#add_row',function(){
            // var repeat = $('#kt_repeater_1').html();
            var repeat ='<div data-repeater-list="" class="" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">'+
                '<div data-repeater-item class="form-group row align-items-center mt-4" id="my_row'+i+'">'+
                '<div class="col-md-2">'+
                '  <label>العنوان بالعربي :</label>'+
                ' <textarea rows="4" name="title_ar'+i+'"'    +' class="form-control" placeholder=""/></textarea>'+
                ' <div class="d-md-none mb-2"></div>'+
                '</div>'+
                '<div class="col-md-2">'+
                '   <label>العنوان بالانجليزي :</label>'+
                '  <textarea rows="4" name="title_en'+i+'"'    +'  class="form-control" placeholder=""/></textarea>'+
                ' <div class="d-md-none mb-2"></div>'+
                '</div>'+
                '<div class="col-md-3">'+
                '   <label>الوصف بالعربي :</label>'+
                '  <textarea rows="4" name="text_ar'+i+'"'    +'  class="form-control" placeholder=""/></textarea>'+
                ' <div class="d-md-none mb-2"></div>'+
                '</div>'+
                '<div class="col-md-3">'+
                '   <label>الوصف بالانجليزي :</label>'+
                '  <textarea rows="4" name="text_en'+i+'"'    +'  class="form-control" placeholder=""/></textarea>'+
                ' <div class="d-md-none mb-2"></div>'+
                '</div>'+
                '<div class="col-md-2">'+
                '   <a href="javascript:;" data-repeater-delete="" id="row'+i+ '" class="btn btn-sm font-weight-bolder mt-4 btn-light-danger">  <i class="la la-trash-o"></i>حذف'+
                ' </a>'+
                '</div>'+
                '<input type="hidden" name="count[]" id="count" value="'+ i +'">'+
                '</div>'+
                '</div>'
            $('#kt_repeater_1').append(repeat);
            i++;
            $('#cv_image').addClass('d-none').removeClass('d-block');
        });
        for(let x = 1 ; x <= 10 ; x++)
            $(document).on('click','#row'+x,function(){
                $('#my_row'+x).remove();
            });
    });
</script>

<script>
    $(document).ready(function () {

        $(document).on('click', '.cv_type', function () {
            var type_of_cv = $(this).val();
            if (type_of_cv == 2){
                $('#cv_image1').addClass('d-block').removeClass('d-none');
                $('#kt_repeater_1').remove();
                $('#add_row').addClass('d-none');
            }
        });
    });
</script>
