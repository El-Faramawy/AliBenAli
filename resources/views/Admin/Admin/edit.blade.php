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
    <div class="main_cotent">
        <div class="box" style="margin: 25px 0px;">


            <div class="box">

                <div class="box-header">
                    <h3 class="box-title"> تعديل المشرف</h3>
                </div>
                <hr><br>
                <!-- /.box-header -->
            @foreach($data as $user)
                <form method="POST" action="{{route('store.admin_update')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{--                    <input name="_token" type="hidden" value="sSfedSAmdwxno23r3PS9EJkR1kgoFfXukhDOHJ9o">--}}
                    @csrf
                    <input name="id" type="hidden" value="{{$user->id}}">
                    <div class="row">
                    <div class="form-group col-6">
                        <label for="name">الإسم:</label>
                        <input class="form-control" name="name_ar" type="text" id="name" placeholder="الإسم..." value="{{$user->name_ar}}">
                    </div>
                    <div class="form-group col-6">
                        <label for="name">البريد الإلكترونى:</label>
                        <input class="form-control" name="email" type="email" id="name" placeholder="البريد الإلكترونى..." value="{{$user->email}}">
                    </div>
                    <div class="form-group col-6">
                        <label for="name">رقم الهاتف:</label>
                        <input class="form-control numbersOnly" name="phone" type="text" id="name" placeholder="رقم الهاتف..." value="{{$user->phone}}">
                    </div>
                    <div class="form-group col-6">
                        <label for="name">كلمة السر:</label>
                        <input class="form-control" name="password" type="password" id="name" placeholder="*******">
                    </div>


                    <div class="form-group col-12">
                        <label for="image">الصوره</label>
                        <input type="file" name="image"  id="input-file-now-custom-1" class="dropify" style="border-radius: 20px"
                               data-default-file="{{get_file($user->image)}}" >
                    </div>
                    </div>

                    <div style="text-align: center" class="mt-5">
                        <input class="btn btn-info col-2 text-center" style="font-size: medium" type="submit" value="تأكيد">
                    </div>
                </form>
                @endforeach


            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->



    </div>
    {{--    </div>--}}

@endsection
