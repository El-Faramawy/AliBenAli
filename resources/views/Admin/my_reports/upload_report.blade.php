@extends('layouts.admin.app')
@section('page_name') اضافة تقرير @endsection
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
                    تسجيل تقرير جديد
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form class="form" method="post" action="{{route('doctor.create.report')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
                <div class="text-center">
                    <input type="hidden" value="{{$reservation_id}}" name='reservation_id'>
                    <div class="form-group">
                        <label for="image"> <span class=""></span> رفع تقارير <i class="fa fa-paperclip"></i></label>
                        <input type="file" data-default-file="" id="formFileMultiple" multiple name="image[]" class="dropify">
                    </div>
                </div>
                <!--end::Image input-->
                <!--begin::Hint-->
                <div class="form-text mb-4">مسموح بالصيغ الاتية: png, jpg, jpeg.</div>
                <!--end::Hint-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label fw-bold fs-4">وصف التقرير :</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                <textarea rows="2" name="report_text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" autocomplete="off">@if($report_text){{$report_text}}@endif</textarea>
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
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
