@extends('layouts.site.app')
@section('site_content')
  <section class="register">
    <div class="container  py-5 ">
      <!--Section: Content-->
      <section class=" mt-3 ">
        <!--Grid row-->
        <div class="row py-4 py-md-0 d-flex justify-content-center">
          <!--Grid column-->
          <div class="col-md-10 main-col  px-md-5 ">
            <div class="formDiv  p-3 py-4 ">
              <p class="h4 text-center  mt-3 font-weight-bold">{{trans('web.create_account')}}</p>
              <div class="hr d-flex align-items-center justify-content-center">
                <hr class="border-line  mb-5">
              </div>
              <!-- Tab panels -->
              <div class="tab-content">
                <!-- Panel 1 -->
                <div class="tab-pane fade in show active" id="panel555" role="tabpanel">
                  <!-- Nav tabs -->
                    <form class="text-center"  method="post"  action="{{route('register_user')}}" id="Form" >
                    @csrf
                    <div class="row py-5">
                      <div class="col-md-12">
                        <div class="input-1">
                          <input type="text" class="form-control mb-3 pr-5" name="name" placeholder=" {{trans('web.name')}}  " >
                          <i class="fad fa-id-card-alt user"></i>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <!-- كود الجوال -->
                        <div class="input-2">
                          <select type="number" id="phone_code" name="phone_code" class="form-control  pr-5 mb-3 select2">
                              <option selected disabled value="" >{{trans('web.phone_code')}}</option>
                              @foreach($phone_codes as $key=>$code)
                                <option value="{{$key}}" >{{$code}}</option>
                              @endforeach
                          </select>
                          <i class="fad fa-phone user"></i>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <!-- رقم الجوال -->
                        <div class="input-2">
                          <input type="number" id="phone" name="phone" class="form-control  pr-5 mb-3"
                            placeholder=" {{trans('web.phone')}}  " >
                          <i class="fad fa-phone user"></i>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <!-- كلمة المرور -->
                        <div class="input-1">
                          <input type="password" id="password" name="password" class="  form-control mb-3 pr-5" placeholder="{{trans('web.password')}}" >
                          <i class="fad fa-lock-alt user"></i>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <!-- إعادة كلمةالمرور   -->
                        <div class="input-2">
                          <input type="password" id="confirm_password" name="confirm_password" class="form-control  pr-5 mb-3" placeholder="{{trans('web.confirm_password')}}" >
                          <i class="fad fa-lock-alt user"></i>
                        </div>
                      </div>
                    </div>
                        <div id="recaptcha-container"></div>
                        <!-- Sign in button -->
                    <button class="btn btn-login  mb-2" type="submit" id="check_phone">{{trans('web.register')}} </button>
                  </form>
                  <!-- Nav tabs -->
                </div>

              </div>

              <p class="text-center " style="color: black"> {{trans('web.have_account')}} <a class="login-link" href="{{url('login')}}"> {{trans('web.login')}}</a></p>
            </div>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </section>
      <!--Section: Content-->
    </div>
  </section>

  {{--    ============ modal  =============--}}
  <div class="modal" tabindex="-1" id="exampleModal">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">{{trans('web.phone_activation_code')}}</h5>
                  <button id="close_modal" type="button" class="btn-close mo-close-btn close_model" data-dismiss="modal" aria-label="Close">
                      <i class="fal fa-window-close"></i>
                  </button>
              </div>
              <form id="confirm_form" method="post"  >
                  @csrf
                  <div class="modal-body">
                      <p class="h4   mt-3  font-weight-bold ">{{trans('web.activation_code')}} </p>
                      <div class="hr d-flex align-items-center justify-content-center">
                          <hr class="border-line  mb-2">
                      </div>
                      <p class="text-center  py-2 my-2">{{trans('web.please_enter_code')}}</p>
                      <p class="number text-center mb-3 pb-2" id="phone_"></p>

                      <div class="form-outline">
                          <input class="form-control numbersOnly" id="verificationCode" type="text" maxlength="6">
                      </div>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                      <button type="button" class="btn btn-secondary close_model" data-dismiss="modal">{{trans('web.cancel')}}</button>
                      <button type="submit" id="store_user" class="btn btn-primary" >{{trans('web.confirming')}}</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
@endsection

@push('site_js')
    <script>

        $(document).on('submit','form#Form',function(e) {
            e.preventDefault();
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            // var url = $('#Form').attr('action');
            $.ajax({
                url: "{{route('check_phone')}}",
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('.loader-inner').show()
                },
                success: function (data) {
                    window.setTimeout(function() {
                        $('.loader-inner').hide()
                        if (data.type == 'error'){
                            $.each(data.message, function(key, value) {
                                toastr.options.timeOut = 10000;
                                toastr.error(data.message[key]);
                            });
                        }
                        if (data.type == 'success') {
                            $('#phone_').text(data.phone)
                            phoneSendAuth();
                            $('#exampleModal').modal('show');
                        }
                    }, 1500);
                },
                error: function (data) {
                    $('.loader-inner').hide()
                    if (data.status === 500) {
                        // $('#exampleModalCenter').modal("hide");
                        Swal.fire({
                            title: 'هناك خطأ',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        $('#exampleModal').modal('hide');
                    }
                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        });

        $(document).on('submit','form#confirm_form',function(e) {
            e.preventDefault();
            // alert(1)
            var myForm = $("#Form")[0]
            var formData = new FormData(myForm)
            var url = $('#Form').attr('action');

            var code = $("#verificationCode").val();
            coderesult.confirm(code).then(function (result) {
                var user=result.user;

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    beforeSend: function(){
                        $('.loader-inner').show()
                    },
                    success: function (data) {
                        window.setTimeout(function() {
                            $('.loader-inner').hide()
                            if (data.type == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'تم التسجيل بنجاح ...',
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                                setTimeout(function(){ window.location = data.url},2000);
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
                            $('#exampleModal').modal('hide');
                        }
                    },//end error method

                    cache: false,
                    contentType: false,
                    processData: false
                });

            }).catch(function (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'يوجد خطأ ...',
                    showConfirmButton: false,
                    timer: 2000,
                });
            });

        });

        $(document).on('click','.close_model',function(e){
            $('#exampleModal').modal('hide');
        });
    </script>


@endpush
