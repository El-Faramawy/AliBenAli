@extends('layouts.site.app')
@section('site_content')
    <section class="hire">
        <div class="title-top">
            <div class="container">
                <div class="title-outer">
                    <h1>{{trans('web.services')}}</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{'index'}}">{{trans('web.home')}}</a></li>
                        <li class="px-2"><i class="fal fa-arrow-left"></i></li>
                        <li>{{trans('web.services')}} </li>
                    </ul>
                </div>
            </div>
        </div>
  <div class="offers-page">
    <div class="fields mt-5">
      <div class="container">
        <div class="row">
            @foreach($offers as $offer)
          <div class="col-md-4 mb-3">
            <a href="{{url('offer_details',$offer->id)}}">
              <div class="contents z-depth-1">
                <div class="img d-flex justify-content-center">
                  <img src="{{asset($offer->first_image->image)}}" alt="" srcset="" height="200px" width="250px">
                </div>
                <div class="bio mt-4">
                  <div class="row">
                    <div class="col-12 d-flex justify-content-between ">
                      <h5 class="text-center  font-weight-bold">{{$offer['title_'.app()->getLocale()]}}</h5>

                      <p> <span class="font-weight-bold text-danger">
                              @if($offer->rates->count() > 0)
                                <?php $total_rates = 0?>
                                @foreach($offer->rates as $rate)
                                    <?php $total_rates = $rate->rate + $total_rates ?>
                                @endforeach
                                  {{number_format($total_rates / $offer->rates->count(),1)}}
                                </span> / 5 <a href="" class="text-warning"> <i class="fad fa-star"></i> </a>
                              @else
                              <a href="" class="text-warning"> <i class="fad fa-star"></i> </a>
                              @endif
                      </p>

                     </div>

                    <div class="col-12">
                       <h6 class=" text-gray-400 mt-2 font-weight-bold">{{trans('web.Discount')}} {{$offer['offer']}}% <i class="fa fa-tags"></i></h6>


                      <p class=""> <i class="fad fa-wallet"></i> {{trans('web.price')}}   :
                          <span class="text-muted" style="text-decoration: line-through">{{$offer->old_price}}</span>
                          <span class="font-weight-bold text-primary"> {{$offer->new_price}} </span> {{trans('web.SR')}} {{--{{trans('web.instead')}}--}}</p>
                    </div>
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

