@extends('layouts.site.app')
@section('site_content')
{{--  <div class="  offers-details  pb-3">--}}
  <div class="  profile-of-doctor py-3">


    <div class="offer-slider   pt-5">



        <div class="container  mb-5">

          <!-- Start Swiper -->

          <div class="swiper-container offers z-depth-1">
            <div class="swiper-wrapper ">
              @foreach($details->images as $image)
              <div class="swiper-slide " style="background-image: url({{url($image->image)}});"></div>
                @endforeach

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
          </div>

          <!-- End Swiper -->


        </div>


      </div>



{{--   <div class="img d-flex justify-content-center ">--}}
{{--     <img src="{{asset($details->first_image->image)}}" alt="" srcset="">--}}
{{--   </div>--}}
   <div class="container">
     <div class="bio py-5">
       <div class="row">
         <div class="col-12 d-flex justify-content-between">
             <p> <span class="font-weight-bold text-danger">
                              @if($details->rates->count() > 0)
                         <?php $total_rates = 0?>
                         @foreach($details->rates as $rate)
                             <?php $total_rates = $rate->rate + $total_rates ?>
                         @endforeach
                         {{number_format($total_rates / $details->rates->count(),1)}}
                                </span> / 5 <a href="" class="text-warning"> <i class="fad fa-star"></i> </a>
                 @else
                     <a href="" class="">{{trans('web.no_rate')}} <i class="fad fa-star text-warning"></i> </a>
                 @endif
             </p>
          </div>

         <div class="col-12">
           <h3 class="text-center mt-4 font-weight-bold">{{$details['title_'.app()->getLocale()]}}</h3>
             <h6 class=" text-gray-400 mt-2 font-weight-bold">{{trans('web.Discount')}} {{$details['offer']}}% <i class="fa fa-tags"></i></h6>

             <p class=""> <i class="fad fa-wallet"></i> {{trans('web.price')}}   : <span
                     class="font-weight-bold text-primary"> {{$details->new_price}} </span> {{trans('web.SR')}} {{trans('web.instead')}} <span class="text-danger" style="text-decoration: line-through">{{$details->old_price}}</span></p>
         </div>
       </div>
     </div>



     <div class="details my-4 py-5">
         <div class="title mb-4">
             <i class="fad fa-info px-2"></i>
          <h5> {{trans('web.details')}}   </h5>
         </div>

         <p class="px-2">{{$details['details_'.app()->getLocale()]}}</p>

      </div>



      @if($details->rates->count() > 0)
     <div class="rate px-3  mt-4 py-3">
       <div class="d-flex justify-content-between">
         <p> <i class="fad fa-map-marker-alt"></i> {{trans('web.rates')}} ( {{trans('web.from')}} {{$details->rates->count()}} {{trans('web.visitor')}} )</p>
         <p> <span class="font-weight-bold text-danger">
                     @if($details->rates->count() > 0)
                     <?php $total_rates = 0?>
                     @foreach($details->rates as $rate)
                         <?php $total_rates = $rate->rate + $total_rates ?>
                     @endforeach
                     {{number_format($total_rates / $details->rates->count(),1)}}
                                </span> / 5 <a href="" class="text-warning"> <i class="fad fa-star"></i> </a>
             @else
                 <a href="" class="">{{trans('web.no_rate')}} <i class="fad fa-star text-warning"></i> </a>
             @endif
         </p>
       </div>


       <section class="CarsSlider">

         <div class="swiper-container cars">
           <div class="swiper-wrapper">
              @foreach($details->rates as $rate)
             <div class="swiper-slide">
               <div class="swipper-contents  ">
                 <div style="border-radius: 8px;" class=" d-flex bg-white p-2 justify-content-between">
                   <p style="color: #777777;">{{date_format($rate->created_at,'d / m / Y')}}</p>
                   <p style="color: gold;">
                       @for($i = 1 ; $i <= number_format($rate->rate,0) ; $i++)
                            <i class="fa fa-star"></i>
                       @endfor
                       @for($i = number_format($rate->rate,0) ; $i < 5 ; $i++)
                            <i class="far fa-star"></i>
                       @endfor
                   </p>

                 </div>


                 <p class="font-weight-bold py-3"> {{$rate->user->name}} </p>
                 <p class="pb-3"> {{$rate->title}} </p>
               </div>
             </div>
              @endforeach

             <!-- <a href="#!" class="swiper-slide "><img src="img/cars/dodge-icon.jpg"></a> -->
           </div>
           <!-- Add Arrows -->
           <!-- <div class="swiper-button-next"></div>
             <div class="swiper-button-prev"></div> -->
         </div>

       </section>


     </div>
      @endif

     <div class="w-100 pt-3 d-flex justify-content-center">
       <button class="btn btn-book" data-toggle="modal" data-target="#exampleModalCenter">{{trans('web.reserve_appointment')}}</button>
       </div>


       <!-- Modal -->
       <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

           <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
           <div class="modal-dialog modal-lg modal-dialog-centered" role="document">


               <div class="modal-content">
                   <div class="modal-header d-flex justify-content-center">
                       <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle"> {{trans('web.avaliable_appointment')}} </h5>

                   </div>
                   <form action="{{route('chose_offer_date')}}"  method="POST" >
                       @csrf
                       <div class="modal-body">

                           <section class="CarsSlider" style="padding: 0;">
                               <div class="container">
                                   <h4 class="font-weight-bold mb-3"> {{trans('web.chose_day')}} </h4>

                                   <div class="swiper-container cars">
                                       <div class="swiper-wrapper">



                                           @foreach($details['available_date'] as $date)
                                               <input type="hidden" value="{{$date->id}}" id="date_id" name="date_id">
                                               <div class="swiper-slide day" date="{{$date->id}}">
                                                   <div class="contents">
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


                           <section class="CarsSlider chose-time" style="padding: 0;  display: none;">
                               <div class="container">
                                   <h4 class="font-weight-bold my-3"> {{trans('web.chose_hour')}} </h4>

                                   <div class="swiper-container cars">
                                       <div class="swiper-wrapper" id="hours">


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
                           <button type="submit" class="btn bg-info text-white"><a class="text-white">{{trans('web.complete')}}</a></button>
                           <button type="button" class="btn bg-danger text-white" data-dismiss="modal"> {{trans('web.cancel')}}</button>

                       </div>
                   </form>
               </div>
           </div>
       </div>

   </div>

