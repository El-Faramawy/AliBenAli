@extends('layouts.admin.app')
@section('page_name') حجوزات العروض @endsection
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
                    <span class="card-label fw-bolder fs-3 mb-1"> حجوزات العروض <i class="fa fa-gift"></i></span>
                    {{--                    <span class="text-muted mt-1 fw-bold fs-7">يتوفر <span style="color: #0bb445"> {{$new_reservations->count()}}</span> حجوزات جديدة </span>--}}
                    <span class="text-muted mt-1 fw-bold fs-7">يمكنك التعديل علي الحالات الغير ملغية</span>
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

                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4" data-bs-toggle="tab" href="#kt_table_widget_6_tab_4">الحجوزات المنتهية</a>
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
                                    <th class="p-0 min-w-100px"></th>
                                    <th class="p-0 min-w-80px"></th>
                                    <th class="p-0 min-w-60px"></th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($new_reservations as $reservation)
                                    @if($reservation->offer)
                                        @if($reservation->date->date >= date('Y-m-d H:i:s'))
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-100" onclick="window.open(this.src)" style='cursor: pointer' src={{asset($reservation->offer->first_image->image)}}  alt="">
								</span>
                                                        </div>
                                                        <div class="d-flex justify-content-start text-left flex-column">
                                                            <a href="" class="text-dark fw-bolder text-hover-primary mb-1 fs-5 mr-5">{{$reservation->offer->title_ar}}</a>
                                                            <span class="text-muted fw-bolder text-muted d-block fs-6 mr-5">خصم {{$reservation->offer->offer}} %</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($reservation->is_deleted  == 'yes')
                                                        <span class="text-muted fw-bolder d-block fs-7">المريض <span class="badge badge-danger">تم الالغاء</span></span>
                                                    @else
                                                        <span class="text-muted fw-bolder d-block fs-7">المريض</span>
                                                    @endif
                                                        <p class="text-dark fw-bolder">
                                                            @if($reservation->age != null)
                                                                {{$reservation->age}} سنة || {{$reservation->name}}
                                                        @else
                                                            {{$reservation->name}}
                                                        @endif
                                                </td>
                                                <td>
                                                    <span class="text-muted fw-bolder d-block fs-7">الامراض</span>
                                                    @foreach($diseases as $disease)
                                                        @if($disease->reservation_id != $reservation->id)
                                                            @continue
                                                        @endif
                                                        <span class="text-dark fw-bolder mr-1">{{$disease->diseases->title_ar}} </span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if($reservation->files->count() > 0)
                                                        <span class="text-muted fw-bolder d-block fs-7">المرفقات</span>
                                                        @foreach($reservation->files as $file)
                                                            <a href="{{asset($file->file)}}" target="_blank" title="فتح المرفق" class="btn-sm btn-color-muted btn-active-light-primary fw-bold"
                                                            >
                                                                @if(Str::contains($file->file,'pdf'))
                                                                    <i class="fa fa-file-pdf fs-2"></i>
                                                                @else
                                                                    <i class="fa fa-image fs-2"></i>
                                                                @endif
                                                            </a>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    {{--                                        <span class="text-muted fw-bold d-block fs-7"> <br></span>--}}
                                                    <span class="text-dark fw-bolder d-block fs-5">
                                            {{ArabicDate($reservation->date->date)['ar_day_not_current']}} -
                                            {{date('j',strtotime($reservation->date->date))}} <!-- return day num -->
                                                        {{ArabicDate($reservation->date->date)['month']}}
                                                        @if($reservation->call_type == 'audio')<i class="fa fa-phone-alt"></i>@else <i class="fa fa-video"></i>@endif
                                                    </span>
                                                    <span class="text-primary fs-7 fw-bolder d-block ">{{date('h:i A', strtotime($reservation->hour->hour))}}</span>
                                                </td>
                                                <td class="text-center">
                                                    @if($reservation->is_deleted == 'no')
                                                        <button data-bs-toggle='modal' data-bs-target="#reservation" class="btn btn-sm btn-icon mt-3 btn-bg-light btn-active-color-primary"  data-id = '{{$reservation->id}}' data-user_id = '{{$reservation->user_id}}' data-old="{{$reservation->status}}" data-doctor_id = '{{$reservation->doctor_id}}' data-name='{{$reservation->name}}'>
                                            <span class="svg-icon svg-icon-2">
                                            <i class="fa fa-edit badge-light-grey"></i>
											</span>
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
{{--                        {!! $new_reservations->render() !!}--}}
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
                                    <th class="p-0 min-w-100px"></th>
                                    <th class="p-0 min-w-80px"></th>
                                    <th class="p-0 min-w-60px"></th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($accepted_reservations as $reservation)
{{--                                        @if($reservation->date->date >= date('Y-m-d H:i:s'))--}}
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-100" onclick="window.open(this.src)" style='cursor: pointer' src={{asset($reservation->offer->first_image->image)}}  alt="">
								</span>
                                                        </div>
                                                        <div class="d-flex justify-content-start text-left flex-column">
                                                            <a href="" class="text-dark fw-bolder text-hover-primary mb-1 fs-5 mr-5">{{$reservation->offer->title_ar}}</a>
                                                            <span class="text-muted fw-bolder text-muted d-block fs-6 mr-5">خصم {{$reservation->offer->offer}} %</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($reservation->is_deleted  == 'yes')
                                                        <span class="text-muted fw-bolder d-block fs-7">المريض <span class="badge badge-danger">تم الالغاء</span></span>
                                                    @else
                                                        <span class="text-muted fw-bolder d-block fs-7">المريض</span>
                                                    @endif
                                                        <p class="text-dark fw-bolder">
                                                            @if($reservation->age != null)
                                                                {{$reservation->age}} سنة || {{$reservation->name}}
                                                        @else
                                                            {{$reservation->name}}
                                                        @endif
                                                </td>
                                                <td>
                                                    <span class="text-muted fw-bolder d-block fs-7">الامراض</span>
                                                    @foreach($diseases as $disease)
                                                        @if($disease->reservation_id != $reservation->id)
                                                            @continue
                                                        @endif
                                                        <span class="text-dark fw-bolder mr-1">{{$disease->diseases->title_ar}}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if($reservation->files->count() > 0)
                                                        <span class="text-muted fw-bolder d-block fs-7">المرفقات</span>
                                                        @foreach($reservation->files as $file)
                                                            <a href="{{asset($file->file)}}" target="_blank" title="فتح المرفق" class="btn-sm btn-color-muted btn-active-light-primary fw-bold"
                                                            >
                                                                @if(Str::contains($file->file,'pdf'))
                                                                    <i class="fa fa-file-pdf fs-2"></i>
                                                                @else
                                                                    <i class="fa fa-image fs-2"></i>
                                                                @endif
                                                            </a>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    {{--                                        <span class="text-muted fw-bold d-block fs-7"> <br></span>--}}
                                                    <span class="text-dark fw-bolder d-block fs-5">
                                            {{ArabicDate($reservation->date->date)['ar_day_not_current']}} -
                                            {{date('j',strtotime($reservation->date->date))}} <!-- return day num -->
                                                        {{ArabicDate($reservation->date->date)['month']}}
                                                        @if($reservation->call_type == 'audio')<i class="fa fa-phone-alt"></i>@else <i class="fa fa-video"></i>@endif
                                                    </span>
                                                    <span class="text-primary fs-7 fw-bolder d-block ">{{date('h:i A', strtotime($reservation->hour->hour))}}</span>
                                                </td>
                                                <td class="text-center">
                                                    @if($reservation->is_deleted == 'no')
                                                        <button data-bs-toggle='modal' data-bs-target="#reservation" class="btn btn-sm mt-3 btn-icon btn-bg-light btn-active-color-primary" data-id = '{{$reservation->id}}'  data-doctor_id = '{{$reservation->doctor_id}}'  data-old="{{$reservation->status}}" data-user_id = '{{$reservation->user_id}}' data-name='{{$reservation->name}}'>
                                            <span class="svg-icon svg-icon-2">
                                            <i class="fa fa-edit badge-light-grey"></i>
											</span>
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
{{--                                    @endif--}}
                                @endforeach
                                </tbody>                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
{{--                        {!! $accepted_reservations->render() !!}--}}
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
                                    <th class="p-0 min-w-100px"></th>
                                    <th class="p-0 min-w-80px"></th>
                                    <th class="p-0 min-w-60px"></th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($refused_reservations as $reservation)
                                        @if($reservation->date->date >= date('Y-m-d H:i:s'))
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-100" onclick="window.open(this.src)" style='cursor: pointer' src={{asset($reservation->offer->first_image->image)}}  alt="">
								</span>
                                                        </div>
                                                        <div class="d-flex justify-content-start text-left flex-column">
                                                            <a href="" class="text-dark fw-bolder text-hover-primary mb-1 fs-5 mr-5">{{$reservation->offer->title_ar}}</a>
                                                            <span class="text-muted fw-bolder text-muted d-block fs-6 mr-5">خصم {{$reservation->offer->offer}} %</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($reservation->is_deleted  == 'yes')
                                                        <span class="text-muted fw-bolder d-block fs-7">المريض <span class="badge badge-danger">تم الالغاء</span></span>
                                                    @else
                                                        <span class="text-muted fw-bolder d-block fs-7">المريض</span>
                                                    @endif
                                                        <p class="text-dark fw-bolder">
                                                            @if($reservation->age != null)
                                                                {{$reservation->age}} سنة || {{$reservation->name}}
                                                        @else
                                                            {{$reservation->name}}
                                                        @endif
                                                </td>
                                                <td>
                                                    <span class="text-muted fw-bolder d-block fs-7">الامراض</span>
                                                    @foreach($diseases as $disease)
                                                        @if($disease->reservation_id != $reservation->id)
                                                            @continue
                                                        @endif
                                                        <span class="text-dark fw-bolder mr-1">{{$disease->diseases->title_ar}} </span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if($reservation->files->count() > 0)
                                                        <span class="text-muted fw-bolder d-block fs-7">المرفقات</span>
                                                        @foreach($reservation->files as $file)
                                                            <a href="{{asset($file->file)}}" target="_blank" title="فتح المرفق" class="btn-sm btn-color-muted btn-active-light-primary fw-bold"
                                                            >
                                                                @if(Str::contains($file->file,'pdf'))
                                                                    <i class="fa fa-file-pdf fs-2"></i>
                                                                @else
                                                                    <i class="fa fa-image fs-2"></i>
                                                                @endif
                                                            </a>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    {{--                                        <span class="text-muted fw-bold d-block fs-7"> <br></span>--}}
                                                    <span class="text-dark fw-bolder d-block fs-5">
                                            {{ArabicDate($reservation->date->date)['ar_day_not_current']}} -
                                            {{date('j',strtotime($reservation->date->date))}} <!-- return day num -->
                                                        {{ArabicDate($reservation->date->date)['month']}}
                                                        @if($reservation->call_type == 'audio')<i class="fa fa-phone-alt"></i>@else <i class="fa fa-video"></i>@endif
                                                    </span>
                                                    <span class="text-primary fs-7 fw-bolder d-block ">{{date('h:i A', strtotime($reservation->hour->hour))}}</span>
                                                </td>
                                                <td class="text-center">
                                                    @if($reservation->is_deleted == 'no')
                                                        <button data-bs-toggle='modal' data-bs-target="#reservation" class="btn btn-sm mt-3 btn-icon btn-bg-light btn-active-color-primary" data-id = '{{$reservation->id}}' data-old="{{$reservation->status}}" data-user_id = '{{$reservation->user_id}}'  data-doctor_id = '{{$reservation->doctor_id}}' data-name='{{$reservation->name}}'>
                                            <span class="svg-icon svg-icon-2">
                                            <i class="fa fa-edit badge-light-grey"></i>
											</span>
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
{{--                        {!! $refused_reservations->render() !!}--}}
                    </div>
                    <!--end::Tap pane-->
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade" id="kt_table_widget_6_tab_4">
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
                                @foreach($ended_reservations as $reservation)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-100" onclick="window.open(this.src)" style='cursor: pointer' src={{asset($reservation->offer->first_image->image)}}  alt="">
								</span>
                                                    </div>
                                                    <div class="d-flex justify-content-start text-left flex-column">
                                                        <a href="" class="text-dark fw-bolder text-hover-primary mb-1 fs-5 mr-5">{{$reservation->offer->title_ar}}</a>
                                                        <span class="text-muted fw-bolder text-muted d-block fs-6 mr-5">خصم {{$reservation->offer->offer}} %</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @if($reservation->is_deleted  == 'yes')
                                                    <span class="text-muted fw-bolder d-block fs-7">المريض <span class="badge badge-danger">تم الالغاء</span></span>
                                                @else
                                                    <span class="text-muted fw-bolder d-block fs-7">المريض</span>
                                                @endif
                                                    <p class="text-dark fw-bolder">
                                                        @if($reservation->age != null)
                                                            {{$reservation->age}} سنة || {{$reservation->name}}
                                                    @else
                                                        {{$reservation->name}}
                                                    @endif                                            </td>
                                            <td>
                                                <span class="text-muted fw-bolder d-block fs-7">الامراض</span>
                                                @foreach($diseases as $disease)
                                                    @if($disease->reservation_id != $reservation->id)
                                                        @continue
                                                    @endif
                                                    <span class="text-dark fw-bolder mr-1">{{$disease->diseases->title_ar}} </span>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($reservation->files->count() > 0)
                                                    <span class="text-muted fw-bolder d-block fs-7">المرفقات</span>
                                                    @foreach($reservation->files as $file)
                                                        <a href="{{asset($file->file)}}" target="_blank" title="فتح المرفق" class="btn-sm btn-color-muted btn-active-light-primary fw-bold"
                                                        >
                                                            @if(Str::contains($file->file,'pdf'))
                                                                <i class="fa fa-file-pdf fs-2"></i>
                                                            @else
                                                                <i class="fa fa-image fs-2"></i>
                                                            @endif
                                                        </a>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <span class="text-success fs-7 fw-bolder d-block ">{{date('h:i A', strtotime($reservation->hour->hour))}}</span>
                                                <span class="text-dark fw-bolder d-block fs-5">
                                            {{ArabicDate($reservation->date->date)['ar_day_not_current']}} -
                                            {{date('j',strtotime($reservation->date->date))}} <!-- return day num -->
                                                    {{ArabicDate($reservation->date->date)['month']}}
                                                    @if($reservation->call_type == 'audio')<i class="fa fa-phone-alt"></i>@else <i class="fa fa-video"></i>@endif
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                @if($reservation->reports->count() >0)
                                                    <span class="text-muted fw-bolder d-block fs-7 mb-2">التقارير</span>
                                                    @foreach($reservation->reports as $report)
                                                        <a href="{{asset('uploads/reports/'.$report->report)}}" target="_blank" title="فتح التقرير" class="btn-sm btn-color-muted btn-active-light-primary fw-bold"
                                                        >
                                                            @if(Str::contains($report->report,'pdf'))
                                                                <i class="fa fa-file-pdf fs-2"></i>
                                                            @else
                                                                <i class="fa fa-image fs-2"></i>
                                                            @endif
                                                        </a>
                                                        {{--                                                        @if($loop->iteration == 2)<br>@endif--}}
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <button data-bs-toggle='modal' data-bs-target="#delete" class="btn btn-sm mt-3 btn-icon btn-bg-light btn-active-color-danger" data-id = '{{$reservation->id}}' data-user_id = '{{$reservation->user_id}}'  data-doctor_id = '{{$reservation->doctor_id}}' data-name='{{$reservation->name}}'>
                                            <span class="svg-icon svg-icon-2">
                                            <i class="fa fa-trash"></i>
											</span>
                                                </button>
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <!--end::Table-->
{{--                        {!! $ended_reservations->render() !!}--}}
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
                    <form id="kt_modal_new_card_form" class="form" action="{{route('admin.reservation.edit')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" id="user_id" name="user_id">
                        <input type="hidden" id="doctor_id" name="doctor_id">
                        <input type="hidden" id="old" name="old">
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <h4 class="pb-3">اختار العملية المناسية لحجز المريض التالي</h4>
                            <input type="text" readonly disabled class="form-control form-control-solid fs-3" name="name" id="name" value="">
                            <input type="hidden" readonly class="form-control form-control-solid fs-3" name="status" id="status" value="">
                            <!--end::Label-->
                            <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="submit" onclick="$('#status').val('ended')" id="to_end" class="btn btn-primary mr-2">
                                <span class="indicator-label"> انهاء <i class="fa fa-check"></i></span>
                            </button>
                            <button type="submit" onclick="$('#status').val('accepted')" id="to_accept" class="btn btn-success mr-2">
                                <span class="indicator-label"> قبول <i class="fa fa-check"></i></span>
                            </button>
                            <button type="submit" onclick="$('#status').val('refused')" id="to_refuse" class="btn btn-danger mr-2">
                                <span class="indicator-label"> رفض <i class="fa fa-times"></i></span>
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

    <!-------------------------Start Delete Form ------------------------------------------------------------>
    <div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>حذف حجز</h2>
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
                    <form id="kt_modal_new_card_form" class="form" action="{{route('admin.reservation.delete')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" id="user_id" name="user_id">
                        <input type="hidden" id="doctor_id" name="doctor_id">
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <h4 class="pb-1">سيتم حذف جميع بيانات الحجز التالي هل تريد المتابعة ؟</h4>
                            <div class="form-text text-danger mb-4">لن يستطيع المريض الوصول لتقارير الحجز مجددا</div>
                            <input type="text" readonly disabled class="form-control form-control-solid fs-3" name="name" id="name" value="">
                            <input type="hidden" readonly class="form-control form-control-solid fs-3" name="status" id="status" value="">
                            <!--end::Label-->
                            <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="submit" id="kt_modal_new_card_submit" class="btn btn-success mr-2">
                                <span class="indicator-label"> متابعة <i class="fa fa-check"></i></span>
                            </button>
                            <button data-bs-dismiss="modal" id="kt_modal_new_card_submit" class="btn btn-color-gray-700 mr-2">
                                <span class="indicator-label"> اغلاق <i class="fa fa-times"></i></span>
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
    <!-------------------------End Delete Form -------------------------------------------------------------->

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
            var old = button.data('old')
            var modal = $(this)
            if(old == 'accepted'){
                $('#to_accept').addClass('d-none');
                $('#to_end').removeClass('d-none');
            }
            else{
                $('#to_accept').removeClass('d-none');
                $('#to_end').addClass('d-none');
            }
            if(old == 'refused'){
                $('#to_refuse').addClass('d-none');
            }
            else{
                $('#to_refuse').removeClass('d-none');
            }
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #old').val(old);
            modal.find('.modal-body #user_id').val(user_id);
            modal.find('.modal-body #doctor_id').val(doctor_id);
        });
        //Show data in the delete form
        $('#delete').on('show.bs.modal', function(event) {
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
