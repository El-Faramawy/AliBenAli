@extends('layouts.site.app')
@section('site_content')
<section class="chose-doctor position-relative" style="height: 45vh;">
    <div class="container py-4">
      <div class="row" style="    position: absolute;
      width: 85%; bottom: -40px">
        <div class="col-md-8 mx-auto">
          <form action="">
            <div class="select-div p-4 z-depth-1">
              <div class="form-group w-100">
                <label for="">
                  <i class="fal fa-bookmark"></i>
                  {{trans('web.chose_clinic')}}
                </label>
                <select name="" class="select2" id="clinic_id">
                  <option value="" disabled selected> {{trans('web.please_chose_clinic')}} </option>

                  <option value="all">{{app()->getLocale()=='en'?'all':'الكل'}} </option>
                    @foreach($clinics as $clinic)
                  <option value="{{$clinic->id}}" {{$clinic_!=''?$clinic->id==$clinic_->id?'selected':'':''}}> {{$clinic['name_'.app()->getLocale()]}}</option>
                    @endforeach
                </select>
              </div>
              <button  id="search_clinic" class="btn chose-doctor-search"> {{trans('web.search')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////          //////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <!--////////////////////////////////////////////////////////////////////////////////-->
  <div class="doctors-page py-5">
    <div class="doctors mt-5">
      <div class="container" id="returned_doctors">
        <div class="row" >
            @foreach($doctors as $doctor)
                <div class=" col-lg-6 mb-3">
                    <a href="{{url('doctor-profile',$doctor->id)}}">
                        <div data-aos="flip-down" class="contents  z-depth-1">
                            <div class="img d-flex justify-content-center">
                                <img src="{{get_file($doctor->image)}}" alt="{{$doctor['name_'.app()->getLocale()]}}" srcset="">
                            </div>
                            <div class="text">
                                <!-- <a href="" class="phone-icon"><i class="fas fa-phone-alt"></i></a>
                                <a href="" class="video-icon"><i class="fas fa-video"></i></a> -->
                                <a class=" py-2 font-weight-bold text-center"> {{$doctor['name_'.app()->getLocale()]}}</a>
                               <span >
                                @if($doctor->rates->count() > 0)
                                <?php $total_rates = 0?>
                                @foreach($doctor->rates as $rate)
                                <?php $total_rates = $rate->rate + $total_rates ?>
                                @endforeach
                                    @for($i = 1 ; $i <= number_format($total_rates / $doctor->rates->count(),0) ; $i++)
                                        <i class="fa fa-star text-warning"></i>
                                    @endfor
                                    @for($i = number_format($total_rates / $doctor->rates->count(),0) ; $i < 5 ; $i++)
                                        <i class="far fa-star text-warning"></i>
                                    @endfor
                                @else
{{--                                    <a href="" class="text-warning"> <i class="fad fa-star"></i> </a>--}}
                                @endif
                               </span>
                                <div class="my-custom-div mt-2">
                                    <p><i class="fad fa-medal"></i>{{$doctor['category_'.app()->getLocale()]}}
                                    </p>
                                </div>
                                <div class="btn-div d-flex justify-content-center pt-2 pb-2">
                                    <a href="{{url('doctor-profile',$doctor->id)}}" class="btn">{{trans('web.reserve_now')}}</a>
                                    <a href="{{url('doctor-profile',$doctor->id)}}" class="btn">{{trans('web.show_details')}}</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection

@push('site_js')
    <script>
        $(document).on('click','#search_clinic',function (e) {
            e.preventDefault();
            var clinic_id = $('#clinic_id').val()
            var routeAction = "{{url('doctor-search')}}"
            $.ajax({
                type: 'GET',
                url: routeAction,
                data: {'clinic_id':clinic_id},
                success:function(data){
                    // console.log(data.html_here)
                   $('#returned_doctors').html(data.html_here);
                   // $('.contents').attr('data-aos','flip-down');
                }
            });
        });

    </script>
@endpush


