@extends('layouts.admin.app')
@section('page_name') ايام العروض @endsection
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
            <span class="card-label fw-bolder fs-3 mb-1">الايام الخاصة ب ({{$offer->title_ar}})</span>
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
                    <th class="min-w-50px">#</th>
                    <th>اليوم</th>
                    <th>الساعات المتاحة</th>
                    <th class="min-w-200px rounded-end">العمليات</th>
                </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                @foreach($dates as $date)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        {{ArabicDate($date->date)['ar_day_not_current']}} -
                        {{date('j',strtotime($date->date))}} <!-- return day num -->
                        {{ArabicDate($date->date)['month']}}
                    </td>
                        <td>
                            @if($date->hour->count() == 0)
                                <span class="badge badge-danger mt-1">لم يتم الاضافة</span>
                            @else
                            @foreach($date->hour as $hours)
                                <span class="badge badge-success mt-1">{{date('h:i A', strtotime($hours->hour))}}</span>
                                @if($loop->iteration == 3)<br>@endif
                            @endforeach
                            @endif
                        </td>

                        <td>
                            <button data-bs-toggle='modal' data-bs-target="#add_hour" class="fs-6" data-toggle="modal" style="background-color: transparent;border: 0px"
                                    data-id="{{$date->id}}" data-name="{{ArabicDate($date->date)['ar_day_not_current']}}-{{date('j',strtotime($date->date))}} {{ArabicDate($date->date)['month']}}" data-offer_id="{{$offer->id}}">
                                <span class="badge badge-light-success fs-6">
                                    اضافة ساعة
                                    <i class="fa fa-calendar-alt fs-3 text-success"></i>
                                </span>
                            </button>
                            @if($date->hour->count() > 0)
                            <button data-bs-toggle='modal' data-bs-target="#hour_offer" class="fs-6" data-toggle="modal" style="background-color: transparent;border: 0px"
                                data-id="{{$date->id}}" data-name="{{ArabicDate($date->date)['ar_day_not_current']}}-{{date('j',strtotime($date->date))}} {{ArabicDate($date->date)['month']}}"
                                data-count = '{{$date->hour->count()}}'
                                @foreach($date->hour as $hours)
                                data-hour{{$loop->iteration}}   = "{{date('h:i A', strtotime($hours->hour))}}"
                                data-status{{$loop->iteration}} = "{{$hours->is_reserved}}"
                                data-id{{$loop->iteration}}     = "{{$hours->id}}"
                                @endforeach
                        >
                                <span class="badge badge-light-primary fs-6">
                                    تعديل الساعات
                                    <i class="fa fa-clock fs-3 text-primary"></i>
                                </span>
                            <!--end::Svg Icon-->
                        </button>
                            @endif
                        <button data-bs-toggle='modal' data-bs-target="#delete_offer" class="fs-6" data-toggle="modal" style="background-color: transparent;border: 0px"
                                data-id="{{$date->id}}" data-name="{{ArabicDate($date->date)['ar_day_not_current']}}-{{date('j',strtotime($date->date))}} {{ArabicDate($date->date)['month']}}">
                                <span class="badge badge-light-danger fs-6">
                                    الغاء اليوم
                                    <i class="bi-arrow-clockwise fs-3 text-danger"></i>
                                </span>
                            <!--end::Svg Icon-->
                        </button>
                    </td>
                    </tr>
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

<!-------------------------Start DELETE modal ------------------------------------------------------------>
<div class="modal fade" id="delete_offer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>الغاء يوم</h2>
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
                <form id="kt_modal_new_card_form" class="form" action="{{route('admin.offer.cancel.day')}}" method="post">
                    {{csrf_field()}}

                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <h4 class="pb-3">هل انت متاكد من الغاء اليوم التالي ؟</h4>
                        <!--end::Label-->
                        <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                        <input type="text" disabled class="form-control form-control-solid fs-2" placeholder="" name="name" id="name" value="">
                        <div class="fv-plugins-message-container invalid-feedback"></div></div>

                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-white me-3" data-bs-dismiss="modal">تراجع</button>
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
<!-------------------------End DELETE modal -------------------------------------------------------------->

