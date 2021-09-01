@extends('layouts.admin.app')
@section('title')
    <li class="m-nav__item">
        <a href="{{route('games')}}" class="m-nav__link">
            <span class="m-nav__link-text">الالعاب</span>
        </a>
    </li>
    <li class="m-nav__separator">-</li>
    <li class="m-nav__item">
        <a href="{{route('add_game')}}" class="m-nav__link">
            <span class="m-nav__link-text">اضافة لعبة جديدة</span>
        </a>
    </li>
@endsection
@section('content')
    <style type="text/css">
        .Table
        {
            display: table;
            width: 100%;
        }
        .Title
        {
            display: table-caption;
            text-align: center;
            font-weight: bold;
            font-size: larger;
        }
        .Heading
        {
            display: table-row;
            font-weight: bold;
            text-align: center;
        }
        .Row
        {
            display: table-row;
            width: 100%;
        }
        .Cell
        {
            display: table-cell;
            padding-left: 5px;
            padding-right: 5px;
            border-left: solid 1px;
            width: 200px;
        }
        .Cell2
        {
            display: table-cell;
            padding-left: 5px;
            padding-right: 5px;
        }
        @media (max-width: 768px){
            #details2 {
                width: 450px !important;
            }
            .Table {
                width: 400px !important; ;
            }
        }
    </style>

    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            الالعاب
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <button type="button" class="dt-button btn btn-danger delBtn btn_space" style="left: auto!important;" onclick="multycheck(); return false;"  data-toggle="modal"  data-target="#check" id="pass"><i class="fa fa-trash"></i></button>
                        </li>
                        <li class="m-portlet__nav-item"></li>

                        <li class="m-portlet__nav-item">
                            <a href="{{route('add_game')}}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus"></i>
                                <span>لعبة جديدة</span>
                            </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">

                <!--begin: Datatable -->



                <table id="example" class="table table-striped table-responsive-sm table-bordered table-hover table-checkable" style="width:100%">
                    <thead style="background-color: #34bfa3;">
                    <tr>
                        <th style="width: 30px!important;">
                            <input type="checkbox" class="check_all" style="box-sizing: border-box;background-color: indigo!important;font-size: 10px" onclick="check_all()" />
                        </th>
                        <th>#</th>
                        <th>الاسم </th>
                        <th>البلد </th>
                        <th>الصورة </th>
                        <th>التفاصيل</th>
                        <th>الباقات</th>
                        <th>تعديل</th>
                        <th>حذف</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($game as $data)
                        <tr>
                            <td>
                                <input type="checkbox" name="checkvalue" id="checkItem" class="item_checkbox" style="margin-right: -21px!important;" value="{{$data->id}}">
                            </td>
                            <td>{{$i}}</td>
                            <td>{{$data->title_ar}}</td>
                            <td>
                                @foreach($areas as $area)
                                    {{$area->id==$data->area_id ?$area->title_ar:''}}
                                @endforeach
                            </td>
                            <td><img src="{{get_file($data->image)}}" width="70px" height="70px" onclick="window.open(this.src)"></td>
                            <td>
                                <a href="#" class=" btn py-2 px-3 btn-primary mt-2" data-toggle="modal" data-target="#details{{ $data->id }}" data-placement="left"
                                   title="التفاصيل "><i class="fas fa-info"></i> </a>
                            </td>
                            <td>
                                <a  href="{{route('packages',$data->id)}}"><button type="button" class="btn py-2 px-3 btn-success mt-2" data-placement="left" title="الباقات ">
                                        <i class="fa fa-gift " style="margin-left: 1px"></i></button></a>
                            </td>
                            <td>
                                <a  href="{{route('edit_game',$data->id)}}"><button type="button" class="btn py-2 px-3 btn-info mt-2" data-placement="left" title="تعديل ">
                                        <i class="fa fa-edit" style="margin-left: 1px"></i></button></a>
                            </td>
                            <td>
                                <button type="button" class="btn py-2 px-3 btn-danger mt-2"    data-toggle="modal"  data-target="#delete{{$data->id}}" data-placement="left" title="حذف ">
                                    <i class="fa fa-trash" style="margin-left: 1px"></i></button>
                            </td>
                            <?php $i++ ?>
                            <div id="delete{{ $data->id }}" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <span style="float: right;font-weight: bold;font-style: italic">حذف لعبة</span>
                                            <button class="btn btn-sm btn-info" style="float: left" data-dismiss="modal"> x </button>
                                        </div>
                                        <form action="{{route('delete_game')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                            <div class="modal-body">
                                                <h4> هل أنت متاكد من حذف  {{$data->title_ar}}</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button  type="button" class="btn btn-info " data-dismiss="modal">{{ trans('الغاء') }}</button>
                                                <button class="btn btn-danger" type="submit">{{trans('حذف')}}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="details{{$data->id}}" class="modal fade" role="dialog" >
                                <div class="modal-dialog" style="margin-left: 45%">
                                    <div class="modal-content" style="width: 900px!important;">
                                        <div class="modal-header">
                                            <button type="button" class=" btn btn-sm btn-danger" style="float: left" data-dismiss="modal" >X</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="Table">
                                                <div class="Title">
                                                    <p>تفاصيل اللعبة :</p>
                                                </div>

                                                <div class="Row" style="background-color: LightGray">
                                                    <div class="Cell" >
                                                        <p> اسم اللعبة :</p>
                                                    </div>
                                                    <div class="Cell2">
                                                        <p>{{$data->title_ar}}</p>
                                                    </div>
                                                </div>
                                                <div class="Row" >
                                                    <div class="Cell" >
                                                        <p>اسم المنطقة :</p>
                                                    </div>
                                                    <div class="Cell2">
                                                        @foreach($areas as $area)
                                                            <p>{{$area->id == $data->area_id?$area->title_ar:''}}</p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="Row" style="background-color: LightGray">
                                                    <div class="Cell" >
                                                        <p> اللغة :</p>
                                                    </div>
                                                    <div class="Cell2">
                                                        @foreach($languages as $language)
                                                            <p>{{$language->id == $data->language_id?$language->title_ar:''}}</p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="Row" >
                                                    <div class="Cell" >
                                                        <p>المنصة :</p>
                                                    </div>
                                                    <div class="Cell2">
                                                        @foreach($platforms as $platform)
                                                            <p>{{$platform->id == $data->platform_id?$platform->title_ar:''}}</p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="Row"  style="background-color: LightGray">
                                                    <div class="Cell" >
                                                        <p> نوع اللعبة :</p>
                                                    </div>
                                                    <div class="Cell2">
                                                        @foreach($types as $type)
                                                            <p>{{$type->id == $data->game_type_id?$type->title_ar:''}}</p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="Row"  >
                                                    <div class="Cell" >
                                                        <p> العملة :</p>
                                                    </div>
                                                    <div class="Cell2">
                                                        @foreach($currencys as $currency)
                                                            <p>{{$currency->id == $data->currency_id?$currency->title_ar:''}}</p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="Row"  style="background-color: LightGray">
                                                    <div class="Cell" >
                                                        <p> الحد الادنى :</p>
                                                    </div>
                                                    <div class="Cell2">
                                                        <p>{{$data->min_quantity}}</p>
                                                    </div>
                                                </div>
                                                <div class="Row"  >
                                                    <div class="Cell" >
                                                        <p> الحد الاقصى :</p>
                                                    </div>
                                                    <div class="Cell2">
                                                        <p>{{$data->max_quantity}}</p>
                                                    </div>
                                                </div>
                                                <div class="Row"  style="background-color: LightGray">
                                                    <div class="Cell" >
                                                        <p> كمية اللعبة المجانية :</p>
                                                    </div>
                                                    <div class="Cell2">
                                                        <p>{{$data->free_num}}</p>
                                                    </div>
                                                </div>
                                                <div class="Row" >
                                                    <div class="Cell" >
                                                        <p> اللينك :</p>
                                                    </div>
                                                    <div class="Cell2">
                                                        <p>
                                                            <a target="_blank" href="{{$data->link}}" >الذهاب للعنوان</a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="Row"  style="background-color: LightGray">
                                                    <div class="Cell" >
                                                        <p> الملاحظات :</p>
                                                    </div>
                                                    <div class="Cell2">
                                                        <p >
                                                            {{!!$data->details}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="Row" >
                                                    <div class="Cell" >
                                                        <p> خطوات الدفع :</p>
                                                    </div>
                                                    <div class="Cell2">
                                                        <p>
                                                            {{!!$data->pay_steps}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info" data-dismiss="modal">غلق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </tr>
                    @endforeach


                    </tbody>

                </table>
            </div>
        </div>

        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
    <div id="check" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('multi_delete_game')}}" method="post" enctype="application/x-www-form-urlencoded">
                    @csrf
                    <input type="hidden" name="id" value="" />
                    <div class="modal-header">
                        <span style="float: right;font-weight: bold;font-style: italic">حذف الالعاب</span>
                        <button class="btn btn-sm btn-info" style="float: left" data-dismiss="modal"> x </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger text-center">
                            <h4 id="text">هل انت موافق على حذف الالعاب المحددة<br>
                            وعددهم <span id="span" style="color:red;"></span>! </h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  type="button" class="btn btn-info " data-dismiss="modal">{{ trans('الغاء') }}</button>
                        <button class="btn btn-danger" type="submit">{{trans('حذف')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
