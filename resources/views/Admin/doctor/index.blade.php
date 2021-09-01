@extends('layouts.admin.app')
@section('page_name') قائمة الاطباء @endsection
@section('content')


    <!-----------------------------------Start Data Table ------------------------------------->
    <br>
    <br>
    <br>
    <div class="card mb-5 mb-xl-8 mt-10">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">جميع الاطباء</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{route('add_doctor')}}" class="btn btn-light-primary er fs-6 px-7 py-3 ml-2">
                    <span><i class="bi bi-plus"></i></span>
                    اضافة طبيب</a>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="kt_datatable_example_5" class="table align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                    <tr class="fw-bolder text-muted bg-light">
                        <th class="ps-4 min-w-10px rounded-start">الطبيب</th>
                        <th class="min-w-100px">التقييم</th>
                        <th class="min-w-100px">السعر</th>
{{--                        <th class="min-w-125px">السيرة الذاتية</th>--}}
                        <th class="min-w-125px">رقم الهاتف</th>
                        <th class="min-w-80px">مكالمة الفيديو</th>
                        <th class="min-w-80px">مكالمة الصوت</th>
                        <th class="min-w-100px rounded-end bg-light">العمليات</th>
                    </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                    @foreach($doctors as $doctor)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-100" onclick="window.open(this.src)" style='cursor: pointer' src={{asset($doctor->image)}}  alt="">
								</span>
                                    </div>
                                    <div class="d-flex justify-content-start text-left flex-column">
                                        <a href="" class="text-dark fw-bolder text-hover-primary mb-1 fs-5">
                                            {{$doctor->name_ar}}
                                            <img class="h-10" onclick="window.open(this.src)" style='cursor: pointer' width="25px" src={{asset($doctor->country->image)}}  alt="">
                                        </a>
                                        <span class="text-muted fw-bold text-muted d-block fs-6">{{$doctor->clinic->name_ar}}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?php
                                $count = 0;
                                $sum   = 0;
                                ?>
                            @foreach($rates->where('doctor_id',$doctor->id) as $rate)
                                <?php
                                        $count++;
                                        $sum = $rate->rate + $sum;
                                ?>
                                @endforeach
                                    @if($count == 0)
                                        <span class="fs-4">لا يوجد تقييم</span>
                                    @else
                                        @for($i = 1 ; $i <= number_format($sum / $count,0) ; $i++)
                                            <i class="bi bi-star-fill" style="color: #ffad0f" aria-hidden="true"></i>
                                        @endfor
                                        @for($i = 1 ; $i <= 5 - number_format($sum / $count,0) ; $i++)
                                            <i class="bi bi-star" style="color: #ffad0f" aria-hidden="true"></i>
                                        @endfor
                                        <p class="text-gray-700 fs-5 fw-bolder">من {{$count}} تقييمات</p>
                                    @endif
                            </td>
                            <td>
                                {{$doctor->price}}
                            </td>
                            <td>
                                {{$doctor->phone != null ? $doctor->phone : 'غير مسجل'}}
                            </td>
                            <td>
                                @if($doctor->video =='yes')
                                    <img src="{{get_file('uploads')}}/home/check_success.png" style="object-fit: cover ; width: 25px; height: 25px; "  alt="">
                                @else
                                    <img src="{{get_file('uploads')}}/home/check_failed.png" style="object-fit: cover ; width: 25px; height: 25px; "  alt="">
                                @endif
                            </td>
                            <td>
                                @if($doctor->audio =='yes')
                                    <img src="{{get_file('uploads')}}/home/check_success.png" style="object-fit: cover ; width: 25px; height: 25px; "  alt="">
                                @else
                                    <img src="{{get_file('uploads')}}/home/check_failed.png" style="object-fit: cover ; width: 25px; height: 25px; "  alt="">
                                @endif                            </td>
                            <td class="">
                                <div class="dropdown show">
                                    <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        تحكم
                                    </a>
                                    <div class="dropdown-menu" style="color: #575962" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item cursor-pointer" href="{{route('edit_doctor',$doctor->id)}}"><i class="fa fa-pen" style="color: #6d6dd5"></i>تعديل</a>
                                        <a class="dropdown-item cursor-pointer" data-id='{{$doctor->id}}' data-count='{{$doctor->cv->count()}}'
                                           data-name_ar = '{{$doctor->name_ar}}' data-name_en = '{{$doctor->name_en}}' data-email = '{{$doctor->email}}'
                                           data-category_ar = '{{$doctor->category_ar}}' data-category_en = '{{$doctor->category_en}}'
                                           data-phone = '{{$doctor->phone}}' data-min_age = '{{$doctor->min_age}}' data-max_age = '{{$doctor->max_age}}'
                                           data-image = '{{asset($doctor->image)}}' data-country = '{{asset($doctor->country->image)}}'
                                           data-clinic_name_ar = "{{$doctor->clinic->name_ar}}" data-clinic_name_en = "{{$doctor->clinic->name_en}}"
                                           data-bs-toggle='modal' data-bs-target="#doctor_details"
                                           @foreach($doctor->cv as $cv)
                                           data-cv_{{$loop->iteration}}="{{$cv->title_ar}} : {{$cv->text_ar}}"
                                           @endforeach><i class="fa fa-info" style="color: #5f5f5f"></i> تفاصيل</a>
                                        <a class="dropdown-item" href="{{route('showAvailable',$doctor->id)}}"><i class="fa fa-calendar-alt"  style="color: #51932b"></i>الايام المتاحة</a>
                                        <a class="dropdown-item" href="{{route('add_date',$doctor->id)}}"><i class="fa fa-plus"  style="color: #0c937f"></i>اضافة يوم</a>
                                        <a class="dropdown-item cursor-pointer" data-id="{{$doctor->id}}" data-name="{{$doctor->name_ar}}" data-bs-target="#delete_doctor" data-bs-toggle='modal'><i class="fa fa-trash"  style="color: #ce031b"></i> حذف</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
    <!-----------------------------------Start Data Table ------------------------------------->

    <!-------------------------Start DELETE modal ------------------------------------------------------------>
    <div class="modal fade" id="delete_doctor" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>حذف طبيب</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
																<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
																<rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
															</g>
														</svg>
					</span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-3 mx-xl-15 my-3">
                    <!--begin::Form-->
                    <form id="kt_modal_new_card_form" class="form" action="{{route('delete_doctor')}}" method="post">
                        {{csrf_field()}}

                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <h4 class="pb-3">هل انت متاكد من حذف هذا الطبيب</h4>
                            <!--end::Label-->
                            <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                            <input type="text" disabled class="form-control form-control-solid fs-2" placeholder="" name="name" id="name" value="">
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-white me-3" data-bs-dismiss="modal">الغاء</button>
                            <button type="submit" id="kt_modal_new_card_submit" class="btn btn-danger">
                                <span class="indicator-label">تأكيد</span>
                                <span class="indicator-progress">Please wait...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!-------------------------End DELETE modal -------------------------------------------------------------->

    <!-------------------------start DETAILS modal -------------------------------------------------------------->
    <div class="modal fade" id="doctor_details" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>بيانات الطبيب</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                            </g>
                        </svg>
					</span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-3 mx-xl-15 my-3">
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Card body-->
                            <div class="card-body pt-15">
                                <!--begin::Summary-->
                                <div class="d-flex flex-center flex-column mb-5">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-100px symbol-circle mb-7">
                                        <img src="" alt="image" id="image">
                                    </div>
                                    <!--end::Avatar-->
                                    <div class="row">
                                    <div class="col-10 fs-4 text-gray-800 pl-0 fw-bolder mb-1" id="name"></div>
                                    <div class="col-2"><img id="country" style="width: 30px;"></div>
                                    </div>
                                </div>
                                <!--start::Summary-->
                                    <div class="fw-bolder">
                                        <div class="">التخصص :
                                            <span class="text-gray-600" id="category"></span>
                                        </div>
                                    </div>
                                <div class="fw-bolder">
                                    <div class="mt-3">العيادة :
                                        <span class="text-gray-600" id="clinic"></span>
                                    </div>
                                </div>
                                <!--end::Summary-->
                                <!--begin::Details toggle-->
                                <div class="d-flex flex-stack fs-4 py-3 mt-1">
                                    <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">عرض المزيد
                                        <span class="ms-2 rotate-180">
														<!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
														<span class="svg-icon svg-icon-3">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<polygon points="0 0 24 0 24 24 0 24"></polygon>
																	<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
																</g>
															</svg>
														</span>
                                            <!--end::Svg Icon-->
													</span></div>
                                </div>
                                <!--end::Details toggle-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--begin::Details content-->
                                <div id="kt_customer_view_details" class="collapse show">
                                    <div class="py-2 fs-6">
                                        <!--begin::Badge-->
                                        <div>الاعمار الخاصة بالطبيب :
                                            <span class="badge badge-light-info d-inline" id="age"></span>
                                        </div>
                                        <!--begin::Badge-->
                                        <!--begin::Details item-->
                                        <div class="fw-bolder mt-5">الهاتف</div>
                                        <div class="text-gray-600" id="phone"></div>

                                        <div class="fw-bolder mt-5">البريد الالكتروني</div>
                                        <div class="text-gray-600" id="email"></div>

                                        <div class="fw-bolder mt-5">السيرة الذاتية</div>
                                        <div class="text-gray-600" id="cv"></div>

                                    </div>
                                </div>
                                <!--end::Details content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-primary me-3" data-bs-dismiss="modal">اغلاق</button>
                        </div>
                        <!--end::Actions-->

                    </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!-------------------------end DETAILS modal -------------------------------------------------------------->



