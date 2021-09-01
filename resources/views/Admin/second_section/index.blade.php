@extends('layouts.admin.app')
@section('page_name') النص الترحيبي @endsection
@section('content')
<br>
<br>
<br>
@if ($errors->any())
    <div class="alert alert-danger mt-3 py-4">
        <h3> خطأ !!</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card mb-5 mt-8 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">النص الترحيبي للمستخدمين</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <div id="kt_account_profile_details" class="collapse show">
        <!--begin::Form-->
        <form id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" method="post" action="{{route('edit_welcome')}}" enctype="multipart/form-data">
            <!--begin::Card body-->
            {{@csrf_field()}}
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-4 required">الصورة</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true" style="background-image: url({{url($element->image)}})">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-500px h-300px" style="background-image: url({{url('uploads/second_section/'.$element->image)}});"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="اضافة صورة">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="image" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="avatar_remove" value="1">
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="الغاء الصورة">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">مسموح بالصيغ الاتية: png, jpg, jpeg.</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-4">العنوان</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="title_ar" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="ادخل العنوان باللغة العربية" value="{{$element->title_ar}}" autocomplete="off">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="title_en" class="form-control form-control-lg form-control-solid" placeholder="ادخل العنوان باللغة الانجليزية" value="{{$element->title_en}}" autocomplete="off">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-4">المحتوي باللغة العربية</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <textarea rows="5" name="content_ar" class="form-control form-control-lg form-control-solid" placeholder="ادخل المحتوي باللغة العربية"  autocomplete="off">{{$element->content_ar}}"</textarea>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-4">المحتوي باللغة الانجليزية</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <textarea rows="5" name="content_en" class="form-control form-control-lg form-control-solid" placeholder="ادخل المحتوي باللغة الانجليزية" autocomplete="off">{{$element->content_en}}"</textarea>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card body-->
            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">حفظ التغييرات</button>
            </div>
            <!--end::Actions-->
            </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
@endsection

