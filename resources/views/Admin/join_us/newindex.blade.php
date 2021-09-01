@extends('layouts.admin.app')
@section('page_name') الوصف العام للوظائف @endsection
@section('content')

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
<!------------------------------------ start join form --------------------------------->
<div class="card mt-10">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <span class="card-label fw-bolder fs-3 mb-1 mt-3">وصف الوظائف</span>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Form-->
    <form id="kt_project_settings_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" method="post" action="{{route('edit_join')}}">
        <!--begin::Card body-->
        {{csrf_field()}}
        <div class="card-body p-9">
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-2">
                    <div class="fs-6 fw-bold mt-2 mb-3 required">العنوان بالعربي</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid" name="title_ar" value="{{$join->title_ar}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>

                <!--begin::Col-->
                <div class="col-xl-2 text-center">
                    <div class="fs-6 fw-bold mt-2 mb-3 required">العنوان بالانجليزي</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4 fv-row fv-plugins-icon-container">
                    <input type="text" class="form-control form-control-solid" name="title_en" value="{{$join->title_en}}">
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
            </div>

            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-2">
                    <div class="fs-6 fw-bold mt-2 mb-3 required">الوصف بالعربي</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-10 fv-row fv-plugins-icon-container">
                    <textarea type="text" class="form-control form-control-solid h-90px" name="text_ar">{{$join->text_ar}}</textarea>
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
            </div>

                <!--begin::Col-->
            <div class="row mb-8">
                <div class="col-xl-2">
                    <div class="fs-6 fw-bold mt-2 mb-3 required">الوصف بالانجليزي</div>
                </div>
                <!--begin::Col-->
                <div class="col-xl-10 fv-row fv-plugins-icon-container">
                    <textarea type="text" class="form-control form-control-solid h-90px" name="text_en">{{$join->text_en}}</textarea>
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <!--end::Col-->
            </div>

            <!--end::Row-->
        </div>
        <!--end::Card body-->
        <!--begin::Card footer-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">حفظ التغيرات</button>
        </div>
        <!--end::Card footer-->
    </form>
    <!--end:Form-->
</div>

@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>
<script src="{{url('/')}}/admin/assets/js/sweet.js"></script>



