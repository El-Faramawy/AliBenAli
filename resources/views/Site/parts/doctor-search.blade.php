<div class="row">
    @foreach($doctors as $doctor)
        <div class=" col-lg-6 mb-3">
            <a href="{{url('doctor-profile',$doctor->id)}}">
                <div {{-- data-aos="flip-down" --}} class="contents  z-depth-1">
                    <div class="img d-flex justify-content-center">
                        <img src="{{get_file($doctor->image)}}" alt="{{$doctor['name_'.app()->getLocale()]}}" srcset="">
                    </div>
                    <div class="text">
                        <!-- <a href="" class="phone-icon"><i class="fas fa-phone-alt"></i></a>
                        <a href="" class="video-icon"><i class="fas fa-video"></i></a> -->
                        <a class=" py-2 font-weight-bold text-center"> {{$doctor['name_'.app()->getLocale()]}} </a>
                        <span class="float-left">
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
                            <a href="{{url('doctor-profile',$doctor->id)}}" class="btn">إحجز الأن</a>
                            <a href="{{url('doctor-profile',$doctor->id)}}" class="btn">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
