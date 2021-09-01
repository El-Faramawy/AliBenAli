@extends('layouts.site.app')
@section('site_content')
    <section class="login">
        <div class="container  py-5 ">
            <!--Section: Content-->
            <section class="pb-5   ">
                <!--Grid row-->
                <div class="row py-4 py-md-0 d-flex justify-content-center">
                    <!--Grid column-->
                    <div class="col-md-6  px-md-5 ">
                        <div class="formDiv  p-4 py-4 ">
                            <form action="{{route('post_login')}}" class="text-center" method="post" id="Form"  >
                                @csrf
                                <p class="h4  mt-3 font-weight-bold">{{trans('web.login')}}</p>
                                <div class="hr d-flex align-items-center justify-content-center">
                                    <hr class="border-line  mb-5">
                                </div>
                                <!-- Email -->
                                <div class="input-1">
                                    <input type="text" id="phone" name="phone" class="numbersOnly mt-3 form-control mb-3 pr-5"
                                           placeholder="{{trans('web.phone')}}  ">
                                    <i class="fad fa-phone user"></i>
                                </div>
                                <!-- Password -->
                                <div class="input-2">
                                    <input type="password" id="password" name="password" class="form-control  pr-5 mb-3"
                                           placeholder="  {{trans('web.password')}}">
                                    <i class="fal user fa-lock-alt"></i>
                                </div>
{{--                                <p class="text-right pb-3"><a href="#">هل نسيت كلمة المرور ؟</a></p>--}}
                                <!-- Sign in button -->
                                <button type="submit" class="btn btn-login  mb-2"> {{trans('web.confirm')}}</button>
                                <div class="socia my-3">
                                    <!--Facebook-->
                                    <!-- <a class="btn-floating btn-md btn-fb" type="button" role="button"><i
                                        class="fab fa-facebook-f"></i></a> -->
                                    <!--Google +-->
                                    <!-- <a class="btn-floating btn-md btn-gplus" type="button" role="button"><i
                                        class="fab fa-google-plus-g"></i></a> -->
                                </div>
                                <p>{{trans('web.not_have_an_account')}}<a href="{{url('register')}}">{{trans('web.make_an_account')}}</a></p>
                            </form>
                        </div>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!--Section: Content-->
        </div>
    </section>
@endsection
@push('site_js')
    <script>

        $(document).on('submit','form#Form',function(e) {
            e.preventDefault();
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            var url = $('#Form').attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('.spinner').show()
                },
                success: function (data) {
                    window.setTimeout(function() {
                        $('.spinner').hide()
                        if (data.type == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'تم التسجيل بنجاح ...',
                                showConfirmButton: false,
                                timer: 2000,
                            });
                            setTimeout(function(){ window.location = data.url},2000);
                        }
                        if (data.type == 'error') {
                            $.each(data.message, function(key, value) {
                                toastr.options.timeOut = 10000;
                                toastr.error(data.message[key]);
                            });
                        }
                    }, 1500);
                },
                error: function (data) {
                    $('.spinner').hide()
                    if (data.status === 500) {
                        Swal.fire({
                            title: 'هناك خطأ',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        $('#close_modal').click();
                    }
                },//end error method
                cache: false,
                contentType: false,
                processData: false
            });

        });

    </script>
@endpush

