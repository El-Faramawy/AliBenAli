@extends('layouts.site.app')
@section('site_content')

  <section class="hire">
    <div class="title-top">
      <div class="container">
        <div class="title-outer">
          <h1>  {{trans('web.join_us')}}</h1>
          <ul class="page-breadcrumb">
            <li><a href="{{'index'}}">{{trans('web.home')}}</a></li>
            <li class="px-2"><i class="fal fa-arrow-left"></i></li>
            <li>  {{trans('web.join_us')}} </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <h2 class="mt-5 mb-4 text-center font-weight-bold">
          {{$join_us['title_' .app()->getLocale()]}}
      </h2>
      <p class="mt-3 text-center para">
          {{$join_us['text_' .app()->getLocale()]}}
      </p>
      <div class="row py-5">
        @foreach($join_us_details as $join_us_detail)
            <div class="col-lg-4 col-sm-6 mb-3">
                <div class="contents">
                    <h4 class="job-title">
                        {{$join_us_detail['title_' .app()->getLocale()]}}
                    </h4>
                    <p class="field">{{trans('web.specialization')}} :<span>
                            {{$join_us_detail['category_' .app()->getLocale()]}}
                        </span></p>
                    <div class="time-locate">
                      <p class="gps"> <i class="fad fa-map-marker-alt"></i>
                          {{$join_us_detail['address_' .app()->getLocale()]}}
                      </p>
                      <p class="time-post"><i class="fad fa-clock"></i> {{$join_us_detail->created_at->format('Y-m-i')}} </p>
                    </div>
                    <div class="descri">
                      <p>
                          {{$join_us_detail['content_' .app()->getLocale()]}}
                      </p>
                    </div>
                    <div class="w-100 d-flex justify-content-center">
                      <button class="btn btn-applay" data-toggle="modal" data-target="#exampleModalCenter{{$join_us_detail->id}}">{{trans('web.apply_job')}}</button>
                    </div>
                  </div>
            </div>



              <div class="modal fade " id="exampleModalCenter{{$join_us_detail->id}}" tabindex="-1" role="dialog"
                   aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header d-flex justify-content-center">
                              <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle{{$join_us_detail->id}}">{{trans('web.apply_job')}}</h5>
                          </div>
                          <div class="modal-body">
                              <form action="{{route('apply_job')}}" enctype="multipart/form-data" method="post">
                                  {{csrf_field()}}
                                  <div class="col-md-6 mb-3">
                                      <input id="name" type="hidden" name="id"
                                             class="form-control"
                                             value="{{$join_us_detail->id}}"
                                             required disabled>
                                      <input id="id" type="hidden" name="id" class="form-control"
                                             value="{{$join_us_detail->id}}">
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6 mb-3">
                                          <input type="text" name="job_name" class="form-control" placeholder="{{trans('web.job_name')}}">
                                      </div>
                                      <div class="col-md-6 mb-3">
                                          <input type="text" name="name" class="form-control" placeholder="{{trans('web.all_name')}}  ">
                                      </div>
                                      <div class="col-md-6 mb-3">
                                          <input type="text" name="phone" class="form-control" placeholder="{{trans('web.phone')}}  ">
                                      </div>
                                      <div class="col-md-6 mb-3">
                                          <input type="email" name="email" class="form-control" placeholder="{{trans('web.email')}}  ">
                                      </div>
                                      <div class="col-md-6 mb-3">
                                          <input type="text" name="exp" class="form-control" placeholder="{{trans('web.exp')}}  ">
                                      </div>
                                      <div class="col-md-6 mb-3">
                                          <input type="text" name="present_job" class="form-control" placeholder="{{trans('web.present_job')}}  ">
                                      </div>
                                      <div class="col-md-12 mb-3">
                                          <textarea class="form-control" name="massage" rows="7" placeholder="{{trans('web.massage')}}"></textarea>
                                      </div>
                                      <div class="col-md-12 mb-3">
                                          <input type="file" name="image" class="form-control" style="padding-bottom: 37px !important;background: lightgrey;">
                                      </div>
                                  </div>
                                  <div class="modal-footer text-center d-flex justify-content-center">
                                      <button type="submit" class="btn btn-success" onClick="apply_job(this.id)">{{trans('web.save')}}</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal"> {{trans('web.cancel')}} </button>
                                  </div>
                              </form>
                          </div>

                      </div>
                  </div>
              </div>
          @endforeach
      </div>
      <!-- Modal -->
    </div>
  </section>
  @endsection


@push('site_js')
{{--    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}
@if (Session::has('massage'))
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '{{trans('web.sweet_alert_success')}}',
        showConfirmButton: false,
        timer: 3000,
        footer:'{{trans('web.sweet_waiting')}}',
    })
</script>
@endif
@if($errors->any('Success'))
<script>
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: '{{trans('web.sweet_alert_danger')}}',
        showConfirmButton: false,
        timer: 3000,
        footer:'{{trans('web.sweet_alert_again')}}',
    })
</script>
@endif

@endpush
