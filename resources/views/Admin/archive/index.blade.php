@extends('layouts.admin.app')
@section('page_name') ارشيف المواعيد @endsection
@section('content')


<!-----------------------------------Start Data Table ------------------------------------->
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
<div class="card mb-5 mb-xl-8 mt-10">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">الارشيف لكل طبيب</span>
        </h3>
        <div class="card-toolbar">
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table id="kt_datatable_example_5" class="table align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                <tr class="fw-bolder text-muted bg-light">
                    <th class="ps-4 min-w-100px rounded-start">الطبيب</th>
                    <th>اليوم</th>
                    <th>الحالة</th>
                    <th class="min-w-200px rounded-end">العمليات</th>
                </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                @foreach($doctors as $doctor)
                    @foreach($dates->where('doctor_id', $doctor->id) as $date)
                        <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-75" onclick="window.open(this.src)" style='cursor: pointer' src={{asset($doctor->image)}}  alt="">
								</span>
                                </div>
                                <div class="d-flex justify-content-start text-left flex-column">
                                    <a href="" class="text-dark fw-bolder text-hover-primary mb-1 fs-5">{{$doctor->name_ar}}</a>
                                    <span class="text-muted fw-bold text-muted d-block fs-6">{{$doctor->clinic->name_ar}}</span>
                                </div>
                            </div>
                    </td>
                        <td>
                                {{ArabicDate($date->date)['ar_day_not_current']}} -
                                {{date('j',strtotime($date->date))}} <!-- return day num -->
                                {{ArabicDate($date->date)['month']}}
                            <br>
                        </td>
                            <td>
{{--                               @if($date->is_reserved == 'no')--}}
                               @if($date['available_hour']->count())
                                   <span class="badge badge-success">لم يحجز كليا</span>
                                @else
                                    <span class="badge badge-danger">حجز بالكامل</span>
                                @endif
                                <br>
                        </td>
                            <td class="">
                                <button data-bs-toggle='modal' data-bs-target="#delete_doctor_day" class="btn btn-icon btn-bg-light btn-danger btn-sm me-1" data-toggle="modal" style="border-radius: 50% !important"
                                data-id="{{$date->id}}"
                        >
                            <span class="svg-icon svg-icon-3">
                                <span class="svg-icon svg-icon-3">
                                    <i class="fa fa-trash"></i>
                                </span>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                            </td>
                </tr>
                @endforeach
                @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
</div>
<!-----------------------------------end Data Table ------------------------------------->

<!-------------------------Start DELETE Form ------------------------------------------------------------>
<div class="modal fade" id="delete_doctor_day" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>حذف يوم</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
																<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
																<rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
															</g>
														</svg>
					</span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-3 mx-xl-15 my-3">
                <!--begin::Form-->
                <form id="kt_modal_new_card_form" class="form" action="{{route('admin/delete_doctor_day')}}" method="post">
                    {{csrf_field()}}

                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                            <h4 class="pb-3">هل انت متاكد من حذف هذا اليوم</h4>
                        <!--end::Label-->
                        <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                        <div class="fv-plugins-message-container invalid-feedback"></div></div>

                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-white me-3" data-bs-dismiss="modal">الغاء</button>
                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-danger">
                            <span class="indicator-label">تأكيد</span>
                            <span class="indicator-progress">Please wait...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!-------------------------End DELETE Form -------------------------------------------------------------->



@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>
<script src="{{url('/')}}/admin/assets/js/sweet.js"></script>

<script>
    $(document).ready(function(){
        //Show data in the delete form
    $('#delete_doctor_day').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
    });

    });
</script>

