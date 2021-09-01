@extends('layouts.site.app')
<style>
    .contents_ {
        border-radius: 20px;
        cursor: pointer;
        position: relative;
        width: 100px;
        height: 120px;
        border: 1px solid #777777;
    }
    p.week {
        position: absolute;
        width: 100%;
        border-radius: 0 0 20px 20px;
        bottom: 0;
        text-align: center;
        color: #fff;
        background-color: #777777;
    }
</style>
@section('site_content')

    <div class="profile-of-doctor py-5">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content p-3">
                        <div class="doc-img">
                            <img src="{{get_file('site')}}/img/doctor-patient.jpg"
                                 style="object-fit: cover ; width: 100%; height: 100%; " alt="">
                        </div>

                        <div class="text-place p-3">
                            <h4> {{$user->name}}</h4>
                            {{--        <p class="country  pb-3">--}}
                            {{--           <img src="img/icons/Egypt.png" class="ml-2 " width="20px" height="16px" alt="">--}}
                            {{--            مصر--}}
                            {{--           </p>--}}

                            <p> {{trans('web.phone')}} : <span>   {{$user->phone}} </span></p>
                            {{--           <p> فصيلة الدم : <span>  B+  </span></p>--}}

                        </div>

                    </div>


                </div>


            </div>

        </div>


    </div>


    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////             //////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!-- TABS-1
              ============================================= -->
    <section id="tabs-1" class="pb-5 tabs-section division">
        <div class="container">
            <!-- TABS NAVIGATION -->
            <div id="tabs-nav" class="list-group text-center">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <!-- TAB-2 LINK -->
                    <li class="nav-item icon-xs mb-2">
                        <a class="nav-link active" id="tab2-list" data-toggle="pill" href="#tab-2" role="tab"
                           aria-controls="tab-2"
                           aria-selected="false">
                            <span class="flaticon-005-blood-donation-3"></span>{{trans('web.statment')}}
                        </a>
                    </li>

                    <!-- TAB-2 LINK -->
                    <li class="nav-item icon-xs mb-2">
                        <a class="nav-link" id="tab1-list" data-toggle="pill" href="#tab-1" role="tab"
                           aria-controls="tab-1"
                           aria-selected="false">
                            <span class="flaticon-005-blood-donation-3"></span>{{trans('web.offer_reservation')}}
                        </a>
                    </li>


                    <!-- TAB-3 LINK -->
                    <li class="nav-item icon-xs mb-2">
                        <a class="nav-link" id="tab3-list" data-toggle="pill" href="#tab-3" role="tab"
                           aria-controls="tab-3"
                           aria-selected="false">
                            <span class="flaticon-031-scanner"></span>{{trans('web.profile_edit')}}
                        </a>
                    </li>
                </ul>
            </div> <!-- END TABS NAVIGATION -->
            <!-- TABS CONTENT -->
            <div class="tab-content p-0 " id="pills-tabContent">


                <!-- TAB-2 CONTENT -->
                <div class="tab-pane fade show active" id="tab-2" role="tabpanel" aria-labelledby="tab2-list">


                    <div class="my-appointments">
                        <!-- <div class="banner-profile py-5  d-flex align-items-center justify-content-center">
                        </div> -->
                        <div class="doctors py-5">
                            <div class="container">
                                <div class="row">
                                    @foreach($patiant_doctors as $patiant_doctor)
                                        <div class=" col-lg-6 mb-5 p-1">
                                            <a href="#">
                                                <div data-aos="flip-down" class="contents  z-depth-1">
                                                    <i class="fal fa-calendar-alt appoi-icon"></i>
                                                    <span class="appoi">
                                {{app()->getLocale()=='ar'?ArabicDate($patiant_doctor->date->date)['ar_day']:date('l',strtotime($patiant_doctor->date->date))}}
                                                        {{date('j',strtotime($patiant_doctor->date->date))}}
                                                        {{app()->getLocale()=='ar'?ArabicDate($patiant_doctor->date->date)['month']:date('F',strtotime($patiant_doctor->date->date))}}
                                                        {{date('Y',strtotime($patiant_doctor->date->date))}}
                            </span>
                                                    <div class="img d-flex justify-content-center">
                                                        <img src="{{asset($patiant_doctor->doctor->image)}}" alt="">
                                                    </div>
                                                    <div class="text">
                                                        <a class=" py-2 font-weight-bold text-center"> {{$patiant_doctor->doctor['name_' .app()->getLocale()]}} </a>
                                                        <div class="my-custom-div mt-2">
                                                            <p>
                                                                <i class="fad fa-medal"></i>{{$patiant_doctor->doctor['category_' .app()->getLocale()]}}
                                                            </p>
                                                        </div>
                                                        <div class="my-custom-div mt-2">
                                                            <p><i class="fa fa-clock"></i>
                                                                @if($patiant_doctor->is_deleted == 'yes')
                                                                    <span class="badge badge-danger">{{trans('web.deleted_reservation')}}</span>
                                                                @elseif($patiant_doctor->status == 'accepted')
                                                                    <span class="badge badge-primary">{{trans('web.accepted_reservation')}}</span>
                                                                @elseif($patiant_doctor->status == 'refused')
                                                                    <span class="badge badge-danger">{{trans('web.refused_reservation')}}</span>
                                                                @elseif($patiant_doctor->status == 'new')
                                                                    <span class="badge badge-warning">{{trans('web.hanging_reservation')}}</span>
                                                                @else
                                                                    <span class="badge badge-success">{{trans('web.ended_reservation')}}</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                        {{--                                      <div class="my-custom-div mt-2">--}}
                                                        {{--                                          @if($patiant_doctor->date->date <= date('Y-m-d H:i:s'))--}}
                                                        {{--                                           <p>--}}
                                                        {{--                                               <i class="fad fa-book"></i>--}}
                                                        {{--                                               <span style="background:#f5f8fa;color:#7e82a5;border-radius:15%; padding: 2px">{{trans('web.old_reservation')}} </span>--}}
                                                        {{--                                           </p>--}}
                                                        {{--                                          @endif--}}
                                                        {{--                                      @if($patiant_doctor->date->date >= date('Y-m-d H:i:s'))--}}
                                                        {{--                                              <p>--}}
                                                        {{--                                                  <i class="fad fa-book"></i>--}}
                                                        {{--                                                  <span class="text-primary" style="border-radius:10%; padding: 1px">{{trans('web.new_reservation')}}</span>--}}
                                                        {{--                                              </p>--}}
                                                        {{--                                          @endif--}}
                                                        {{--                                      </div>--}}
                                                    </div>

                                                    <div class="w-100 pt-2 three-btns position-absolute d-flex justify-content-around">
                                                        <a
                                                                data-toggle="modal" data-target="#showdetailes"
                                                                data-id="{{ $patiant_doctor->id }}"
                                                                data-patiant_doctor_doctor_image="{{asset( $patiant_doctor->doctor->image) }}"
                                                                data-name_ar="{{ $patiant_doctor->doctor->name_ar}}"
                                                                data-name_en="{{ $patiant_doctor->doctor->name_en}}"
                                                                data-category_ar="{{ $patiant_doctor->doctor->category_ar}}"
                                                                data-category_en="{{ $patiant_doctor->doctor->category_en}}"
                                                                data-patiant_doctor_date_date="{{ $patiant_doctor->date->date}}"
                                                                data-phone="{{ $patiant_doctor->doctor->phone}}"
                                                                data-email="{{ $patiant_doctor->doctor->email}}"
                                                                data-patiant_doctor_hour_hour="{{ $patiant_doctor->hour->hour}}"
                                                                data-patiant_doctor_status="{{$patiant_doctor->status}}"
                                                                data-patiant_name="{{$patiant_doctor->name}}"
                                                                data-patiant_phone="{{$patiant_doctor->phone}}"
                                                                data-patiant_gender="{{$patiant_doctor->gender}}"
                                                                @if($patiant_doctor->report_text !=null)
                                                                data-report_text="{{$patiant_doctor->report_text}}"
                                                                @endif

                                                                data-count="{{$patiant_doctor->reservation_diseases->count()}}"
                                                                data-count_report="{{$patiant_doctor->reports->count()}}"
                                                                data-patiant_age="{{$patiant_doctor->age}}"
                                                                @foreach($patiant_doctor->reservation_diseases as $diseases)
                                                                data-disease_ar{{$loop->iteration}}="{{$diseases->diseases->title_ar}}"
                                                                data-disease_en{{$loop->iteration}}="{{$diseases->diseases->title_en}}"
                                                                @endforeach
                                                                @if($patiant_doctor->reports->count())

                                                                @foreach($patiant_doctor->reports as $report)
                                                                        data-reports{{$loop->iteration}}="{{url($report->report)}}"
                                                                @endforeach
                                                                @endif

                                                        > <i class="fad fa-map-marked-alt"></i>
                                                            {{trans('web.show_reservation')}}</a>
                                                        @if( $patiant_doctor->can_updated == 'yes')
                                                            <a class="update_reservation"
                                                               attr_reservation_id="{{$patiant_doctor->id}}"
                                                               data-toggle="modal"
                                                               data-target="#date{{ $patiant_doctor->id }}"> <i
                                                                        class="fal fa-calendar-alt"></i> {{trans('web.update_reservation')}}
                                                            </a>
                                                        @endif
                                                        @if($patiant_doctor->can_deleted == 'yes' || $patiant_doctor->is_deleted == 'yes')
                                                            <a data-toggle="modal"
                                                               data-target="#delete{{ $patiant_doctor->id }}"> <i
                                                                        class="fad fa-trash-alt"></i> {{trans('web.delete_reservation')}}
                                                            </a>
                                                        @endif
                                                        @if($patiant_doctor->date->date >= date('Y-m-d H:i:s') && $patiant_doctor->can_canceled == 'yes'||  $patiant_doctor->can_canceled == 'yes')
                                                            <a data-toggle="modal"
                                                               data-target="#cancel{{ $patiant_doctor->id }}"> <i
                                                                        class="fal fa-times-circle"></i> {{trans('web.cancel_reservation')}}
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="modal fade" id="delete{{ $patiant_doctor->id }}" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                            class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{trans('web.delete')}}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action=" {{route('delete_reservations',$patiant_doctor->id ) }}"
                                                              method="post">
                                                            {{--                                                                                                        {{ method_field('Delete') }}--}}
                                                            @csrf
                                                            {{trans('web.confirming_delete')}}
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{ $patiant_doctor->id }}">

                                                            <input id="id" type="hidden" name="hour"
                                                                   class="form-control"
                                                                   value="{{ $patiant_doctor->hour->id }}">

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{trans('web.close')}}</button>
                                                                <a href="{{route('cancel_Reservation',$patiant_doctor->id ) }}">
                                                                    <button type="submit"
                                                                            class="btn btn-danger">{{trans('web.confirming')}}</button>
                                                                </a>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="cancel{{ $patiant_doctor->id }}" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                            class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{trans('web.delete')}}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action=" {{route('cancel_Reservation',$patiant_doctor->id ) }}"
                                                              method="post">
                                                            {{--                                                                                                        {{ method_field('Delete') }}--}}
                                                            @csrf
                                                            {{trans('web.confirming_delete')}}

                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{ $patiant_doctor->id }}">

                                                            <input id="id" type="hidden" name="hour"
                                                                   class="form-control"
                                                                   value="{{ $patiant_doctor->hour->id }}">

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{trans('web.exit')}}</button>
                                                                <a href="{{route('cancel_Reservation',$patiant_doctor->id ) }}">
                                                                    <button type="submit"
                                                                            class="btn btn-danger">{{trans('web.confirming')}}</button>
                                                                </a>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="profile-of-doctor ">

                                            <!-- Modal -->
                                            <div class="modal fade update_modal" id="date{{ $patiant_doctor->id }}"
                                                 tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                                                <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                                                <div class="modal-dialog modal-lg modal-dialog-centered"
                                                     role="document">


                                                    <div class="modal-content">
                                                        <div class="modal-header d-flex justify-content-center">
                                                            <h5 class="modal-title font-weight-bold"
                                                                id="exampleModalLongTitle"> {{trans('web.avaliable_appointment')}} </h5>

                                                        </div>
                                                        <form action="{{route('update_date')}}" class="UpdateForm"
                                                              method="POST">
                                                            @csrf
                                                            <input type="hidden" id="reservation_id"
                                                                   name="reservation_id"
                                                                   value="{{$patiant_doctor->id}}">
                                                            <div class="modal-body">

                                                                <section class="CarsSlider" style="padding: 0;">
                                                                    <div class="container">
                                                                        <h4 class="font-weight-bold mb-3"> {{trans('web.chose_day')}} </h4>

                                                                        <div class="swiper-container cars">
                                                                            <div class="swiper-wrapper">


                                                                                @foreach($patiant_doctor['all_dates'] as $date)
                                                                                    <input type="hidden"
                                                                                           value="{{$date->id}}"
                                                                                           id="date_id" name="date_id">
                                                                                    <div attr_date_id="{{$date->id}}"
                                                                                         attr_reservation_id="{{$patiant_doctor->id}}"
                                                                                         class="swiper-slide day update_date"
                                                                                         reservation_id="{{$patiant_doctor->id}}"
                                                                                         doctor_id="{{$patiant_doctor->doctor_id}}"
                                                                                         date="{{$date->id}}">
                                                                                        <div class="contents_ {{$date->is_reserved == 'yes' ? 'my-active':''}}">
                                                                                            <p class="text-center mb-3">
                                                                                                {{app()->getLocale()=='ar'?ArabicDate($date->date)['month']:date('F',strtotime($date->date))}}
                                                                                            </p>
                                                                                            <h4 class="text-center font-weight-bold"> {{date('j',strtotime($date->date))}} </h4>
                                                                                            <p class="week">
                                                                                                {{app()->getLocale()=='ar'?ArabicDate($date->date)['ar_day']:date('l',strtotime($date->date))}}
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                            @endforeach

                                                                            <!-- <a href="#!" class="swiper-slide "><img src="img/cars/dodge-icon.jpg"></a> -->
                                                                            </div>
                                                                            <!-- Add Arrows -->
                                                                            <!-- <div class="swiper-button-next"></div>
                                                                            <div class="swiper-button-prev"></div> -->
                                                                        </div>
                                                                    </div>
                                                                </section>


                                                                <section class="CarsSlider chose-time"
                                                                         style="padding: 0;  display: none;">
                                                                    <div class="container">
                                                                        <h4 class="font-weight-bold my-3"> {{trans('web.chose_hour')}} </h4>

                                                                        <div class="swiper-container cars">
                                                                            <div class="swiper-wrapper hours" {{--id="hours"--}}>


                                                                                <!-- <a href="#!" class="swiper-slide "><img src="img/cars/dodge-icon.jpg"></a> -->
                                                                            </div>
                                                                            <!-- Add Arrows -->
                                                                            <!-- <div class="swiper-button-next"></div>
                                                                            <div class="swiper-button-prev"></div> -->
                                                                        </div>
                                                                    </div>
                                                                </section>


                                                            </div>
                                                            <div class="modal-footer text-center d-flex justify-content-center">
                                                                <button type="submit" class="btn bg-info text-white"><a
                                                                            class="text-white">{{trans('web.complete')}}</a>
                                                                </button>
                                                                <button type="button" class="btn bg-danger text-white"
                                                                        data-dismiss="modal"> {{trans('web.cancel')}}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- END TAB-2 CONTENT -->


                <!-- TAB-1 CONTENT -->
                <div class="tab-pane fade show " id="tab-1" role="tabpanel" aria-labelledby="tab1-list">

                    <div class="my-appointments">
                        <!-- <div class="banner-profile py-5  d-flex align-items-center justify-content-center">
                        </div> -->
                        <div class="doctors py-5">
                            <div class="container">
                                <div class="row">
                                    @foreach($patiant_doctors_offers as $patiant_doctor)
                                        <div class=" col-lg-6 mb-5 p-1">
                                            <a href="#">
                                                <div data-aos="flip-down" class="contents  z-depth-1">
                                                    <i class="fal fa-calendar-alt appoi-icon"></i>
                                                    <span class="appoi">
                                {{app()->getLocale()=='ar'?ArabicDate($patiant_doctor->date->date)['ar_day']:date('l',strtotime($patiant_doctor->date->date))}}
                                                        {{date('j',strtotime($patiant_doctor->date->date))}}
                                                        {{app()->getLocale()=='ar'?ArabicDate($patiant_doctor->date->date)['month']:date('F',strtotime($patiant_doctor->date->date))}}
                                                        {{date('Y',strtotime($patiant_doctor->date->date))}}
                            </span>
                                                    <div class="img d-flex justify-content-center">
                                                        <img src="{{asset( $patiant_doctor->offer->first_image->image)}}"
                                                             alt="">
                                                    </div>
                                                    <div class="text">
                                                        <a class=" py-2 font-weight-bold text-center"> {{$patiant_doctor->offer['title_' .app()->getLocale()]}} </a>
                                                        <div class="my-custom-div mt-2">
                                                            <p>
                                                                <i class="fas fa-money-bill-alt"></i> {{$patiant_doctor->offer->new_price}} {{trans('web.SR')}}
                                                            </p>
                                                        </div>

                                                        <div class="my-custom-div mt-2">
                                                            <p><i class="fa fa-clock"></i>
                                                                @if($patiant_doctor->is_deleted == 'yes')
                                                                    <span class="badge badge-danger">{{trans('web.deleted_reservation')}}</span>
                                                                @elseif($patiant_doctor->status == 'accepted')
                                                                    <span class="badge badge-primary">{{trans('web.accepted_reservation')}}</span>
                                                                @elseif($patiant_doctor->status == 'refused')
                                                                    <span class="badge badge-danger">{{trans('web.refused_reservation')}}</span>
                                                                @elseif($patiant_doctor->status == 'new')
                                                                    <span class="badge badge-warning">{{trans('web.hanging_reservation')}}</span>
                                                                @else
                                                                    <span class="badge badge-success">{{trans('web.ended_reservation')}}</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="w-100 pt-2 three-btns position-absolute d-flex justify-content-around">
                                                        <a
                                                                data-toggle="modal" data-target="#showdetailes2"
                                                                data-id="{{ $patiant_doctor->id }}"
                                                                data-patiant_doctor_doctor_image="{{asset( $patiant_doctor->offer->first_image->image) }}"
                                                                data-title_ar="{{ $patiant_doctor->offer->title_ar}}"
                                                                data-title_ar="{{ $patiant_doctor->offer->title_ar}}"
                                                                data-details_ar="{{ $patiant_doctor->offer->details_ar}}"
                                                                data-details_en="{{ $patiant_doctor->offer->details_en}}"
                                                                data-old_price="{{ $patiant_doctor->offer->old_price}}"
                                                                data-new_price="{{ $patiant_doctor->offer->new_price}}"
                                                                data-rate="{{ $patiant_doctor->offer->rate}}"
                                                                data-clinic_name_ar="{{ $patiant_doctor->offer->clinic->name_ar}}"
                                                                data-clinic_name_en="{{ $patiant_doctor->offer->clinic->name_en}}"
                                                                data-clinic_rate="{{ $patiant_doctor->offer->rate}}"
                                                                data-clinic_offer="{{ $patiant_doctor->offer->offer}}"
                                                                data-clinic_image="{{asset( $patiant_doctor->offer->clinic->image)}}"
                                                        > <i class="fad fa-map-marked-alt"></i>
                                                            {{trans('web.show_reservation')}}</a>
                                                        @if( $patiant_doctor->can_updated == 'yes')
                                                            <a class="update_reservation"
                                                               attr_reservation_id="{{$patiant_doctor->id}}"
                                                               data-toggle="modal"
                                                               data-target="#date{{ $patiant_doctor->id }}"> <i
                                                                        class="fal fa-calendar-alt"></i> {{trans('web.update_reservation')}}
                                                            </a>
                                                        @endif
                                                        @if($patiant_doctor->can_deleted == 'yes' || $patiant_doctor->is_deleted == 'yes'|| $patiant_doctor->date->date <= date('Y-m-d H:i:s'))
                                                            <a data-toggle="modal"
                                                               data-target="#delete{{ $patiant_doctor->id }}"> <i
                                                                        class="fad fa-trash-alt"></i> {{trans('web.delete_reservation')}}
                                                            </a>
                                                        @endif
                                                        @if($patiant_doctor->date->date >= date('Y-m-d H:i:s') && $patiant_doctor->can_canceled == 'yes')
                                                            <a data-toggle="modal"
                                                               data-target="#cancel{{ $patiant_doctor->id }}"> <i
                                                                        class="fal fa-times-circle"></i> {{trans('web.cancel_reservation')}}
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                        </div>


                                        <div class="modal fade" id="delete{{ $patiant_doctor->id }}" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                            class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{trans('web.delete')}}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action=" {{route('delete_reservations',$patiant_doctor->id ) }}"
                                                              method="post">
                                                            {{--                                                                                                        {{ method_field('Delete') }}--}}
                                                            @csrf
                                                            {{trans('web.confirming_delete')}}
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{ $patiant_doctor->id }}">

                                                            <input id="id" type="hidden" name="hour"
                                                                   class="form-control"
                                                                   value="{{ $patiant_doctor->hour->id }}">

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{trans('web.close')}}</button>
                                                                <a href="{{route('cancel_Reservation',$patiant_doctor->id ) }}">
                                                                    <button type="submit"
                                                                            class="btn btn-danger">{{trans('web.confirming')}}</button>
                                                                </a>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="cancel{{ $patiant_doctor->id }}" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                            class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{trans('web.delete')}}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action=" {{route('cancel_Reservation',$patiant_doctor->id ) }}"
                                                              method="post">
                                                            {{--                                                                                                        {{ method_field('Delete') }}--}}
                                                            @csrf
                                                            {{trans('web.confirming_delete')}}

                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{ $patiant_doctor->id }}">

                                                            <input id="id" type="hidden" name="hour"
                                                                   class="form-control"
                                                                   value="{{ $patiant_doctor->hour->id }}">

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{trans('web.exit')}}</button>
                                                                <a href="{{route('cancel_Reservation',$patiant_doctor->id ) }}">
                                                                    <button type="submit"
                                                                            class="btn btn-danger">{{trans('web.confirming')}}</button>
                                                                </a>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="profile-of-doctor ">

                                            <!-- Modal -->
                                            <div class="modal fade update_modal" id="date{{ $patiant_doctor->id }}"
                                                 tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                                                <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                                                <div class="modal-dialog modal-lg modal-dialog-centered"
                                                     role="document">


                                                    <div class="modal-content">
                                                        <div class="modal-header d-flex justify-content-center">
                                                            <h5 class="modal-title font-weight-bold"
                                                                id="exampleModalLongTitle"> {{trans('web.avaliable_appointment')}} </h5>

                                                        </div>
                                                        <form action="{{route('update_date')}}" class="UpdateForm"
                                                              method="POST">
                                                            @csrf
                                                            <input type="hidden" id="reservation_id"
                                                                   name="reservation_id"
                                                                   value="{{$patiant_doctor->id}}">
                                                            <div class="modal-body">

                                                                <section class="CarsSlider" style="padding: 0;">
                                                                    <div class="container">
                                                                        <h4 class="font-weight-bold mb-3"> {{trans('web.chose_day')}} </h4>

                                                                        <div class="swiper-container cars">
                                                                            <div class="swiper-wrapper">


                                                                                @foreach($patiant_doctor['all_dates'] as $date)
                                                                                    <input type="hidden"
                                                                                           value="{{$date->id}}"
                                                                                           id="date_id" name="date_id">
                                                                                    <div attr_date_id="{{$date->id}}"
                                                                                         attr_reservation_id="{{$patiant_doctor->id}}"
                                                                                         class="swiper-slide day update_date"
                                                                                         reservation_id="{{$patiant_doctor->id}}"
                                                                                         doctor_id="{{$patiant_doctor->doctor_id}}"
                                                                                         date="{{$date->id}}">
                                                                                        <div class="contents_ {{$date->is_reserved == 'yes' ? 'my-active':''}}">
                                                                                            <p class="text-center mb-3">
                                                                                                {{app()->getLocale()=='ar'?ArabicDate($date->date)['month']:date('F',strtotime($date->date))}}
                                                                                            </p>
                                                                                            <h4 class="text-center font-weight-bold"> {{date('j',strtotime($date->date))}} </h4>
                                                                                            <p class="week">
                                                                                                {{app()->getLocale()=='ar'?ArabicDate($date->date)['ar_day']:date('l',strtotime($date->date))}}
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                            @endforeach

                                                                            <!-- <a href="#!" class="swiper-slide "><img src="img/cars/dodge-icon.jpg"></a> -->
                                                                            </div>
                                                                            <!-- Add Arrows -->
                                                                            <!-- <div class="swiper-button-next"></div>
                                                                            <div class="swiper-button-prev"></div> -->
                                                                        </div>
                                                                    </div>
                                                                </section>


                                                                <section class="CarsSlider chose-time"
                                                                         style="padding: 0;  display: none;">
                                                                    <div class="container">
                                                                        <h4 class="font-weight-bold my-3"> {{trans('web.chose_hour')}} </h4>

                                                                        <div class="swiper-container cars">
                                                                            <div class="swiper-wrapper hours" {{--id="hours"--}}>


                                                                                <!-- <a href="#!" class="swiper-slide "><img src="img/cars/dodge-icon.jpg"></a> -->
                                                                            </div>
                                                                            <!-- Add Arrows -->
                                                                            <!-- <div class="swiper-button-next"></div>
                                                                            <div class="swiper-button-prev"></div> -->
                                                                        </div>
                                                                    </div>
                                                                </section>


                                                            </div>
                                                            <div class="modal-footer text-center d-flex justify-content-center">
                                                                <button type="submit" class="btn bg-info text-white"><a
                                                                            class="text-white">{{trans('web.complete')}}</a>
                                                                </button>
                                                                <button type="button" class="btn bg-danger text-white"
                                                                        data-dismiss="modal"> {{trans('web.cancel')}}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- END TAB-1 CONTENT -->

                <!-- TAB-3 CONTENT -->
                <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab3-list">
                    <form class="text-center" id="Form" method="post" action="{{route('update_user')}}">
                        @csrf
                        <input type="hidden" id="page" name="page" value="edit">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <label for="name"> {{trans('web.name')}} </label>
                                <input id="name" name="name" type="text" class="form-control" value="{{$user->name}}">
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="number"> {{trans('web.phone')}} </label>
                                <input id="phone" name="phone" type="text" class="form-control numbersOly"
                                       value="{{$user->phone}}">
                                <input id="phone_code" name="phone_code" type="hidden" class="form-control"
                                       value="{{$user->phone_code}}">
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="number"> {{trans('web.password')}}   </label>
                                <input id="password" type="password" name="password" class="form-control">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <label for="number"> {{trans('web.confirm_password')}}   </label>
                                <input name="confirm_password" id="confirm_password" type="password"
                                       class="form-control">
                            </div>
                            <div style="display: none" id="recaptcha-container"></div>
                            <div class="col-md-12 text-center mt-3">
                                <button type="submit" class="btn btn-success"> {{trans('web.confirm')}}   </button>
                            </div>
                        </div>
                    </form>
                    {{--    ============ modal  =============--}}

                    <div class="profile-of-doctor py-5">

                        <div class="modal" tabindex="-1" id="exampleModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{trans('web.phone_activation_code')}} </h5>
                                        <button id="close_modal" type="button" class="btn-close mo-close-btn close_model" data-dismiss="modal" aria-label="Close">
                                            <i class="fal fa-window-close"></i>
                                        </button>
                                    </div>
                                    <form id="confirm_form" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <p class="h4   mt-3  font-weight-bold ">{{trans('web.activation_code')}} </p>
                                            <div class="hr d-flex align-items-center justify-content-center">
                                                <hr class="border-line  mb-2">
                                            </div>
                                            <p class="text-center  py-2 my-2" style="text-align: center !important;">{{trans('web.please_enter_code')}}</p>
                                            <p class="number mb-3 pb-2" id="phone_" style="text-align: center !important;"></p>

                                            <div class="form-outline">
                                                <input class="form-control numbersOnly" id="verificationCode"
                                                       type="text" maxlength="6">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary close_model"
                                                    data-dismiss="modal">{{trans('web.cancel')}} </button>
                                            <button type="submit" id="store_user"
                                                    class="btn btn-primary">{{trans('web.confirming')}} </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div> <!-- END TAB-3 CONTENT -->
                </div> <!-- END TABS CONTENT -->

                <!-- edit_modal_Grade -->
                <div class="modal fade" id="showdetailes" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    {{trans('web.reservation_details')}}                                            </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="card mb-5 mb-xl-8">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-15">
                                        <!--begin::Summary-->
                                        <div class="d-flex flex-center flex-column mb-5">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-100px symbol-circle mb-7">
                                                <img src="" alt="image" id="patiant_doctor_doctor_image"
                                                     style="width:150px; border-radius:15px  ">
                                            </div>
                                            <!--end::Avatar-->
                                        </div>


                                        <!--end::Summary-->

                                        <div class="separator separator-dashed my-3"></div>
                                        <form action="" class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework"
                                              method="post" id="kt_careers_form">
                                            <!--begin::Input group-->
                                            <div class="row mb-5">
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required fs-5 fw-bold mb-2">{{trans('web.name')}}
                                                        :</label>
                                                    <!--end::Label-->
                                                    <!--end::Input-->
                                                    @if(app()->getLocale()=='ar')
                                                        <input type="text" class="form-control form-control-solid"
                                                               disabled placeholder="" name="a" id="name_ar">
                                                    @elseif(app()->getLocale()=='en')
                                                        <input type="text" class="form-control form-control-solid"
                                                               disabled placeholder="" name="as" id="name_en">
                                                @endif
                                                <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                    <!--end::Label-->
                                                    <label class="required fs-5 fw-bold mb-2">{{trans('web.specialization')}}</label>
                                                    <!--end::Label-->
                                                    <!--end::Input-->
                                                    @if(app()->getLocale()=='ar')
                                                        <input type="text" class="form-control form-control-solid"
                                                               disabled placeholder="" name="a" id="category_ar">
                                                    @elseif(app()->getLocale()=='en')
                                                        <input type="text" class="form-control form-control-solid"
                                                               disabled placeholder="" name="as" id="category_en">
                                                @endif
                                                <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row mb-5">
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required fs-5 fw-bold mb-2">{{trans('web.phone')}}</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" id="phone"
                                                           placeholder="" name="phone" disabled>
                                                    <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <!--end::Label-->
                                                    <label class="fs-5 fw-bold mb-2">{{trans('web.email')}}</label>
                                                    <!--end::Label-->
                                                    <!--end::Input-->
                                                    <input type="text" id="email"
                                                           class="form-control form-control-solid" placeholder=""
                                                           disabled>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->


                                            <!--begin::Input group-->
                                            <div class="row mb-5">
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required fs-5 fw-bold mb-2">{{trans('web.detection_day')}}</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid"
                                                           id="patiant_doctor_date_date" placeholder="" name="phone"
                                                           disabled>
                                                    <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <!--end::Label-->
                                                    <label class="fs-5 fw-bold mb-2">{{trans('web.detection_date')}}</label>
                                                    <!--end::Label-->
                                                    <!--end::Input-->
                                                    <input type="text" id="patiant_doctor_hour_hour"
                                                           class="form-control form-control-solid" placeholder=""
                                                           disabled>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->


                                            <span type="text"
                                                  style="text-align:center;font-weight: bolder; color:#563d7c ; background: #c6b5dc"
                                                  id="" class="form-control form-control-solid" placeholder="" disabled>{{trans('web.Patiant_Detailes')}}</span>

                                            <!--begin::Input group-->
                                            <div class="row mb-5">
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required fs-5 fw-bold mb-2">{{trans('web.name')}}</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" id="patiant_name"
                                                           placeholder="" name="phone" disabled>
                                                    <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <!--end::Label-->
                                                    <label class="fs-5 fw-bold mb-2">{{trans('web.phone')}}</label>
                                                    <!--end::Label-->
                                                    <!--end::Input-->
                                                    <input type="text" id="patiant_phone"
                                                           class="form-control form-control-solid" placeholder=""
                                                           disabled>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row mb-5">
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required fs-5 fw-bold mb-2">{{trans('web.gender')}}</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" id="patiant_gender"
                                                           placeholder="" name="phone" disabled>
                                                    <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <!--end::Label-->
                                                    <label class="fs-5 fw-bold mb-2">{{trans('web.age')}}</label>
                                                    <!--end::Label-->
                                                    <!--end::Input-->
                                                    <input type="text" id="patiant_age"
                                                           class="form-control form-control-solid" placeholder=""
                                                           disabled>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                        @if(app()->getLocale()=='ar')

                                            <!--end::Input group-->
                                                <div class="w-100 pt-2 three-btns  d-flex justify-content-around"
                                                     style="background:whitesmoke; ">
                                                    <div id="disease_ar"></div>
                                                </div>
                                        @endif
                                        @if(app()->getLocale()=='en')
                                            <!--end::Input group-->
                                                <div class="w-100 pt-2 three-btns  d-flex justify-content-around"
                                                     style="background:whitesmoke; ">
                                                    <div id="disease_en"></div>
                                                </div>
                                            @endif

                                            <div id="report_text"
                                                 style="border:1px solid lightgoldenrodyellow; border-radius:15px;background:#e9ecef; padding:15px "></div>
                                            <div>
                                                @if($filees_images->count())
                                                   <div class="">
                                                        <a href="" target="_blank" title="فتح التقرير" class="btn btn-sm btn-color-muted btn-active-light-primary fw-bolder px-4 me-1 badge badge-primary"
                                                           id="reports"
                                                           data-id="">
                                                            <i class="fa fa-eye"></i>
                                                            {{trans('web.show_reservation')}}
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>

                                        </form>
                                    </div>
                                    <!--end::Card body-->
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">{{trans('web.exit')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- edit_modal_Grade -->
                <div class="modal fade" id="showdetailes2" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    {{trans('web.offer_details')}}                                            </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="card mb-5 mb-xl-8">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="card" style="width:100%; border-radius:1px !important; ">
                                                <img src="" class="card-img-top" alt="..."
                                                     id="patiant_doctor_doctor_image"
                                                     style="border-radius:1px !important; ">
                                                <div class="card-body">
                                                    @if(app()->getLocale()=='ar')
                                                        <h5 class="card-title" id="title_ar"></h5>
                                                        <p class="card-text" id="details_ar"></p>
                                                    @endif
                                                    @if(app()->getLocale()=='en')
                                                        <h5 class="card-title" id="title_en"></h5>
                                                        <p class="card-text" id="details_en"></p>
                                                    @endif
                                                    <div class="w-100 pt-2 three-btns  d-flex justify-content-around"
                                                         style="background:ghostwhite; ">
                                                        <span> <i class="fal fa-times-circle  font-weight-bold text-danger"
                                                                  id="old_price"
                                                                  style="text-decoration: line-through"></i> </span>
                                                        <span> <i class="fas fa-money-bill-wave font-weight-bold text-primary "
                                                                  id="new_price"></i>  </span>
                                                        <span>  <i class="fa fa-tags" id="clinic_offer"> </i> %</span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-circle symbol-50px me-5">
                                                            <img src="" class="" alt="" id="clinic_image"
                                                                 style="border-radius: 50%; width:65px;height:65px   !important;">
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Name-->
                                                        <div class="flex-grow-1">
                                                            @if(app()->getLocale()=='ar')
                                                                <h3 class="text-dark fw-bolder text-hover-primary fs-6"
                                                                    id="clinic_name_ar"></h3>
                                                                <p>
                                                                    <span class="font-weight-bold text-danger"
                                                                          id="clinic_rate"> </span> / 5 <a href=""
                                                                                                           class="text-warning">
                                                                        <i class="fad fa-star" aria-hidden="true"></i>
                                                                    </a>
                                                                </p>
                                                            @endif
                                                            @if(app()->getLocale()=='en')
                                                                <h3 class="text-dark fw-bolder text-hover-primary fs-6"
                                                                    id="clinic_name_en"></h3>
                                                                <p>
                                                                              <span class="font-weight-bold text-danger"
                                                                                    id="clinic_rate">
                                                                                  </span> / 5 <a href=""
                                                                                                 class="text-warning">
                                                                        <i class="fad fa-star" aria-hidden="true"></i>
                                                                    </a>
                                                                </p>
                                                            @endif

                                                        </div>
                                                        <!--end::Name-->
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger"
                                        data-dismiss="modal">{{trans('web.exit')}}</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div> <!-- End container -->


    </section> <!-- END TABS-1 -->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////  footer  //////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <input type="hidden" id="update_reservation_id">
    <input type="hidden" id="update_date_id">
    <input type="hidden" id="update_hour_id">

