@extends('layouts.admin.app')
@section('page_name') الرئيسية @endsection
@section('content')
<br>
<br>
<br>

    <!--begin::Row-->
    <div class="row gy-5 g-xl-8">
        <!--begin::Col-->
        <div class="card-body col-xl-4">
            <!--begin::List Widget 6-->
            <div class="card card-xl-stretch mb-xl-8" style="border-radius: 15px 15px 0px 0px;">
                <!--begin::Header-->
                <div class="card-header border-0" style="background:#20224f ; border-radius: 15px 15px 0px 0px ;height:130px; margin-bottom: 30px " >
                    <h3 class="card-title fw-bolder text-white">بعض رسائل العملاء :-</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0" >
                @foreach($contacts_massages as $contacts_massage)
                        <!--begin::Item-->
                        <div class="d-flex align-items-center bg-light-success rounded p-3">
                            <!--begin::Icon-->
                            <span class="svg-icon svg-icon-warning me-5">
        <!--begin::Svg Icon | path: icons/duotone/Home/Library.svg-->
        <span class="svg-icon svg-icon-1">
                <i class="fa fa-envelope"></i>
        </span><!--end::Svg Icon-->
    </span>
                            <!--end::Icon-->
                            <!--begin::Title-->
                            <div class="flex-grow-1 me-2">
                                <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">{{ $contacts_massage->name}}</a>
                                <span class="text-muted fw-bold d-block" style="height:30px;overflow: scroll">{{ $contacts_massage->message}}</span>
                            </div>
                            <!--end::Title-->
                        </div>
                    <br>
                @endforeach
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 6-->
        </div>
        <!--end::Col-->
        <div class="col-xl-8">
            <!--begin::List Widget 4-->
            <div class="card card-xl-stretch mb-5 mb-xl-8" style="height:605px;margin-top:15px;border-radius: 15px 15px 0px 0px ">
                <!--begin::Header-->
                <div class="card-header border-0" style="background:#20224f ; border-radius: 15px 15px 0px 0px ;height:130px ; margin-bottom: 30px " >
                    <h3 class="card-title fw-bolder text-white">بعض الحجوزات المسجلة :-</h3>
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
                                        <th class="p-0 w-50px"></th>
                                        <th class="p-0 min-w-150px"></th>
                                        <th class="p-0 min-w-140px"></th>
                                        <th class="p-0 min-w-110px"></th>
                                        <th class="p-0 min-w-50px"></th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                    @foreach($our_Reservations as $our_Reservation)
                                        <tr>
                                        <td>
                                            <div class="symbol symbol-45px me-2">
																				<span class="symbol-label">
																					<img src="{{asset($our_Reservation->doctor->image)}}" class="h-100 align-self-center" alt="">
																				</span>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$our_Reservation->doctor->name_ar}}</a>
                                            <span class="text-muted fw-bold d-block">{{$our_Reservation->doctor->category_ar}}</span>
                                        </td>
                                        <td class="text-end text-muted fw-bold">{{$our_Reservation->name}}</td>
                                        <td class="text-end text-muted fw-bold">{{$our_Reservation->phone}}</td>
                                        <td class="text-end">
                                          @if($our_Reservation->status == 'accepted')
                                            <span class="badge badge-light-success"> مقبول</span>
                                            @elseif($our_Reservation->status == 'refused')
                                              <span class="badge badge-light-danger"> مرفوض</span>
                                            @elseif($our_Reservation->status == 'ended')
                                              <span class="badge badge-light-primary"> منتهي</span>
                                            @elseif($our_Reservation->status == 'new')
                                                  <span class="badge badge-light-warning"> معلق</span>
                                              @endif
                                        </td>
                                    </tr>@endforeach
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
                                        <th class="p-0 w-50px"></th>
                                        <th class="p-0 min-w-150px"></th>
                                        <th class="p-0 min-w-140px"></th>
                                        <th class="p-0 min-w-110px"></th>
                                        <th class="p-0 min-w-50px"></th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->

                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Tap pane-->

                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 4-->
        </div>

        <!--begin::Col-->
        <div class="col-xxl-12" >
            <!--begin::Tables Widget 5-->
            <div class="card card-xxl-stretch mb-5 mb-xxl-8" style="border-radius:20px ">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5" style="padding-bottom:30px ; background: #20224f;border-radius:15px 15px 0px 0px  ">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1" style="color:white">الاطباء</span>
                        <span class="card-label  fs-2 mb-1" style="color:white"> بعض من اطباء المستشفي</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3" style="background:#f1f0eb">
                    <div class="tab-content">
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <div class="card-body p-lg-17">
                                    <!--begin::Team-->
                                    <div class="mb-18">
                                        <!--begin::Heading-->
                                        <div class="text-center mb-17">
                                            <!--begin::Title-->
                                            <h3 class="fs-2hx text-dark mb-5">أطبائنا العظماء</h3>
                                            <!--end::Title-->
                                            <!--begin::Sub-title-->
                                            <div class="fs-5 text-muted fw-bold">


                                            </div>
                                            <!--end::Sub-title=-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Wrapper-->

                                        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 gy-10">
                                          @foreach($our_doctores as $our_doctor)
                                            <!--begin::Item-->
                                            <div class="col text-center mb-9">
                                                <!--begin::Photo-->
                                                <div class="octagon mx-auto mb-2 d-flex w-150px h-150px bgi-no-repeat bgi-size-contain bgi-position-center" style=" background-color:#f1f0eb;background-image:url('{{ asset($our_doctor->image)}}')"></div>
                                                <!--end::Photo-->
                                                <!--begin::Person-->
                                                <div class="mb-0">
                                                    <!--begin::Position-->
                                                    <div class="text-muted fs-6 fw-bold">{{$our_doctor->name_ar}}</div>
                                                    <!--begin::Position-->

                                                    <!--begin::Name-->
                                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-3">{{$our_doctor->email}}</a>
                                                    <!--end::Name-->
                                                </div>
                                                <!--end::Person-->
                                            </div>
                                            <!--end::Item-->
                                          @endforeach
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Team-->

                                    <!--begin::Card-->
                                    <div class="card mb-4 bg-light text-center" style="border:1px dashed;border-radius:30px ;  ">
                                        <!--begin::Body-->
                                        <div class="card-body py-12" >
                                            <!--begin::Title-->
                                            <h4 class="fs-2hx text-gary mb-5">روابط التواصل</h4>
                                            <!--end::Title-->
                                            <!--begin::Icon-->
                                            <a href="{{ $contacts->facebook}}" class="mx-4" target="_blank">
                                                <img src="assets/media/svg/brand-logos/facebook-4.svg" class="h-30px my-2" alt="">
                                            </a>
                                            <!--end::Icon-->
                                            <!--begin::Icon-->
                                            <a href="{{ $contacts->insta}}" class="mx-4" target="_blank">
                                                <img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="h-30px my-2" alt="">
                                            </a>
                                            <!--end::Icon-->
                                            <!--begin::Icon-->
                                            <a href="{{ $contacts->linkedin}}" class="mx-4" target="_blank">
                                                <img src="assets/media/svg/brand-logos/linkedin.svg" class="h-30px my-2" alt="">
                                            </a>
                                            <!--end::Icon-->
                                            <!--begin::Icon-->
                                            <a href="{{ $contacts->twitter}}" class="mx-4" target="_blank">
                                                <img src="assets/media/svg/brand-logos/twitter.svg" class="h-30px my-2" alt="">
                                            </a>
                                            <!--end::Icon-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Card-->
                                </div>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Tap pane-->


                        <div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13" style="background: rgb(17,16,16);
background: linear-gradient(90deg, rgba(17,16,16,1) 16%, rgba(80,78,78,1) 100%);
 border-radius:10px ">
                            <!--begin::Content-->
                            <div class="my-2 me-5">
                                <!--begin::Title-->
                                <div class="fs-1 fs-lg-2qx fw-bolder text-white mb-2">{{$secound_section->title_ar}}
                                </div>
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="fs-6 fs-lg-5 text-white fw-bold opacity-75">{{$secound_section->content_ar}}</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Content-->
                            <!--begin::Link-->
                            <a href="{{url('/')}}" class="btn btn-lg btn-outline border-2 btn-outline-white flex-shrink-0 my-2" style="background:#be2b2e;color:white;font-weight:bolder  ;  ">الذهاب للموقع الرئيسي</a>
                            <!--end::Link-->
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Tables Widget 5-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
@endsection

