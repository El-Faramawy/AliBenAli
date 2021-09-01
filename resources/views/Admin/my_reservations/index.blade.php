@extends('layouts.admin.app')
@section('page_name') الحجوزات @endsection
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

    <div class="mt-10">
        <!--begin::Table Widget 8-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">قائمة الحجوزات</span>
{{--                    <span class="text-muted mt-1 fw-bold fs-7">More than 100 new orders</span>--}}
                </h3>
                <div class="card-toolbar">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1 active" data-bs-toggle="tab" href="#kt_table_widget_8_tab_1">القادمة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_8_tab_2">السابقة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_8_tab_3">المنتهية</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <div class="tab-content">
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade active show" id="kt_table_widget_8_tab_1">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle gs-0 gy-3">
                                <!--begin::Table head-->
                                <thead>
                                <tr>
                                    <th class="p-0"></th>
                                    <th class="p-0 min-w-150px"></th>
                                    <th class="p-0 min-w-120px"></th>
                                    <th class="p-0 min-w-120px"></th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($reservations as $reservation)
                                    @if($reservation->status == 'accepted' && $reservation->date->date >= date('Y-m-d H:i'))
                                <tr>
                                    <td>
                                        <p class="text-gray-600 fw-bolder mb-1 fs-7">المريض</p>
                                        <p class="text-dark fw-bolder">
                                        @if($reservation->age != null)
                                            {{$reservation->age}} سنة || {{$reservation->name}}
                                        @else
                                                {{$reservation->name}}
                                        @endif
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-gray-600 fw-bolder mb-1 fs-7">الامراض المزمنة</p>

                                        @foreach($diseases as $disease)
                                             @if($disease->reservation_id != $reservation->id)
                                                @continue
                                             @endif
                                            <span class="text-dark fw-bolder mr-1 fs-6">{{$disease->diseases->title_ar}} </span>
                                        @endforeach

                                    </td>
                                    <td class="text-end">
                                    @if($reservation->files->count() > 0)
                                            <p class="text-gray-600 fw-bolder mb-1 fs-7">المرفق</p>
                                            @foreach($reservation->files as $file)
                                            <a class="btn btn-sm btn-color-muted btn-active-light-primary fw-bolder px-4 me-1" href="{{asset($file->file)}}" target="_blank">عرض <i class="fa fa-eye"></i> </a>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <span class="text-dark fw-bolder d-block fs-7">                                        <span class="text-dark fw-bolder d-block fs-5">
                                            {{ArabicDate($reservation->date->date)['ar_day_not_current']}} -
                                            {{date('j',strtotime($reservation->date->date))}} <!-- return day num -->
                                                {{ArabicDate($reservation->date->date)['month']}}</span>
                                                 {{date('Y',strtotime($reservation->date->date))}}

                                        </span>
                                        <span class="text-primary fw-bolder d-block fs-8">{{date('h:i A', strtotime($reservation->hour->hour))}}</span>
                                    </td>
                                </tr>
                                    @endif
                                @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Tap pane-->
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="kt_table_widget_8_tab_2">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle gs-0 gy-3">
                                <!--begin::Table head-->
                                <thead>
                                <tr>
                                    <th class="p-0"></th>
                                    <th class="p-0 min-w-150px"></th>
                                    <th class="p-0 min-w-120px"></th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($reservations as $reservation)
                                    @if($reservation->status == 'accepted' && $reservation->date->date < date('Y-m-d H:i'))
                                        <tr>
                                            <td>
                                                <p class="text-gray-600 fw-bolder mb-1 fs-7">المريض</p>
                                                <p class="text-dark fw-bolder">
                                                    @if($reservation->age != null)
                                                        {{$reservation->age}} سنة || {{$reservation->name}}
                                                    @else
                                                        {{$reservation->name}}
                                                    @endif                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-gray-600 fw-bolder mb-1 fs-7">الامراض المزمنة</p>
                                                @foreach($diseases as $disease)
                                                    @if($disease->reservation_id != $reservation->id)
                                                        @continue
                                                    @endif
                                                    <span class="text-dark fw-bolder mr-1 fs-6">{{$disease->diseases->title_ar}} </span>
                                                @endforeach
                                            </td>
                                            <td class="text-end">
                                        <span class="text-dark fw-bolder d-block fs-7">                                        <span class="text-dark fw-bolder d-block fs-5">
                                            {{ArabicDate($reservation->date->date)['ar_day_not_current']}} -
                                            {{date('j',strtotime($reservation->date->date))}} <!-- return day num -->
                                                {{ArabicDate($reservation->date->date)['month']}}</span>
                                                    {{date('Y',strtotime($reservation->date->date))}}

                                        </span>
                                                <span class="text-primary fw-bolder d-block fs-8">{{date('h:i A', strtotime($reservation->hour->hour))}}</span>
                                            </td>
                                            <td class="text-end">
                                              <a data-bs-toggle='modal' data-bs-target="#reservation" class="btn btn-sm btn-icon mt-3 btn-bg-light btn-active-color-primary"  data-id = '{{$reservation->id}}' data-user_id = '{{$reservation->user_id}}' data-doctor_id = '{{$reservation->doctor_id}}' data-name='{{$reservation->name}}'>
                                                  <i class="fa fa-check fs-5"></i>
                                              </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Tap pane-->
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="kt_table_widget_8_tab_3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle gs-0 gy-3">
                                <!--begin::Table head-->
                                <thead>
                                <tr>
                                    <th class="p-0"></th>
                                    <th class="p-0 min-w-150px"></th>
                                    <th class="p-0 min-w-120px"></th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($reservations as $reservation)
                                    @if($reservation->status == 'ended')
                                        <tr>
                                            <td>
                                                <p class="text-gray-600 fw-bolder mb-1 fs-7">المريض</p>
                                                <p class="text-dark fw-bolder">
                                                    @if($reservation->age != null)
                                                        {{$reservation->age}} سنة || {{$reservation->name}}
                                                    @else
                                                        {{$reservation->name}}
                                                    @endif                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-gray-600 fw-bolder mb-1 fs-7">الامراض المزمنة</p>
                                                @foreach($diseases as $disease)
                                                    @if($disease->reservation_id != $reservation->id)
                                                        @continue
                                                    @endif
                                                    <span class="text-dark fw-bolder mr-1 fs-6">{{$disease->diseases->title_ar}} </span>
                                                @endforeach
                                            </td>
                                            <td class="text-end">
                                        <span class="text-dark fw-bolder d-block fs-7">                                        <span class="text-dark fw-bolder d-block fs-5">
                                            {{ArabicDate($reservation->date->date)['ar_day_not_current']}} -
                                            {{date('j',strtotime($reservation->date->date))}} <!-- return day num -->
                                            {{ArabicDate($reservation->date->date)['month']}}</span>
                                          {{date('Y',strtotime($reservation->date->date))}}
                                        </span>
                                                <span class="text-primary fw-bolder d-block fs-8">{{date('h:i A', strtotime($reservation->hour->hour))}}</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="{{route('doctor.upload_file',$reservation->id)}}" title="رفع تقرير" class="btn btn-sm btn-icon mt-3 btn-bg-light btn-active-color-primary">
                                                    <i class="fa fa-upload fs-5"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Tap pane-->
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Tables Widget 8-->
    </div>

    <!-------------------------Start Reservation Form ------------------------------------------------------------>
    <div class="modal fade" id="reservation" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>تعديل حجز</h2>
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
                    <form id="kt_modal_new_card_form" class="form" action="{{route('doctor.reservation.edit')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" id="user_id" name="user_id">
                        <input type="hidden" id="doctor_id" name="doctor_id">
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <h4 class="pb-3">سيتم انهاء الحجز للمريض التالي هل تريد المتابعة ؟</h4>
                            <input type="text" readonly disabled class="form-control form-control-solid fs-3" name="name" id="name" value="">
                            <input type="hidden" readonly class="form-control form-control-solid fs-3" name="status" id="status" value="">
                            <!--end::Label-->
                            <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="submit" onclick="$('#status').val('ended')" id="kt_modal_new_card_submit" class="btn btn-success mr-2">
                                <span class="indicator-label"> انهاء <i class="fa fa-check"></i></span>
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
    <!-------------------------End Reservation Form -------------------------------------------------------------->







@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>
<script src="{{url('/')}}/admin/assets/js/sweet.js"></script>

<script>
    $(document).ready(function(){
        //Show data in the delete form
        $('#reservation').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var user_id = button.data('user_id')
            var doctor_id = button.data('doctor_id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #user_id').val(user_id);
            modal.find('.modal-body #doctor_id').val(doctor_id);
        });

    });
</script>