@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>
<script>
    $(document).ready(function() {
        //Show data in the delete modal
        $('#delete_doctor').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        });


        //Show data in edit modal
        $('#doctor_details').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var name_ar = button.data('name_ar')
            var name_en = button.data('name_en')
            var min_age = button.data('min_age')
            var max_age = button.data('max_age')
            var phone = button.data('phone')
            var email = button.data('email')
            var count = button.data('count')
            $(this).find('.modal-body #cv').text('');
            var cv = [];
            for(var i = 1 ; i <= count ; i++) {
                 cv[i] = button.data('cv_'+i)
                $(this).find('.modal-body #cv').append(cv[i]+"<br>");
            }
            var category_ar = button.data('category_ar')
            var category_en = button.data('category_en')
            var clinic_name_ar = button.data('clinic_name_ar')
            var clinic_name_en = button.data('clinic_name_en')
            var country = button.data('country')
            var image = button.data('image')
            var modal = $(this)
            modal.find('.modal-body #name').text(name_ar+' | '+name_en);
            modal.find('.modal-body #phone').text(phone);
            modal.find('.modal-body #email').text(email);
            modal.find('.modal-body #category').text(category_ar+' | '+category_en);
            modal.find('.modal-body #clinic').text(clinic_name_ar+' | '+clinic_name_en);
            modal.find('.modal-body #age').text(min_age+' : '+max_age+' سنة');
            modal.find('.modal-body #country').attr('src', country);
            modal.find('.modal-body #image').attr('src', image);
        });
    });
</script>
