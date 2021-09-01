@extends('layouts.admin.app')
@section('page_name') تاريخ ومعلومات @endsection
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
    <!-----------------------------------Start Data Table ------------------------------------->
    <div class="card mb-5 mb-xl-8 mt-10">
        <!--begin::Body-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title fs-3 fw-bolder">تظهر في صفحة من نحن<i class="bi bi-info-circle mr-2"></i></div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Form-->
                <form id="kt_project_settings_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" method="post" action="{{route('update_info')}}">
                    <!--begin::Card body-->
                    {{csrf_field()}}
                    <div class="card-body p-9">
                        <!--begin::Row-->
                        <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-2">
                                <div class="fs-4 fw-bold mt-2 mb-3">العنوان بالعربي</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-4 fv-row fv-plugins-icon-container">
                                <input type="text" class="form-control form-control-solid fs-4" name="title_ar" value="{{$about->title_ar}}">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>

                            <!--begin::Col-->
                            <div class="col-xl-2 text-center">
                                <div class="fs-4 fw-bold mt-2 mb-3">العنوان بالانجليزي</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-4 fv-row fv-plugins-icon-container">
                                <input type="text" class="form-control form-control-solid fs-4" name="title_en" value="{{$about->title_en}}">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        </div>

                        <!--begin::Row-->
                        <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-2">
                                <div class="fs-4 fw-bold mt-2 mb-3">النص الاول بالعربي</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-10 fv-row fv-plugins-icon-container">
                                <textarea rows="4" type="text" class="form-control form-control-solid fs-4" name="text1_ar">{{$about->text1_ar}}</textarea>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row mb-8">
                        <!--begin::Col-->
                            <div class="col-xl-2">
                                <div class="fs-4 fw-bold mt-2 mb-3">النص الاول بالانجليزي</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-10 fv-row fv-plugins-icon-container">
                                <textarea rows="4" type="text" class="form-control form-control-solid fs-4" name="text1_en">{{$about->text1_en}}</textarea>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                    <div class="row mb-8">
                        <!--begin::Col-->
                        <div class="col-xl-2">
                            <div class="fs-4 fw-bold mt-2 mb-3">النص الثاني بالعربي</div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-10 fv-row fv-plugins-icon-container">
                            <textarea rows="4" type="text" class="form-control form-control-solid fs-4" name="text2_ar">{{$about->text2_ar}}</textarea>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row mb-8">
                        <!--begin::Col-->
                        <div class="col-xl-2">
                            <div class="fs-4 fw-bold mt-2 mb-3">النص الثاني بالانجليزي</div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-10 fv-row fv-plugins-icon-container">
                            <textarea rows="4" type="text" class="form-control form-control-solid fs-4" name="text2_en">{{$about->text2_en}}</textarea>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-2">
                                <div class="fs-4 fw-bold mt-2 mb-3">المحتوي بالعربي</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-10 fv-row fv-plugins-icon-container">
                                <textarea rows="4" type="text" class="form-control form-control-solid fs-4" name="content_ar">{{$about->content_ar}}</textarea>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                    </div>
                        <div class="row mb-8">
                        <!--begin::Col-->
                            <div class="col-xl-2">
                                <div class="fs-4 fw-bold mt-2 mb-3">المحتوي بالانجليزي</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-10 fv-row fv-plugins-icon-container">
                                <textarea rows="4" type="text" class="form-control form-control-solid fs-4" name="content_en">{{$about->content_ar}}</textarea>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
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
    </div>
@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>
<script src="{{url('/')}}/admin/assets/js/sweet.js"></script>