@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>

{{--================================= update profile ===============================--}}

@push('site_js')
    <script>
        {{--var phone = $('#phone').val();--}}
        {{--if (phone != {{auth()->user()->phone}}) {--}}
        $(document).on('submit', 'form#Form', function (e) {
            e.preventDefault();
            // alert(1)
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            // var url = $('#Form').attr('action');
            $.ajax({
                url: "{{route('check_phone_update')}}",
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('.loader-inner').show()
                },
                success: function (data) {
                    window.setTimeout(function () {
                        $('.loader-inner').hide()
                        if (data.type == 'error') {
                            $.each(data.message, function (key, value) {
                                toastr.options.timeOut = 10000;
                                toastr.error(data.message[key]);
                            });
                        }
                        if (data.type == 'success') {
                            $('#phone_').text(data.phone)
                            phoneSendAuth();
                            $('#exampleModal').modal('show');
                        }
                        if (data.type == 'phone_not_changed') {
                            Swal.fire({
                                title: "{{trans('web.Updated_Successfully')}}",
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000,
                            });
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        }
                    }, 1500);
                },
                error: function (data) {
                    $('.loader-inner').hide()
                    if (data.status === 500) {
                        // $('#exampleModalCenter').modal("hide");
                        Swal.fire({
                            title: "{{trans('web.There_is_an_error')}}",
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        $('#exampleModal').modal('hide');
                    }
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });

        $(document).on('submit', 'form#confirm_form', function (e) {
            e.preventDefault();
            // alert(1)
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            var url = $('#Form').attr('action');

            var code = $("#verificationCode").val();
            coderesult.confirm(code).then(function (result) {
                var user = result.user;

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    beforeSend: function () {
                        $('.loader-inner').show()
                    },
                    success: function (data) {
                        window.setTimeout(function () {
                            $('.loader-inner').hide()
                            if (data.type == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: "{{trans('web.Updated_Successfully')}}",
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                                setTimeout(function () {
                                    window.location = data.url
                                }, 2000);
                            }
                        }, 1500);
                    },
                    error: function (data) {
                        $('.loader-inner').hide()
                        if (data.status === 500) {
                            Swal.fire({
                                title: "{{trans('web.There_is_an_error')}}",
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 2000,
                            });
                            $('#exampleModal').modal('hide');
                        }
                    },//end error method

                    cache: false,
                    contentType: false,
                    processData: false
                });

            }).catch(function (error) {
                Swal.fire({
                    icon: 'error',
                    title: "{{trans('web.There_is_an_error')}}",
                    showConfirmButton: false,
                    timer: 2000,
                });
            });

        });
        $(document).on('click', '.close_model', function (e) {
            $('#exampleModal').modal('hide');
        });
    </script>


@endpush

{{--=================================date and time ===============================--}}
@push('site_js')
    <script>
        var swiper = new Swiper('.cars', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 50,
                },
            },
            speed: 1000,
            loop: true,
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
        });
    </script>


    <script>

        $(document).on('click', '.contents_', function (e) {
            e.preventDefault();
            var op = $(this)
            var content_classes = document.getElementsByClassName("contents_");

            for (var i = 0; i < content_classes.length; i++) {
                $(content_classes[i]).removeClass('my-active')
            }

            op.addClass('my-active')
        })


        $(document).on('click', '.contents-time', function (e) {
            e.preventDefault();
            var op = $(this)
            var content_classes = document.getElementsByClassName("contents-time");

            for (var i = 0; i < content_classes.length; i++) {
                $(content_classes[i]).removeClass('my-active-time')
            }

            op.addClass('my-active-time')
        })


        $(document).on('click', '.contents-back-end', function (e) {
            e.preventDefault();
            var op = $(this)
            var content_classes = document.getElementsByClassName("contents-back-end");

            for (var i = 0; i < content_classes.length; i++) {
                $(content_classes[i]).removeClass('my-active-time')
            }

            op.addClass('my-active-time')
        })


    </script>

    <script>
        $(".day").click(function () {
            var date_id_ = $(this).attr('date');
            var reservation_id = $(this).attr('reservation_id');
            var doctor_id = $(this).attr('doctor_id');
            var routeAction = "{{url('profile')}}";

            $.ajax({
                type: 'GET',
                url: routeAction,
                data: {'date_id': date_id_, 'reservation_id': reservation_id, 'doctor_id': doctor_id},
                success: function (data) {
                    $('.hours').html(data.html);
                    $(".chose-time").fadeIn(3000);
                }
            });
        }) ,

            $(".contents-time").click(function () {
                $(".time-allowed").fadeIn(3000);
            })
    </script>
    {{--========  form  complete  =============== --}}
    <script>
        $(document).on('click', '.update_date', function (e) {
            $('#update_reservation_id').val($(this).attr('attr_reservation_id'));
            $('#update_date_id').val($(this).attr('attr_date_id'));
        });
        $(document).on('click', '.update_hour', function (e) {
            $('#update_hour_id').val($(this).attr('attr_hour_id'));
        });

        $(document).on('submit', 'form.UpdateForm', function (e) {
            e.preventDefault()
            var myForm = $("#Form")[0]
            var date_id = $('#update_date_id').val();
            var reservation_id = $('#update_reservation_id').val();
            var hour_id = $('#update_hour_id').val();
            var url = $('.UpdateForm').attr('action') + "?date_id=" + date_id + "&reservation_id=" + reservation_id + "&hour_id=" + hour_id;

            $.ajax({
                url: url,
                type: 'POST',
                data: {'date_id': date_id, 'hour_id': hour_id, 'reservation_id': reservation_id},
                beforeSend: function () {
                    $('.loader-inner').show()
                },
                success: function (data) {
                    window.setTimeout(function () {
                        $('.loader-inner').hide()
                        if (data.type == 'success') {
                            $('.update_modal').modal('hide');
                            Swal.fire({
                                title: '{{trans("Updated_Successfully".app()->getLocale())}}',
                                // text: 'قم باختيار البيانات',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000,
                            });
                            setTimeout(function () {
                                location.reload()
                            }, 2000);
                        }
                    }, 1500);
                },
                error: function (data) {
                    $('.loader-inner').hide()
                    if (data.status === 500) {
                        Swal.fire({
                            title: '{{trans("There_is_an_error".app()->getLocale())}}',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        $('.update_modal').modal('hide');
                    }
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });

        });
    </script>
@endpush

@push('site_js')
    {{--    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}
    @if (Session::has('massage'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{trans('web.sweet_alert_success_profile')}}',
                showConfirmButton: false,
                timer: 3000,
                footer: '{{trans('web.sweet_waiting')}}',
            })
        </script>
    @endif
    @if($errors->any('Success'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '{{trans('web.sweet_alert_success_profile')}}',
                showConfirmButton: false,
                timer: 3000,
                footer: '{{trans('web.sweet_alert_again')}}',
            })
        </script>
    @endif

    <script>
        $('#showdetailes').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var patiant_doctor_doctor_image = button.data('patiant_doctor_doctor_image')
            var phone = button.data('phone')
            var email = button.data('email')
            var name_ar = button.data('name_ar')
            var name_en = button.data('name_en')
            var category_ar = button.data('category_ar')
            var category_en = button.data('category_en')
            var patiant_doctor_date_date = button.data('patiant_doctor_date_date')
            var patiant_doctor_hour_hour = button.data('patiant_doctor_hour_hour')
            var patiant_doctor_status = button.data('patiant_doctor_status')
            var patiant_name = button.data('patiant_name')
            var patiant_phone = button.data('patiant_phone')
            var patiant_gender = button.data('patiant_gender')
            var patiant_age = button.data('patiant_age')
            var report_text = button.data('report_text')
            var count = button.data('count')
            var count_report = button.data('count_report')
            $(this).find('.modal-body #disease_ar').text('');
            $(this).find('.modal-body #disease_en').text('');
            $(this).find('.modal-body #report_text').text('');
            $(this).find('.modal-body #reports').attr('href' , '');
            var modal = $(this)

            var disease = [];
            var i;
            for (i = 1; i <= count; i++) {
                disease[i] = button.data('disease_ar' + i);
                $(this).find('.modal-body #disease_ar').append(disease[i] + "<br>");
            }
            for (i = 1; i <= count; i++) {
                disease[i] = button.data('disease_en' + i);
                $(this).find('.modal-body #disease_en').append(disease[i] + "<br>");
            }
            var report = [];
var x ;
  for (x = 1; x <= count_report; x++) {
                report[x] = button.data('reports' + x);
                $(this).find('.modal-body #reports').attr('href',  report[x]  );
            }

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #patiant_doctor_doctor_image').attr('src', patiant_doctor_doctor_image);
            modal.find('.modal-body #phone').val(phone);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #name_ar').val(name_ar);
            modal.find('.modal-body #category_ar').val(category_ar);
            modal.find('.modal-body #name_en').val(name_en);
            modal.find('.modal-body #category_en').val(category_en);
            modal.find('.modal-body #patiant_doctor_date_date').val(patiant_doctor_date_date);
            modal.find('.modal-body #patiant_age').val(patiant_age);
            modal.find('.modal-body #patiant_name').val(patiant_name);
            modal.find('.modal-body #patiant_gender').val(patiant_gender);
            modal.find('.modal-body #patiant_phone').val(patiant_phone);
            if (report_text != null) {
                modal.find('.modal-body #report_text').append(report_text);
            }
            modal.find('.modal-body #patiant_doctor_hour_hour').val(patiant_doctor_hour_hour);


            // modal.find('.modal-body #patiant_doctor_status').val(patiant_doctor_status);


            if (patiant_doctor_status == 'ended') {
                $('#stat').text('{{trans('web.hanging_reservation')}}');
            }


        });

    </script>




    <script>
        $('#showdetailes2').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var patiant_doctor_doctor_image = button.data('patiant_doctor_doctor_image')
            var clinic_image = button.data('clinic_image')
            var title_ar = button.data('title_ar')
            var title_en = button.data('title_en')
            var details_ar = button.data('details_ar')
            var details_en = button.data('details_en')
            var old_price = button.data('old_price')
            var new_price = button.data('new_price')
            var clinic_name_ar = button.data('clinic_name_ar')
            var clinic_name_en = button.data('clinic_name_en')
            var clinic_rate = button.data('clinic_rate')
            var clinic_offer = button.data('clinic_offer')
            $(this).find('.modal-body #details_ar').text('');
            $(this).find('.modal-body #details_en').text('');

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #patiant_doctor_doctor_image').attr('src', patiant_doctor_doctor_image);
            modal.find('.modal-body #clinic_image').attr('src', clinic_image);
            modal.find('.modal-body #title_ar').text(title_ar);
            modal.find('.modal-body #title_ar').text(title_ar);
            modal.find('.modal-body #details_ar').text(details_ar);
            modal.find('.modal-body #details_en').text(details_en);
            modal.find('.modal-body #old_price').text(old_price);
            modal.find('.modal-body #new_price').text(new_price);
            modal.find('.modal-body #clinic_name_ar').text(clinic_name_ar);
            modal.find('.modal-body #clinic_name_en').text(clinic_name_en);
            modal.find('.modal-body #clinic_rate').text(clinic_rate);
            modal.find('.modal-body #clinic_offer').text(clinic_offer);

        });

    </script>



@endpush



