@extends('layouts.admin.app')
@section('page_name')ارشيف الحجوزات @endsection
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


    <div class="col-xl-12 mt-10">
        <!--begin::Table Widget 6-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">ارشيف الحجوزات</span>
{{--                    <span class="text-muted mt-1 fw-bold fs-7">يتوفر <span style="color: #0bb445"> {{$new_reservations->count()}}</span> حجوزات جديدة </span>--}}
                    <span class="text-muted mt-1 fw-bold fs-7">يمكنك مراجعة وحذف الارشيف</span>
                </h3>
                <div class="card-toolbar">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1 active" data-bs-toggle="tab" href="#kt_table_widget_6_tab_1">الحجوزات الجديدة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_6_tab_2">الحجوزات المقبولة</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4" data-bs-toggle="tab" href="#kt_table_widget_6_tab_3">الحجوزات المرفوضة</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <div class="tab-content">
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade active show" id="kt_table_widget_6_tab_1">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle gs-0 gy-3">
                                <!--begin::Table head-->
                                <thead>
                                <tr>
                                    <th class="p-0 w-250px"></th>
                                    <th class="p-0 min-w-100px"></th>
                                    <th class="p-0 min-w-80px"></th>
                                    <th class="p-0 min-w-60px"></th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($new_reservations as $reservation)
                                    @if($reservation->date->date <= date('Y-m-d H:i:s'))
                                <tr>
                                    <td>
                                        @if($reservation->doctor)
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-100" onclick="window.open(this.src)" style='cursor: pointer' src={{asset($reservation->doctor->image)}}  alt="">
                                </span>
                                            </div>
                                            <div class="d-flex justify-content-start text-left flex-column">
                                                <a href="" class="text-dark fw-bolder text-hover-primary mb-1 fs-5">{{$reservation->doctor->name_ar}}</a>
                                                <span class="text-muted fw-bold text-muted d-block fs-6">{{$reservation->doctor->clinic->name_ar}}</span>
                                            </div>
                                        </div>
                                        @else
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-100" onclick="window.open(this.src)" style='cursor: pointer' src={{asset($reservation->offer->images->first()->image)}}  alt="">
                                </span>
                                                </div>
                                                <div class="d-flex justify-content-start text-left flex-column">
                                                    <a href="" class="text-dark fw-bolder text-hover-primary mb-1 fs-5">{{$reservation->offer->title_ar}}</a>
{{--                                                    <span class="text-muted fw-bold text-muted d-block fs-6">{{$reservation->doctor->clinic->name_ar}}</span>--}}
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($reservation->doctor)
                                            <span class="text-muted fw-bold d-block fs-7">السعر</span>
                                            <a class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$reservation->doctor->price}}</a>
                                        @else
                                            <span class="text-muted fw-bold d-block fs-7">السعر</span>
                                            <a class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$reservation->offer->new_price}} بدلا من {{$reservation->offer->old_price}}</a>
                                        @endif
                                    </td>
                                    <td>
                                            <span class="text-muted fw-bold d-block fs-7">اسم المريض</span>
                                            <a class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$reservation->name}}</a>
                                    </td>
                                    <td>
                                        <span class="text-muted fw-bold d-block fs-7">اليوم</span>
                                        <span class="text-dark fw-bolder d-block fs-5">
                                            {{ArabicDate($reservation->date->date)['ar_day_not_current']}} -
                                            {{date('j',strtotime($reservation->date->date))}} <!-- return day num -->
                                            {{ArabicDate($reservation->date->date)['month']}}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-primary fs-7 d-block "><br></span>
                                        <span class="text-primary fs-7 fw-bolder d-block ">{{date('h:i A', strtotime($reservation->hour->hour))}}</span>
                                    </td>
                                    <td class="text-center">
                                        <button data-bs-toggle='modal' data-name="{{$reservation->name}}" data-bs-target="#reservation" class="mt-8" data-toggle="modal" style="background-color: transparent;border: 0px"
                                                data-id="{{$reservation->id}}">
                                                         <span class="svg-icon svg-icon-3">
                                                         <span class="svg-icon svg-icon-3">
                                                         <i class="fa fa-trash text-danger"></i>
                                                         </span>
                                                        </span>
                                            <!--end::Svg Icon-->
                                        </button>
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
                    <div class="tab-pane fade" id="kt_table_widget_6_tab_2">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle gs-0 gy-3">
                                <!--begin::Table head-->
                                <thead>
                                <tr>
                                    <th class="p-0 w-250px"></th>
                                    <th class="p-0 min-w-100px"></th>
                                    <th class="p-0 min-w-80px"></th>
                                    <th class="p-0 min-w-60px"></th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($accepted_reservations as $reservation)
                                    @if($reservation->date->date <= date('Y-m-d H:i:s'))
                                        <tr>
                                            <td>
                                                @if($reservation->doctor)
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-100" onclick="window.open(this.src)" style='cursor: pointer' src={{asset($reservation->doctor->image)}}  alt="">
                                </span>
                                                        </div>
                                                        <div class="d-flex justify-content-start text-left flex-column">
                                                            <a href="" class="text-dark fw-bolder text-hover-primary mb-1 fs-5">{{$reservation->doctor->name_ar}}</a>
                                                            <span class="text-muted fw-bold text-muted d-block fs-6">{{$reservation->doctor->clinic->name_ar}}</span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-100" onclick="window.open(this.src)" style='cursor: pointer' src={{asset($reservation->offer->images->first()->image)}}  alt="">
                                </span>
                                                        </div>
                                                        <div class="d-flex justify-content-start text-left flex-column">
                                                            <a href="" class="text-dark fw-bolder text-hover-primary mb-1 fs-5">{{$reservation->offer->title_ar}}</a>
                                                            {{--                                                    <span class="text-muted fw-bold text-muted d-block fs-6">{{$reservation->doctor->clinic->name_ar}}</span>--}}
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if($reservation->doctor)
                                                    <span class="text-muted fw-bold d-block fs-7">السعر</span>
                                                    <a class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$reservation->doctor->price}}</a>
                                                @else
                                                    <span class="text-muted fw-bold d-block fs-7">السعر</span>
                                                    <a class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$reservation->offer->new_price}} بدلا من {{$reservation->offer->old_price}}</a>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="text-muted fw-bold d-block fs-7">اسم المريض</span>
                                                <a class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$reservation->name}}</a>
                                            </td>
                                            <td>
                                                <span class="text-muted fw-bold d-block fs-7">اليوم</span>
                                                <span class="text-dark fw-bolder d-block fs-5">
                                            {{ArabicDate($reservation->date->date)['ar_day_not_current']}} -
                                            {{date('j',strtotime($reservation->date->date))}} <!-- return day num -->
                                                    {{ArabicDate($reservation->date->date)['month']}}</span>
                                                {{date('Y',strtotime($reservation->date->date))}}
                                            </td>
                                            <td class="text-center">
                                                <span class="text-primary fs-7 d-block "><br></span>
                                                <span class="text-primary fs-7 fw-bolder d-block ">{{date('h:i A', strtotime($reservation->hour->hour))}}</span>
                                            </td>
                                            <td class="text-center">
                                                <button data-bs-toggle='modal' data-name="{{$reservation->name}}" data-bs-target="#reservation" class="mt-8" data-toggle="modal" style="background-color: transparent;border: 0px"
                                                        data-id="{{$reservation->id}}">
                                                         <span class="svg-icon svg-icon-3">
                                                         <span class="svg-icon svg-icon-3">
                                                         <i class="fa fa-trash text-danger"></i>
                                                         </span>
                                                        </span>
                                                    <!--end::Svg Icon-->
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Tap pane-->
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="kt_table_widget_6_tab_3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle gs-0 gy-3">
                                <!--begin::Table head-->
                                <thead>
                                <tr>
                                    <th class="p-0 w-250px"></th>
                                    <th class="p-0 min-w-100px"></th>
                                    <th class="p-0 min-w-80px"></th>
                                    <th class="p-0 min-w-60px"></th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($refused_reservations as $reservation)
                                    @if($reservation->date->date <= date('Y-m-d H:i:s'))
                                        <tr>
                                            <td>
                                                @if($reservation->doctor)
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-100" onclick="window.open(this.src)" style='cursor: pointer' src={{asset($reservation->doctor->image)}}  alt="">
                                </span>
                                                        </div>
                                                        <div class="d-flex justify-content-start text-left flex-column">
                                                            <a href="" class="text-dark fw-bolder text-hover-primary mb-1 fs-5">{{$reservation->doctor->name_ar}}</a>
                                                            <span class="text-muted fw-bold text-muted d-block fs-6">{{$reservation->doctor->clinic->name_ar}}</span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-100" onclick="window.open(this.src)" style='cursor: pointer' src={{asset($reservation->offer->images->first()->image)}}  alt="">
                                </span>
                                                        </div>
                                                        <div class="d-flex justify-content-start text-left flex-column">
                                                            <a href="" class="text-dark fw-bolder text-hover-primary mb-1 fs-5">{{$reservation->offer->title_ar}}</a>
                                                            {{--                                                    <span class="text-muted fw-bold text-muted d-block fs-6">{{$reservation->doctor->clinic->name_ar}}</span>--}}
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if($reservation->doctor)
                                                    <span class="text-muted fw-bold d-block fs-7">السعر</span>
                                                    <a class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$reservation->doctor->price}}</a>
                                                @else
                                                    <span class="text-muted fw-bold d-block fs-7">السعر</span>
                                                    <a class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$reservation->offer->new_price}} بدلا من {{$reservation->offer->old_price}}</a>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="text-muted fw-bold d-block fs-7">اسم المريض</span>
                                                <a class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$reservation->name}}</a>
                                            </td>
                                            <td>
                                                <span class="text-muted fw-bold d-block fs-7">اليوم</span>
                                                <span class="text-dark fw-bolder d-block fs-5">
                                            {{ArabicDate($reservation->date->date)['ar_day_not_current']}} -
                                            {{date('j',strtotime($reservation->date->date))}} <!-- return day num -->
                                                    {{ArabicDate($reservation->date->date)['month']}}</span>
                                                {{date('Y',strtotime($reservation->date->date))}}

                                            </td>
                                            <td class="text-center">
                                                <span class="text-primary fs-7 d-block "><br></span>
                                                <span class="text-primary fs-7 fw-bolder d-block ">{{date('h:i A', strtotime($reservation->hour->hour))}}</span>
                                            </td>
                                            <td class="text-center">
                                                <button data-bs-toggle='modal' data-name="{{$reservation->name}}" data-bs-target="#reservation" class="mt-8" data-toggle="modal" style="background-color: transparent;border: 0px"
                                                        data-id="{{$reservation->id}}">
                                                         <span class="svg-icon svg-icon-3">
                                                         <span class="svg-icon svg-icon-3">
                                                         <i class="fa fa-trash text-danger"></i>
                                                         </span>
                                                        </span>
                                                    <!--end::Svg Icon-->
                                                </button>
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
        <!--end::Tables Widget 6-->
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
                    <form id="kt_modal_new_card_form" class="form" action="{{route('admin/archive_reservation_delete')}}" method="post">
                        {{csrf_field()}}

                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <h4 class="pb-3">هل انت متأكد من حذف الحجز الخاص بالمريض التالي من الارشيف ؟</h4>
                            <input type="text" readonly disabled class="form-control form-control-solid fs-3" name="name" id="name" value="">
                            <!--end::Label-->
                            <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="submit" id="kt_modal_new_card_submit" class="btn btn-danger mr-2">
                                <span class="indicator-label"> حذف </span>
                            </button>
                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-white me-3" data-bs-dismiss="modal">
                                <span class="indicator-label"> الغاء </span>
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
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        });

    });
</script>
