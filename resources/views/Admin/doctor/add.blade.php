@extends('layouts.admin.app')
@section('page_name') اضافة طبيب @endsection
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
                    تسجيل بيانات طبيب
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form class="form" method="post" action="{{route('create_doctor')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div id="data_rebetd" class="card-body">
                <div class="text-center">
                    <!--begin::Image input-->
                    <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-150px h-150px" style="border-radius: 50%"></div>
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
                                <input type="text" name="name_ar" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="اسم الطبيب باللغة العربية" autocomplete="off">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="name_en" class="form-control form-control-lg form-control-solid" placeholder="اسم الطبيب باللغة الانجليزية"  autocomplete="off">
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
                                <input type="text" name="category_ar" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="تخصص الطبيب باللغة العربية" autocomplete="off">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="category_en" class="form-control form-control-lg form-control-solid" placeholder="تخصص الطبيب باللغة الانجليزية"  autocomplete="off">
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
                                <input type="text" name="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="البريد الالكتروني" autocomplete="off">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="password" name="password" class="form-control form-control-lg form-control-solid" placeholder="كلمة المرور"  autocomplete="off">
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
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name_ar}}</option>
                            @endforeach
                        </select>
                            </div>
                            <label class="col-lg-2 col-form-label required fw-bold fs-4">القسم :</label>
                    <div class="col-lg-4">
                        <select class="form-control form-select form-control-lg form-control-solid mb-lg-0" name="clinic_id">
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
                        <input type="number" name="min_age" class="form-control form-control-lg form-control-solid mb-lg-0" max="120" min="0">
                    </div>
                    <label class="col-lg-2 col-form-label required fw-bold fs-4">اكبر عمر للمريض :</label>
                    <div class="col-lg-2">
                        <input type="number" name="max_age" class="form-control form-control-lg form-control-solid mb-lg-0" max="120" min="0">
                    </div>
                    <label class="col-lg-1 col-form-label required fw-bold fs-4">الهاتف :</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control form-control-lg form-control-solid mb-lg-0"  required  name="phone" placeholder=""/>
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label required fw-bold fs-4">مكالمة الصوت :</label>
                    <div class="col-2 form-check form-switch m--margin-10">
                        <input class="form-check-input m--margin-bottom-20-mobile" type="checkbox" id="flexSwitchCheckChecked" name="audio" style="border-radius: 10px;margin-right: 27%;">
                    </div>

                   <label class="col-lg-2 col-form-label required fw-bold fs-4">مكالمة الفيديو :</label>
                    <div class="col-2 form-check form-switch m--margin-10 ">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="video" style="border-radius: 10px;margin-right: 27%;">
                    </div>

                    <label class="col-lg-1 col-form-label fw-bold fs-4 ">السعر :</label>
                    <div class="col-lg-2">
                        <input type="number" class="form-control form-control-lg form-control-solid mb-lg-0"  required  name="price" placeholder="سعر الكشف" min="0" />
                    </div>
                </div>

                <label class="col-lg-3 col-form-label required fw-bold fs-4">اضافة السيرة الذاتية :</label>
                <div class="form-check col-lg-2">
                    <input class="form-check-input cv_type" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        نص
                    </label>
                </div>
                <div class="form-check col-lg-2">
                    <input class="form-check-input cv_type" type="radio" name="flexRadioDefault" id="flexRadioDefault2"  value="2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        صورة
                    </label>
                </div>

