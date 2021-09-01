@extends('layouts.admin.app')
@section('page_name') تعديل عرض @endsection
@section('content')
    <br>
    <br>
    <br>
    <br>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: '{{$errors->first()}}',
                text: 'حاول مرة اخري!',
                confirmButtonText: 'حسنا',

// footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    <div class="card card-custom mr-3">
        <div class="card-header">
            <div class="row">
                <h3 class="card-title fs-2">
                    تعديل بيانات عرض
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form class="form" method="post" action="{{route('admin.update.offer')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name = 'id'  value="{{$offer->id}}">
            <input type="hidden" name = 'num'  value="1">
            <div class="">
                @if($offer->images)
            @foreach($offer->images as $image)
            <span class=""><img height="140" src="{{asset($image->image)}}" onclick="window.open(this.src)"> </span>
            @endforeach
                @endif
            </div>
            <div class="card-body">
                <div class="text-center">
                    <div class="form-group">
                        <label for="image"> <span class=""></span> تعديل الصور <i class="fa fa-paperclip"></i></label>
                        <input type="file" id="formFileMultiple" multiple name="image[]" class="dropify">
                    </div>
                    </div>
                    <!--end::Image input-->
                    <!--begin::Hint-->
                    <div class="form-text mb-4">مسموح بالصيغ الاتية: png, jpg, jpeg.</div>
                    <!--end::Hint-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label required fw-bold fs-4">اسم العرض :</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="title_ar" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="اسم العرض باللغة العربية" value="{{$offer->title_ar}}" autocomplete="off">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="title_en" class="form-control form-control-lg form-control-solid" placeholder="اسم العرض باللغة الانجليزية"  value="{{$offer->title_en}}" autocomplete="off">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-2 col-form-label required fw-bold fs-4">تفاصيل العرض :</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="details_ar" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="تفاصيل العرض باللغة العربية" value="{{$offer->details_ar}}" autocomplete="off">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="details_en" class="form-control form-control-lg form-control-solid" placeholder="تفاصيل العرض باللغة الانجليزية" value="{{$offer->details_en}}"  autocomplete="off">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label required fw-bold fs-4">السعر قبل الخصم :</label>
                    <div class="col-lg-4">
                        <input type="number" name="old_price" id="old_price" class="edit_offer form-control form-control-lg form-control-solid mb-lg-0" min="0" value="{{$offer->old_price}}">
                    </div>
                    <label class="col-lg-2 col-form-label required fw-bold fs-4">نسبة الخصم :</label>
                    <div class="col-lg-4">
                        <input type="number" name="offer" id="offer" class="edit_offer form-control form-control-lg form-control-solid mb-lg-0" max="100" min="0" value="{{$offer->offer}}" placeholder="%">
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label required fw-bold fs-4">السعر الجديد :</label>
                    <div class="col-lg-4">
                        <input class="form-control form-control-lg form-control-solid mb-lg-0" name="new_price" id="new_price" placeholder="" value="{{$offer->new_price}}"/>
                    </div>
                    <label class="col-lg-2 col-form-label required fw-bold fs-4">القسم التابع :</label>
                    <div class="col-lg-4 fv-row fv-plugins-icon-container">
                                <select class="form-control form-select form-control-lg form-control-solid mb-lg-0" name="clinic_id">
                                    <option selected value="{{$offer->clinic_id}}">{{$offer->clinic->name_ar}}</option>
                                    @foreach($clinics as $clinic)
                                     <option value="{{$clinic->id}}">{{$clinic->name_ar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-2">
                        <button type="submit" class="btn font-weight-bold btn-success mr-2">حفظ البيانات</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>
<script src="{{url('/')}}/admin/assets/js/sweet.js"></script>

<script>
    $(document).ready(function(){
        $("offer").keydown(function(){
            $("new_price").val('');
        });
        $('.edit_offer').keyup(function(){
            var old = $("#old_price").val();
            var offer = $("#offer").val();
            if( old == 0){
                $("new_price").val('');
                Swal.fire({
                    icon: 'error',
                    title: 'ادخل السعر قبل الخصم',
                    text: '',
                    confirmButtonText: 'حسنا',
                })
            }
            if( offer > 100 || offer < 0){
                $("new_price").val('');
                Swal.fire({
                    icon: 'error',
                    title: 'يجب ان تكون النسبة من 0 الي 100% !',
                    text: 'ادخل نسبة صحيحة',
                    confirmButtonText: 'حسنا',
                })
            }
            else{
                var price_after = (old - old * offer / 100).toFixed(2)
                $("#new_price").val(price_after);
            }
        });
    });
</script>
