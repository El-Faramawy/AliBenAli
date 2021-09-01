@foreach($date->available_hour as $hour)
    <input   type="hidden" value="{{$hour->id}}"  name="hour_id">
    <div class="swiper-slide update_hour" attr_hour_id="{{$hour->id}}">
        <div class="contents-time {{$hour->is_reserved == 'yes' ? 'my-active-time':''}}">
            <h5 class=" font-weight-bold  "> {{date('h:i',strtotime($hour->hour))}}</h5>
            <p class=" mx-1 ">
                @if(app()->getLocale()=='en')
                    {{date('A',strtotime($hour->hour))}}
                @elseif(app()->getLocale()=='ar')
                    @if(date('A',strtotime($hour->hour))=='PM')
                        م
                    @else
                        ص
                    @endif
                @endif
            </p>
        </div>
    </div>
@endforeach