<!-------------------------Start ADDHOUR modal ------------------------------------------------------------>
<div class="modal fade" id="add_hour" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>اضافة ساعات</h2>
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
                <form id="kt_modal_new_card_form" class="form" action="{{route('admin.offer.add.hour')}}" method="post">
                    {{csrf_field()}}

                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <h4 class="pb-3">اضف ساعات جديدة للعرض الخاص بيوم <span id="name" class="fs-2"></span></h4>
                        <!--end::Label-->
                        <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                        <input type="hidden" class="form-control form-control-solid pt" name="doctor_id" id="doctor_id" value="">
                        <select class="js-example-basic-multiple" name="hours[]" multiple="multiple" style="width:100%; overflow: scroll" >
                            <option value="" disabled> يرجي اختيار الساعة </option>
                            @for ($am =1; $am <= 12; $am++)
                                <option value="{{ $am . ':' . '00'}}">{{ $am. ':' . '00' . ' AM' }} </option>
                            @endfor

                            @for ($pm =13; $pm <= 24; $pm++)
                                <option value="{{ $pm . ':' . '00'}}">{{ $pm. ':' . '00' . ' PM' }} </option>
                            @endfor
                        </select>
                        <div class="fv-plugins-message-container invalid-feedback"></div></div>

                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-white me-3" data-bs-dismiss="modal">تراجع</button>
                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
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

<!-------------------------End ADDHOUR modal -------------------------------------------------------------->

<!-------------------------Start HOURS modal ------------------------------------------------------------>
<div class="modal fade" id="hour_offer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>الغاء ساعة</h2>
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
                <form id="kt_modal_new_card_form" class="form" action="{{route('admin.offer.cancel.hour')}}" method="post">
                    {{csrf_field()}}

                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <h4 class="pb-3"> الساعات الخاصة بيوم <span class="pb-3 fs-2" id="day"></span></h4>
                        <!--end::Label-->
                        <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                        <div class="nav flex-column" id="addHere">
                            <!--begin::Tab link-->
                            <!--end::Tab link-->
                        </div>
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-white me-3" data-bs-dismiss="modal">تراجع</button>
                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-danger">
                            <span class="indicator-label">حذف</span>
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
<!-------------------------End DELETE modal -------------------------------------------------------------->



@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>
<script src="{{url('/')}}/admin/assets/js/sweet.js"></script>


<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>

<script>
    $(document).ready(function(){
        //Show data in the delete form
        $('#delete_offer').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        });
        $('#add_hour').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var doctor_id = button.data('doctor_id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').text('');
            modal.find('.modal-body #name').text(name);
            modal.find('.modal-body #doctor_id').val(doctor_id);
        });
        $('#hour_offer').on('show.bs.modal', function(event) {
            var i ;
            var hour =[];
            var status =[];
            var hour_id =[];
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var count = button.data('count')
            for(i = 1 ; i <= count ; i ++) {
                hour[i]   = button.data("hour" + i)
                status[i] = button.data("status" + i)
                hour_id[i] = button.data("id" + i)
            }
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #day').text('');
            modal.find('.modal-body #day').append(name);
            modal.find('.modal-body #addHere').text('');
            for ( i = 1 ;  i <=  count ; i ++ ) {
                var y = (status[i] == 'yes') ? 'محجوزة' : 'غير محجوزة';
                var s = (status[i] == 'yes') ? 'success ' : 'danger ';
                modal.find('.modal-body #addHere').append('<div class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-6 mb-6" data-bs-toggle="tab" data-bs-target="#kt_upgrade_plan_enterprise">' + hour[i] + '<div class="d-flex align-items-center me-2"><div class="form-check form-check-custom form-check-solid form-check-success me-6"><input class="form-check-input" type="radio" name="hour_id" value="'+hour_id[i]+'"></div><div class="flex-grow-1"><h2 class="d-flex align-items-center fs-2 fw-bolder flex-wrap"><span class="badge badge-light-'+s+'ms-2 fs-7">' + y + '</span></h2></div></div></div>');
            }
        });
    });
</script>
@push('admin_js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

@endpush