<div class="d-none" id="cv_text">
                <div class="separator separator-dashed my-8"></div>
                <h4 class="mt-2">السيرة الذاتية</h4>
                <div class="col-2">
                    <a href="javascript:;" id="add_row"  data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                        <i class="la la-plus"></i>ادراج سجل
                    </a>
                </div>
                <div id="kt_repeater_1" data-repeater-list="List_Classes">
                    <div class="form-group row data-repeater-item" id="kt_repeater_1">
                        <div data-repeater-list="" class="change">
                            <div data-repeater-item class="form-group row align-items-center mt-4" id="my_row0">
                                <div class="col-md-2">
                                    <label>العنوان بالعربي :</label>
                                    <input type="text" name="title_ar0" class="form-control" placeholder=""/>
                                    <div class="d-md-none mb-2"></div>
                                </div>
                                <div class="col-md-2">
                                    <label>العنوان بالانجليزي :</label>
                                    <input type="text" name="title_en0" class="form-control" placeholder=""/>
                                    <div class="d-md-none mb-2"></div>
                                </div>
                                <div class="col-md-3">
                                    <label>الوصف بالعربي :</label>
                                    <input type="text" name="text_ar0" class="form-control" placeholder=""/>
                                    <div class="d-md-none mb-2"></div>
                                </div>
                                <div class="col-md-3">
                                    <label>الوصف بالانجليزي :</label>
                                    <input type="text" name="text_en0" class="form-control" placeholder=""/>
                                    <div class="d-md-none mb-2"></div>
                                    <input name="count" type="hidden" value="0">
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:;" data-repeater-delete="" id="row0" class="btn btn-sm font-weight-bolder mt-4 btn-light-danger">
                                        <i class="la la-trash-o"></i>حذف
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
      <div class="d-none" id="cv_image">
          <div class="form-group">
              <label for="image"><i class="fa fa-paperclip"></i>رفع CV للطبيب</label>
              <input type="file" data-default-file="{{trans('web.click')}}  " name="cv_image" class="dropify">
          </div>
      </div>

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
        var i = 1;
        $(document).on('click','#add_row',function(){
            // var repeat = $('#kt_repeater_1').html();
            var repeat ='<div data-repeater-list="" class="change">'+
                    '<div data-repeater-item class="form-group row align-items-center mt-4" id="my_row'+i+'">'+
                        '<div class="col-md-2">'+
                          '  <label>العنوان بالعربي :</label>'+
                           ' <input type="text" name="title_ar'+i+'"'    +' class="form-control" placeholder=""/>'+
                           ' <div class="d-md-none mb-2"></div>'+
                        '</div>'+
                        '<div class="col-md-2">'+
                         '   <label>العنوان بالانجليزي :</label>'+
                          '  <input type="text" name="title_en'+i+'"'    +'  class="form-control" placeholder=""/>'+
                           ' <div class="d-md-none mb-2"></div>'+
                        '</div>'+
                        '<div class="col-md-3">'+
                         '   <label>الوصف بالعربي :</label>'+
                          '  <input type="text" name="text_ar'+i+'"'    +'  class="form-control" placeholder=""/>'+
                           ' <div class="d-md-none mb-2"></div>'+
                        '</div>'+
                        '<div class="col-md-3">'+
                         '   <label>الوصف بالانجليزي :</label>'+
                          '  <input type="text" name="text_en'+i+'"'    +'  class="form-control" placeholder=""/>'+
                           ' <div class="d-md-none mb-2"></div>'+
                        '</div>'+
                        '<div class="col-md-2">'+
                         '   <a href="javascript:;" data-repeater-delete="" id="row'+i+ '" class="btn btn-sm font-weight-bolder mt-4 btn-light-danger">  <i class="la la-trash-o"></i>حذف'+
                           ' </a>'+
                        '</div>'+
                    '</div>'+
                '<input type="hidden" name="count" value="'+i+'">'+
                '</div>'
            $('#data_rebetd').append(repeat);
            i++;
        });
        for(let x = 0 ; x <= 10 ; x++)
        $(document).on('click','#row'+x,function(){
            $('#my_row'+x).remove();
        });
    });
</script>
<script>
    $(document).ready(function () {

        $(document).on('click', '.cv_type', function () {
            var type_of_cv = $(this).val();

            if (type_of_cv == 1) {
                $('#cv_text').addClass('d-block').removeClass('d-none');
                $('#cv_image').addClass('d-none').removeClass('d-block');
            } if (type_of_cv == 2){
                $('#cv_image').addClass('d-block').removeClass('d-none');
                $('#cv_text').addClass('d-none').removeClass('d-block');
                $('.change').addClass('d-none').removeClass('d-block');

            }

        });
    });
</script>
