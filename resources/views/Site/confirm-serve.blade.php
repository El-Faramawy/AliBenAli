@extends('layouts.site.app')
<style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</style>
@section('site_content')
<div class="doctor-profile   pb-5">

    <div class="container">

      <form method="post" action="{{route('store_reservation')}}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="hour_id" value="{{$hour->id}}">
          <input type="hidden" name="date_id" value="{{$date->id}}">
          <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
        <div class="additional-informations mt-4  ">
          <h5 class="text-center py-3">{{trans('web.reserve_confirmation')}}{{--<small>( اختياري )</small>--}}</h5>
          <div class="row pt-4">
            <div class="col-lg-4 col-md-6">
              <div class="form-group">
                <label for="Specialization"> <span class="flaticon-medal"><i class="fad fa-calendar-day"></i></span>
                  {{trans('web.reservation_date')}}</label>
                <input type="date" disabled class="form-control" placeholder="{{date('h:i',strtotime($hour->hour))}}
                {{app()->getLocale()=='ar'?ArabicDate($date->date)['ar_day']:date('l',strtotime($date->date))}} {{date('j',strtotime($date->date))}} {{app()->getLocale()=='ar'?ArabicDate($date->date)['month']:date('F',strtotime($date->date))}}  "
                  style="height: 50px;">
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="form-group">
                <label for="Specialization"> <span class="flaticon-medal"><i class="fal fa-user"></i></span> {{trans('web.name')}} </label>
                <input type="text" name="name" class="form-control" style="height: 50px;" required>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="form-group">
                <label for="Specialization"> <span class="flaticon-medal"><i class="fad fa-phone"></i></span>
                {{trans('web.phone')}} </label>
                <input type="number" name="phone" class="form-control" style="height: 50px;" required>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="form-group">
                <label for="Specialization"> <span class="flaticon-medal"><i class="fad fa-stethoscope"></i></span>
                  {{trans('web.gender')}} </label>
                <select class=" select2" name="gender">
                  <option value="male"> {{trans('web.male')}} </option>
                  <option value="female"> {{trans('web.female')}} </option>
                </select>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="form-group">
                <label for="Specialization"> <span class="flaticon-medal"><i class="fad fa-stethoscope"></i></span>
                  {{trans('web.call_type')}} </label>
                <select class="form-control" style="height: 50px;" name="type">
                    @if($doctor->audio == 'yes')
                  <option value="audio" selected> {{trans('web.audio')}} </option>
                    @elseif(($doctor->audio == 'yes' && $doctor->video == 'yes') || $doctor->video == 'yes')
                  <option value="video" {{$doctor->audio == 'no'?'selected':''}}> {{trans('web.video')}} </option>
                    @endif

                </select>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="form-group">
                <label for="Specialization"> <span class="flaticon-medal"><i class="fad fa-stethoscope"></i></span>
                    {{trans('web.age')}} </label>
                  <input type="number" name="age" class=" form-control" style="height: 50px;" min="{{$doctor->min_age}}" max="{{$doctor->max_age}}">
              </div>
            </div>
            <div class="col-lg-6 col-md-6 ">
              <div class="form-group">
                <label for="image"> <span class="flaticon-medal"><i class="fal fa-paperclip"></i></span>{{trans('web.upload_file')}}</label>
                <input type="file" data-default-file="{{trans('web.click')}}" id="formFileMultiple" multiple name="image[]" class="dropify">
              </div>
            </div>
              <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                      <label for="disease_id"> <span class="flaticon-medal"><i class="fad fa-stethoscope"></i></span>
                          {{trans('web.disease')}} </label>
                      <select class="js-example-basic-multiple" name="diseases[]" multiple="multiple" style="width:100%; overflow: scroll" >
                          <option value="" disabled> {{trans('web.choose_disease')}}</option>
                          @foreach($diseases as $disease)
                              <option value="{{$disease->id}}"> {{$disease['title_'.app()->getLocale()]}} </option>
                          @endforeach
                      </select>
                  </div>
              </div>
          </div>
        </div>
        <div class="w-100 d-flex pt-4 justify-content-center">
          <button type="submit" class="btn btn-book">{{trans('web.complete_reservation')}} </button>
        </div>
      </form>
    </div>
  </div>
@endsection
@push('site_js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script></script>
@endpush