</div>

@endsection
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
        var swiper = new Swiper('.offers', {
            spaceBetween: 30,

            effect: 'fade',

            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>

    <script>

        $(document).on('click','.contents',function(e){
            e.preventDefault();
            var op = $(this)
            var content_classes = document.getElementsByClassName("contents");

            for(var i = 0; i < content_classes.length; i++){
                $(content_classes[i]).removeClass('my-active')
            }

            op.addClass('my-active')
        })


        $(document).on('click','.contents-time',function(e){
            e.preventDefault();
            var op = $(this)
            var content_classes = document.getElementsByClassName("contents-time");

            for(var i = 0; i < content_classes.length; i++){
                $(content_classes[i]).removeClass('my-active-time')
            }

            op.addClass('my-active-time')
        })


        $(document).on('click','.contents-back-end',function(e){
            e.preventDefault();
            var op = $(this)
            var content_classes = document.getElementsByClassName("contents-back-end");

            for(var i = 0; i < content_classes.length; i++){
                $(content_classes[i]).removeClass('my-active-time')
            }

            op.addClass('my-active-time')
        })



    </script>


    {{--========================================= developed  ============================--}}
    <script>
        $(".day").click(function () {
            var date_id_ = $(this).attr('date');
            var routeAction = "{{url('offer_details',$details->id)}}";

            $.ajax({
                type: 'GET',
                url: routeAction,
                data: {'date_id': date_id_},
                success: function (data) {
                    $('#hours').html(data.html)
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
        $(document).on('submit', 'form#Form', function () {
            var myForm = $("#Form")[0]
            var date_id = $('#date_id').val();
            var hour_id = $('#hour_id').val();
            var url = $('#Form').attr('action');

            $.ajax({
                url: url,
                type: 'POST',
                data: {'date_id': date_id, 'hour_id': hour_id},
                beforeSend: function () {
                    $('.loader-inner').show()
                },
                success: function (data) {
                    window.setTimeout(function () {
                        $('.loader-inner').hide()
                        if (data.type == 'success') {
                            $('#exampleModalCenter').modal('hide');
                            setTimeout(function () {
                                window.location = data.url
                            }, 2000);
                        }
                        if (data.type == 'error') {
                            Swal.fire({
                                title: 'هناك خطأ',
                                text: 'قم باختيار البيانات',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 2000,
                            });
                        }
                    }, 1500);
                },
                error: function (data) {
                    $('.loader-inner').hide()
                    if (data.status === 500) {
                        Swal.fire({
                            title: 'هناك خطأ',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        $('#exampleModalCenter').modal('hide');
                    }
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>

@endpush
