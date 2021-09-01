@extends('layouts.admin.app')
@section('page_name') رؤيتنا @endsection
@section('content')
    <style>.timeline-label:before{right: 75px}</style>

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

// footer: '<a href="{{route('doctor.my.reservations')}}">Why do I have this issue?</a>'
            })
        </script>
    @endif


    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Navbar-->
                <div class="card mb-5 mb-xl-10">
                    <div class="card-body pt-9 pb-0">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                            <!--begin: Pic-->
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <img src="{{asset($doctor->image)}}" alt="image">
                                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::User-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center mb-2">
                                            <a class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1">{{$doctor->name_ar}}</a>
                                            <a>
                                                <!--begin::Svg Icon | path: icons/duotone/Design/Verified.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-primary">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF"></path>
																		<path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white"></path>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <a href="{{route('doctor.my.reservations')}}" class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3">عرض الحجوزات</a>
                                        </div>
                                        <!--end::Name-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                            <a class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                <!--begin::Svg Icon | path: icons/duotone/General/User.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"></polygon>
																		<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																		<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
																	</g>
																</svg>
															</span>
                                                <!--end::Svg Icon-->{{$doctor->category_ar}}</a>
                                            <a class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                <!--begin::Svg Icon | path: icons/duotone/Map/Marker1.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"></path>
																	</g>
																</svg>
															</span>
                                                <!--end::Svg Icon-->{{$doctor->clinic->name_ar}}</a>
                                            <a class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                <!--begin::Svg Icon | path: icons/duotone/Communication/Mail-at.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
																<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<path d="M11.575,21.2 C6.175,21.2 2.85,17.4 2.85,12.575 C2.85,6.875 7.375,3.05 12.525,3.05 C17.45,3.05 21.125,6.075 21.125,10.85 C21.125,15.2 18.825,16.925 16.525,16.925 C15.4,16.925 14.475,16.4 14.075,15.65 C13.3,16.4 12.125,16.875 11,16.875 C8.25,16.875 6.85,14.925 6.85,12.575 C6.85,9.55 9.05,7.1 12.275,7.1 C13.2,7.1 13.95,7.35 14.525,7.775 L14.625,7.35 L17,7.35 L15.825,12.85 C15.6,13.95 15.85,14.825 16.925,14.825 C18.25,14.825 19.025,13.725 19.025,10.8 C19.025,6.9 15.95,5.075 12.5,5.075 C8.625,5.075 5.05,7.75 5.05,12.575 C5.05,16.525 7.575,19.1 11.575,19.1 C13.075,19.1 14.625,18.775 15.975,18.075 L16.8,20.1 C15.25,20.8 13.2,21.2 11.575,21.2 Z M11.4,14.525 C12.05,14.525 12.7,14.35 13.225,13.825 L14.025,10.125 C13.575,9.65 12.925,9.425 12.3,9.425 C10.65,9.425 9.45,10.7 9.45,12.375 C9.45,13.675 10.075,14.525 11.4,14.525 Z" fill="#000000"></path>
																</svg>
															</span>
                                                <!--end::Svg Icon-->{{$doctor->email}}</a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Title-->
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap flex-stack">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <!--begin::Stats-->
                                        <div class="d-flex flex-wrap">
                                            <!--begin::Stat-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->
                                                    <span class="svg-icon svg-icon-3 svg-icon-success me-2">
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<polygon points="0 0 24 0 24 24 0 24"></polygon>
																				<rect fill="#000000" opacity="0.5" x="11" y="5" width="2" height="14" rx="1"></rect>
																				<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"></path>
																			</g>
																		</svg>
																	</span>
                                                    <!--end::Svg Icon-->
{{--                                                    <div class="fs-2 fw-bolder counted" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$">{{$doctor_reservation_ok}}</div>--}}
                                                    <?php $i = 0 ?>
                                                    @foreach($doctor->reservation as $reservation)
                                                        @if($reservation->date->date >= date('Y-m-d H:i:s'))
                                                            <?php $i++ ?>
                                                        @endif
                                                    @endforeach
                                                    <div class="fs-2 fw-bolder counted" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$">{{$doctor->reservation->where('status','accepted')->count()}}</div>
                                                </div>
                                                <!--end::Number-->
                                                <!--begin::Label-->
                                                <div class="fw-bold fs-6 text-gray-400">الحجوزات المقبولة</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->
                                            <!--begin::Stat-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-down.svg-->
                                                    <span class="svg-icon svg-icon-3 svg-icon-danger me-2">
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<polygon points="0 0 24 0 24 24 0 24"></polygon>
																				<rect fill="#000000" opacity="0.5" x="11" y="5" width="2" height="14" rx="1"></rect>
																				<path d="M6.70710678,18.7071068 C6.31658249,19.0976311 5.68341751,19.0976311 5.29289322,18.7071068 C4.90236893,18.3165825 4.90236893,17.6834175 5.29289322,17.2928932 L11.2928932,11.2928932 C11.6714722,10.9143143 12.2810586,10.9010687 12.6757246,11.2628459 L18.6757246,16.7628459 C19.0828436,17.1360383 19.1103465,17.7686056 18.7371541,18.1757246 C18.3639617,18.5828436 17.7313944,18.6103465 17.3242754,18.2371541 L12.0300757,13.3841378 L6.70710678,18.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 14.999999) scale(1, -1) translate(-12.000003, -14.999999)"></path>
																			</g>
																		</svg>
																	</span>
                                                    <!--end::Svg Icon-->
                                                    <div class="fs-2 fw-bolder counted" data-kt-countup="true" data-kt-countup-value="75">{{$doctor->reservation->where('status','ended')->count()}}</div>
                                                </div>
                                                <!--end::Number-->
                                                <!--begin::Label-->
                                                <div class="fw-bold fs-6 text-gray-400">الحجوزات المنتهية</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->
{{--                                            <!--begin::Stat-->--}}
{{--                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">--}}
{{--                                                <!--begin::Number-->--}}
{{--                                                <div class="d-flex align-items-center">--}}
{{--                                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->--}}
{{--                                                    <span class="svg-icon svg-icon-3 svg-icon-success me-2">--}}
{{--																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--																				<polygon points="0 0 24 0 24 24 0 24"></polygon>--}}
{{--																				<rect fill="#000000" opacity="0.5" x="11" y="5" width="2" height="14" rx="1"></rect>--}}
{{--																				<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"></path>--}}
{{--																			</g>--}}
{{--																		</svg>--}}
{{--																	</span>--}}
{{--                                                    <!--end::Svg Icon-->--}}
{{--                                                    <div class="fs-2 fw-bolder counted" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%">%60</div>--}}
{{--                                                </div>--}}
{{--                                                <!--end::Number-->--}}
{{--                                                <!--begin::Label-->--}}
{{--                                                <div class="fw-bold fs-6 text-gray-400">Success Rate</div>--}}
{{--                                                <!--end::Label-->--}}
{{--                                            </div>--}}
{{--                                            <!--end::Stat-->--}}
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                            <span class="fw-bold fs-6 text-gray-500">التقييم</span>
{{--                                            <span class="fw-bolder fs-6">{{$doctor_rate}} من اصل {{$doctor->rates->count()}} تقييمات</span>--}}
                                        </div>
                                        <div class="h-5px mx-3 w-100 mb-3">
                                            @if($doctor_rate == 0)
                                                <span class="fs-4">لا يوجد تقييم</span>
                                            @else
                                                @for($i = 1 ; $i <= $doctor_rate ; $i++)
                                                    <i class="bi bi-star-fill" style="color: #ffc30f" aria-hidden="true"></i>
                                                @endfor
                                                @for($i = 1 ; $i <= 5 - $doctor_rate ; $i++)
                                                    <i class="bi bi-star" style="color: #ffc30f" aria-hidden="true"></i>
                                                @endfor
{{--                                                <p class="text-gray-700 fs-5 fw-bolder">من {{$count}} تقييمات</p>--}}
                                            @endif
                                        </div>
                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Navs-->
                        <div class="d-flex overflow-auto h-55px">
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                                <!--begin::Nav item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary me-6 active">عرض عام</a>
                                </li>
                                <!--end::Nav item-->
                            </ul>
                        </div>
                        <!--begin::Navs-->
                    </div>
                </div>
                <!--end::Navbar-->
                <!--begin::details View-->
                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bolder m-0">بيانات الحساب</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">الاسم المسجل</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bolder fs-6 text-dark">{{$doctor->name_ar}} | {{$doctor->name_en}}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">القسم</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <span class="fw-bold fs-6">{{$doctor->clinic->name_ar}}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">هاتف التواصل </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fw-bolder fs-6 me-2">{{$doctor->phone}}</span>
                                @if($doctor->phone == null)
                                <span class="badge badge-danger">لم يسجل</span>
                                @endif
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">البريد الالكتروني</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <a class="fw-bold fs-6 text-dark text-hover-primary">{{$doctor->email}}</a>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">الجنسية</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bolder fs-6 text-dark"><img class="h-15px" src="{{asset($doctor->country->image)}}"></span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">المكالمات الصوتية</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                @if($doctor->audio == 'yes')
                                    <span class="badge badge-success">متوفر</span>
                                @else
                                    <span class="badge badge-danger">غير متوفر</span>
                                @endif
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold text-muted">مكالمات الفيديو</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                @if($doctor->video == 'yes')
                                    <span class="badge badge-success">متوفر</span>
                                @else
                                    <span class="badge badge-danger">غير متوفر</span>
                                @endif
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Notice-->
                        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotone/Code/Warning-1-circle.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"></circle>
													<rect fill="#000000" x="11" y="7" width="2" height="8" rx="1"></rect>
													<rect fill="#000000" x="11" y="16" width="2" height="2" rx="1"></rect>
												</svg>
											</span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1">
                                <!--begin::Content-->
                                <div class="fw-bold">
                                    <h4 class="text-gray-800 fw-bolder">انتبه من فضلك !</h4>
                                    <div class="fs-6 text-gray-600">في حال وجود اي بيانات خاطئة او شكاوي يرجي
                                        <a class="fw-bolder" href="{{url('contact')}}">التواصل مع مسؤلين المستشفي</a>.</div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Notice-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::details View-->
                <!--begin::Row-->
                <div class="row gy-10 gx-xl-10">
                    <!--begin::Col-->
                    <div class="col-xl-6">
                        <!--begin::List Widget 5-->
                        <div class="card card-xxl-stretch mb-5 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header align-items-center border-0 mt-4">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="fw-bolder mb-2 text-dark">المواعيد والحجوزات</span>
                                    <span class="text-muted fw-bold fs-7"></span>
                                </h3>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-5">
                                <!--begin::Timeline-->
                                <div class="timeline-label">
                                    <!--begin::Item-->

                                    @foreach($doctor->reservation as $reservation)
{{--                                        @foreach($reservation->date as $date)--}}
                                        @if($reservation->date->date >= date('Y-m-d H:i:s'))
                                        <div class="timeline-item">
                                                <!--begin::Label-->
                                                <div class="timeline-label fw-bolder text-gray-800 fs-6 w-75px">
                                                    {{date('h:i A', strtotime($reservation->hour->hour))}}
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Badge-->
                                                <div class="timeline-badge">
                                                    @if($reservation->status == 'accepted')
                                                        <i title="مقبول" class="fa fa-genderless text-success fs-1"></i>
                                                    @elseif($reservation->status == 'new')
                                                        <i title="معلق" class="fa fa-genderless text-warning fs-1"></i>
                                                    @else
                                                        <i title="مرفوض" class="fa fa-genderless text-danger fs-1"></i>
                                                    @endif
                                                </div>
                                                <!--end::Badge-->
                                                <!--begin::Text-->
                                                <div class="fw-mormal timeline-content text-muted ps-3">
                                                    {{ArabicDate($reservation->date->date)['ar_day_not_current']}} -
                                                    {{date('j',strtotime($reservation->date->date))}} <!-- return day num -->
                                                    {{ArabicDate($reservation->date->date)['month']}}
                                                </div>
                                                <!--end::Text-->
                                            </div>
{{--                                        @endforeach--}}
                                    @endif
                                @endforeach
                                    <!--end::Item-->
                                </div>
                                <!--end::Timeline-->
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end: List Widget 5-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-6">
                        <!--begin::Tables Widget 5-->
                        <div class="card card-xxl-stretch mb-5 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">الحالات المرضية</span>
                                    <span class="text-muted mt-1 fw-bold fs-7">تفاصيل الحجزوات</span>
                                </h3>
                                <div class="card-toolbar">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary active fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_1">المقبولة</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_5_tab_2">المعلقة</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light-primary fw-bolder px-4" data-bs-toggle="tab" href="#kt_table_widget_5_tab_3">المرفوضة</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-3">
                                <div class="tab-content">
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                                <!--begin::Table head-->
                                                <thead>
                                                <tr class="border-0">
                                                    <th class="p-0 w-100px"></th>
                                                    <th class="p-0 min-w-140px"></th>
                                                    <th class="p-0 min-w-110px"></th>
                                                    <th class="p-0 min-w-50px"></th>
                                                </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                <tr>
                                                    @foreach($doctor->reservation->where('status','accepted') as $reservation)
                                                        @if($reservation->date->date >= date('Y-m-d H:i:s'))
                                                    <td>
                                                        <span class="text-end fw-bold">{{$reservation->name}}</span>
                                                    </td>
                                                    <td class="text-end text-muted fw-bold">{{$reservation->type}} , {{$reservation->call_type}}</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-light-success">مقبول</span>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="{{route('doctor.my.reservations')}}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                            <span class="svg-icon svg-icon-2">
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<polygon points="0 0 24 0 24 24 0 24"></polygon>
																							<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
																						</g>
																					</svg>
																				</span>
                                                            <!--end::Svg Icon-->
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
                                    <div class="tab-pane fade" id="kt_table_widget_5_tab_2">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                                <!--begin::Table head-->
                                                <thead>
                                                <tr class="border-0">
                                                    <th class="p-0 w-100px"></th>
                                                    <th class="p-0 min-w-140px"></th>
                                                    <th class="p-0 min-w-110px"></th>
                                                    <th class="p-0 min-w-50px"></th>
                                                </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                <tr>
                                                    @foreach($doctor->reservation->where('status','new') as $reservation)
                                                        @if($reservation->date->date >= date('Y-m-d H:i:s'))
                                                            <td>
                                                                <span class="text-end fw-bold">{{$reservation->name}}</span>
                                                            </td>
                                                            <td class="text-end text-muted fw-bold">{{$reservation->type}} , {{$reservation->call_type}}</td>
                                                            <td class="text-end">
                                                                <span class="badge badge-light-warning">معلق</span>
                                                            </td>
                                                            <td class="text-end">
                                                                <a href="{{route('doctor.my.reservations')}}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                                    <span class="svg-icon svg-icon-2">
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<polygon points="0 0 24 0 24 24 0 24"></polygon>
																							<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
																						</g>
																					</svg>
																				</span>
                                                                    <!--end::Svg Icon-->
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
                                    <div class="tab-pane fade" id="kt_table_widget_5_tab_3">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                                <!--begin::Table head-->
                                                <thead>
                                                <tr class="border-0">
                                                    <th class="p-0 w-100px"></th>
                                                    <th class="p-0 min-w-140px"></th>
                                                    <th class="p-0 min-w-110px"></th>
                                                    <th class="p-0 min-w-50px"></th>
                                                </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                <tr>
                                                    @foreach($doctor->reservation->where('status','refused') as $reservation)
                                                        @if($reservation->date->date >= date('Y-m-d H:i:s'))
                                                            <td>
                                                                <span class="text-end fw-bold">{{$reservation->name}}</span>
                                                            </td>
                                                            <td class="text-end text-muted fw-bold">{{$reservation->type}} , {{$reservation->call_type}}</td>
                                                            <td class="text-end">
                                                                <span class="badge badge-light-danger">مرفوض</span>
                                                            </td>
                                                            <td class="text-end">
                                                                <a href="{{route('doctor.my.reservations')}}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-right.svg-->
                                                                    <span class="svg-icon svg-icon-2">
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<polygon points="0 0 24 0 24 24 0 24"></polygon>
																							<rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
																							<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
																						</g>
																					</svg>
																				</span>
                                                                    <!--end::Svg Icon-->
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
                        <!--end::Tables Widget 5-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>










    @endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>


