@extends('layouts.admin.app')
@section('page_name') اضافة يوم جديد @endsection
<style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</style>
@section('content')
<script src="{{url('/')}}/admin/assets/js/sweet.js"></script>
<br>
<br>
<br>
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: '@foreach ($errors->all() as $error){{ $error }}<br>@endforeach',
            text: 'حاول مرة اخري!',
            confirmButtonText: 'حسنا',

// footer: '<a href="">Why do I have this issue?</a>'
        })
    </script>
@endif
<!--begin::Modal content-->
<div class="modal-content">
        <!--begin::Modal body-->
    <div class="modal-body scroll-y mx-3 mx-xl-15 my-3">
        <div class="card mb-5 mb-xl-8">
            <!--begin::Card body-->
            <div class="card-body pt-15">
                <!--begin::Summary-->
                <div class="d-flex flex-center flex-column mb-5">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-100px symbol-circle mb-7">
                        <img src="{{asset($doctors->image) }}" alt="image" id="image">
                    </div>
                </div>
                <!--start::Summary-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">اسم الدكتور :</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="title_ar" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="اسم الدكتور باللغة العربية" disabled value="{{$doctors->name_ar}}" autocomplete="off">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="title_en" class="form-control form-control-lg form-control-solid" placeholder="اسم الدكتور باللغة الانجليزية" value="{{$doctors->name_en}}" disabled autocomplete="off">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Summary-->
                <!--start::Summary-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">العيادة التابع لها الطبيب :</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                <input type="text" name="title_ar" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="العيادة التابع لها الطبيب " disabled value="{{$doctors->clinic->name_ar}}" autocomplete="off">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Summary-->
                <!--start::Summary-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">للتواصل مع الطبيب :</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                <input type="text" name="title_ar" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="العيادة التابع لها الطبيب " disabled value="{{$doctors->email}}" autocomplete="off">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Summary-->
                <!--start::Summary-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">الجنسية:                        <img src="{{asset($doctors->country->image) }}" alt="image" id="image" style="width:50px; height: 30px;">
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input type="text" name="title_ar" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="اسم البلد باللغة العربية" disabled value="{{$doctors->country->name_ar}}" autocomplete="off">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-4 fv-row fv-plugins-icon-container">
                                <input type="text" name="title_en" class="form-control form-control-lg form-control-solid" placeholder="اسم البلد باللغة الانجليزية" value="{{$doctors->country->name_en}}" disabled autocomplete="off">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Summary-->

                <!--begin::Details toggle-->
                <div class="d-flex flex-stack fs-4 py-3 mt-1">
                    <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">أضافة الايام المتاحة
                        <span class="ms-2 rotate-180">
														<!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
														<span class="svg-icon svg-icon-3">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<polygon points="0 0 24 0 24 24 0 24"></polygon>
																	<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
		    														</g>
															</svg>
														</span>
                            <!--end::Svg Icon-->
													</span></div>
                </div>
                <!--end::Details toggle-->
                <div class="separator separator-dashed my-3"></div>
                <!--begin::Details content-->
                <div id="kt_customer_view_details" class="collapse show">

                    <form method="post" action="{{route('date_cc')}}" >
                        @csrf
                    <lable>اضف ايام وساعات عمل الطبيب </lable><br>
                    <select class="js-example-basic-multiple" name="hours[]" multiple="multiple" style="width:100%; overflow: scroll" >
                        <option value="" disabled> يرجي اختيار الساعة </option>
                        @for ($am =1; $am <= 12; $am++)
                            <option value="{{ $am . ':' . '00'}}">{{ $am. ':' . '00' . ' AM' }} </option>
                        @endfor

                        @for ($pm =13; $pm <= 24; $pm++)
                            <option value="{{ $pm . ':' . '00'}}">{{ $pm. ':' . '00' . ' PM' }} </option>
                        @endfor

                        <input type="hidden" value="{{$doctors->id}}" name="id">

                        <div class="row mb-6" id="myDiv">
                            <label class="col-lg-2 col-form-label required fw-bold fs-4">ايام العرض :</label>
                            <div class="col-lg-4"><div class="container"><input type="date" name="date[]" class="form-control date"></div>
                            </div>
                            <div class="col-lg-4">
                                <div class="container">
                                    <button class="btn btn-md btn-primary" type="button" id="add_day">اضافة يوم</button>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success" value="اضافة">
                    </select>
                    </form>
                </div>
                <!--end::Details content-->
            </div>
            <!--end::Card body-->
        </div>
    </div>
    <!--end::Modal body-->
</div>
<!--end::Modal content-->

@endsection
@push('admin_js')
    <script>
        $("#add_day").click(function(){
            var myInput = $("<div class='col-lg-4 mt-2'><div class='container'><input type='date' name='date[]' class='form-control date'></div>'")
            $("#myDiv").append(myInput);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

@endpush
