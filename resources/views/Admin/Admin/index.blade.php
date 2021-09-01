@extends('layouts.admin.app')
@section('title')
    <li class="m-nav__item">
        <a href="{{route('show-admins')}}" class="m-nav__link">
            <span class="m-nav__link-text">المشرفين</span>
        </a>
    </li>
    <li class="m-nav__separator">-</li>
    <li class="m-nav__item">
        <a href="{{route('add-admin')}}" class="m-nav__link">
            <span class="m-nav__link-text">اضافة مشرف جديد</span>
        </a>
    </li>
@endsection
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>


    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            مشرفين المستشفي
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
                            <a href="{{route('add-admin')}}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" >
                            <span>
                                <i class="la la-plus"></i>
                                <span>مشرف جديد</span>
                            </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">

                <!--begin: Datatable -->






                <table id="example" class="table table-striped- table-bordered table-hover table-checkable" style="width:100%">
                    <thead>
                    <tr>
                        <th style="width: 30px!important;">
                            <input type="checkbox" class="check_all" style="box-sizing: border-box;background-color: indigo!important;font-size: 10px" onclick="check_all()" />
                        </th>
                        <th>#</th>
                        <th>الإسم</th>
                        <th>البريد الإلكترونى</th>
                        <th>رقم الهاتف</th>
                        <th>الصوره</th>
                        <th>تعديل</th>
                        <th>حذف</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0 ?>
                    @foreach($get as $user)
{{--                        @if($user->id != admin()->user()->id)--}}
                        <tr>
                            <td>
                                <input type="checkbox" name="checkvalue" id="checkItem" class="item_checkbox" style="margin-right: -21px!important;" value="{{$user->id}}">
                            </td>
                            <td>{{$i}}</td>

                            <td>{{$user->name_ar}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td><img style="width: 50px;height: 50px;border-radius: 50%" src="{{get_file($user->image)}} " alt="user" onclick="window.open(this.src)"/></td>
                            <td >
                                <form action="{{route('admin_edit',$user->id)}}" enctype="application/x-www-form-urlencoded" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <button type="submit" class="btn btn-info btn-sm"   ><i class="fa fa-edit" style="margin-left: 1px"></i></button>
                                </form>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm"    data-toggle="modal"  data-target="#delete{{$user->id}}" ><i class="fa fa-trash" style="margin-left: 1px"></i></button>
                            </td>

                            <?php
                            $i++?>

                            <div id="delete{{ $user->id }}" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <span style="float: right;font-weight: bold;font-style: italic">حذف مشرف</span>
                                            <button class="btn btn-sm btn-info" style="float: left" data-dismiss="modal"> x </button>
                                        </div>
                                        <form action="{{route('admin_delete')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <div class="modal-body">
                                                <h4>هل أنت متاكد من حذف  {{$user->name_ar}} ؟ </h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button  type="button" class="btn btn-info " data-dismiss="modal">الغاء</button>
                                                <button class="btn btn-danger" type="submit">حذف</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </tr>
{{--                        @endif--}}
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
                <form action="{{route('admin_check.delete')}}" method="post" enctype="application/x-www-form-urlencoded">
                    @csrf
                    <input type="hidden" name="id" value="" />
                    <div class="modal-header">
                        <span style="float: right;font-weight: bold;font-style: italic">حذف مشرفين</span>
                        <button class="btn btn-sm btn-info" style="float: left" data-dismiss="modal"> x </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-dark text-center" style="border: 0">
                            <h4 id="text">هل انت موافق على حذف المشرفين المحددين<br> وعددهم <span id="span" style="color:red;"></span> ! </h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  type="button" class="btn btn-info " data-dismiss="modal">الغاء</button>
                        <button class="btn btn-danger" type="submit">تأكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
