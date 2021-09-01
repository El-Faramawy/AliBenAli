@extends('layouts.admin.app')
@section('page_name') اضافة عداد جديد @endsection
<link rel="stylesheet" href="{{url('admin')}}/assets/css/font-awesome.min.css"/>
<link rel="stylesheet" href="{{url('admin')}}/assets/js/fontAwesome.js"/>
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

    <div class="card mt-15">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title fs-3 fw-bolder">اختار ايقونة مناسبة للعداد</div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Form-->
        <form id="kt_project_settings_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" method="post" action="{{route('create_new_counter')}}">
            <!--begin::Card body-->
            {{csrf_field()}}
            <div class="card-body p-9">
                <!--begin::Row-->
                <div class="row mb-8">
                    <!--begin::Col-->
                    <div class="col-xl-2">
                        <div class="fs-6 fw-bold mt-2 mb-3">العنوان باللغة العربية</div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-2 fv-row fv-plugins-icon-container">
                        <input type="text" class="form-control form-control-solid" name="title_ar" required value="">
                        <div class="fv-plugins-message-container invalid-feedback"></div></div>

                    <!--begin::Col-->
                    <div class="col-xl-2 text-center">
                        <div class="fs-6 fw-bold mt-2 mb-3">العنوان باللغة الانجليزية</div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-2 fv-row fv-plugins-icon-container">
                        <input type="text" class="form-control form-control-solid" name="title_en"  value="" required>
                        <div class="fv-plugins-message-container invalid-feedback"></div></div>
                    <!--begin::Col-->
                    <div class="col-xl-2 text-center">
                        <div class="fs-6 fw-bold mt-2 mb-3">الرقم</div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-2 fv-row fv-plugins-icon-container">
                        <input type="number" class="form-control form-control-solid" name="number"  value="" min="0" required>
                        <div class="fv-plugins-message-container invalid-feedback"></div></div>
                </div>

                <div class="row mb-8">
                    <!--begin::Col-->
                    <div class="col-xl-2">
                        <div class="fs-6 fw-bold mt-2 mb-3">اختار الايقونة</div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-12 fv-row fv-plugins-icon-container">
                        <input type="text" readonly id="input_icon" class="form-control form-control-solid" name="icon" required>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                        <script>

                            // $(document).ready(function() {
                                function get_icon($id) {
                                    var get_value_from_div = document.getElementById($id).getAttribute('value');
                                    $('#input_icon').val(get_value_from_div);
                                }
                            // });
                        </script>
                        <div class="grid-container" style="max-height:300px;border:1px solid lightblue;border-radius: 15px ;overflow:scroll;padding:10px   " >
                            @foreach(get_font_icons() as $key=>$value)
                               <span><i value="{{$value}}" class="{{$value}} fs-1 mr-1" id="{{$key}}" onClick="get_icon(this.id)" style="color: #707070"></i></span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
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


