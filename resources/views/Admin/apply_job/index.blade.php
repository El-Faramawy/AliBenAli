@extends('layouts.admin.app')
@section('page_name') قائمة الوظائف @endsection
@section('content')


    <!-----------------------------------Start Data Table ------------------------------------->
    <br>
    <br>
    <br>
    <div class="card mb-5 mb-xl-8 mt-10">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">جميع المتقدمين للوظائف</span>
            </h3>
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
                        <th class="ps-4 min-w-150px rounded-start">المتقدم للوظيفة</th>
                        <th class="min-w-80px">  الوظيفة المتقدم لها</th>
                        <th class="min-w-125px">رقم الجوال</th>
                        <th class="min-w-200px rounded-end">العمليات</th>
                    </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                    @foreach($show_Apply_jobs as $show_Apply_job)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-75" onclick="window.open(this.src)" style='cursor: pointer' src={{asset($show_Apply_job->image)}}  alt="">
								</span>
                                    </div>
                                    <div class="d-flex justify-content-start text-left flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-5">{{$show_Apply_job->name}}</a>
                                        <span class="text-muted fw-bold text-muted d-block fs-6"></span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{$show_Apply_job->apply_order->title_ar}}
                            </td>
                            <td>
                                {{$show_Apply_job->phone}}
                            </td>

                            <td class="">
                                <button class="btn btn-icon btn-success btn-sm me-1" data-bs-toggle='modal' title="تفاصيل" data-bs-target="#doctor_details" style="border-radius: 50% !important"
                                        data-id='{{$show_Apply_job->id}}'
                                        data-name = '{{$show_Apply_job->name}}'
                                        data-job_name = '{{$show_Apply_job->job_name}}'
                                        data-message= '{{$show_Apply_job->message}}'
                                        data-phone = '{{$show_Apply_job->phone}}'
                                        data-email = '{{$show_Apply_job->email}}'
                                        data-experience = '{{$show_Apply_job->experience}}'
                                        data-work_address = '{{$show_Apply_job->work_address}}'
                                        data-image = '{{asset($show_Apply_job->image)}}'
                                        data-Apply_job_name = "{{$show_Apply_job->apply_order->title_ar}}"
                                >
                            <span class="svg-icon svg-icon-3">
                                <i class="bi bi-info" style="font-size: 20px !important;"></i>
                            </span>
                                </button>
                                <button data-id="{{$show_Apply_job->id}}" data-name="{{$show_Apply_job->name}}" data-bs-target="#delete_doctor" title="حذف" class="btn btn-icon btn-danger btn-sm me-1" data-bs-toggle="modal" style="border-radius: 50% !important">
                            <span class="svg-icon svg-icon-3">
                                <i class="fa fa-trash"></i>
                            </span>
                                </button>
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
                    <form id="kt_modal_new_card_form" class="form" action="{{route('admin/delete_jobs')}}" method="post">
                        {{csrf_field()}}

                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <h4 class="pb-3">هل انت متاكد من حذف هذا المتقدم</h4>
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

    <!-------------------------start EDIT modal -------------------------------------------------------------->
    <div class="modal fade" id="doctor_details" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>بيانات المتقدم للوظيفة</h2>
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
                                </div>
                                <!--start::Summary-->
                                    <div class="fw-bolder">
                                        <div class="">الاسم بالكامل :
                                            <span class="text-gray-600" id="name"></span>
                                        </div>
                                    </div>
                                <div class="fw-bolder">
                                    <div class="mt-3">المسمي الوظيفي :
                                        <span class="text-gray-600" id="job_name"></span>
                                    </div>
                                </div>
                                <div class="fw-bolder">
                                    <div class="mt-3">الوظيفة المتقدم لها :
                                        <span class="text-gray-600" id="Apply_job_name"></span>
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
                                        <div>الهاتف الخاصة بالمتقدم :
                                            <span class="badge badge-light-info d-inline" id="phone"></span>
                                        </div>
                                        <!--begin::Badge-->
                                        <!--begin::Details item-->
                                        <div class="fw-bolder mt-5">الخبرات السابقة للمتقدم</div>
                                        <div class="text-gray-600" id="experience"></div>

                                        <div class="fw-bolder mt-5"> محل الاقامة الحالي للمتقدم</div>
                                        <div class="text-gray-600" id="work_address"></div>

                                        <div class="fw-bolder mt-5">الايميل الخاصة بالمتقدم :</div>
                                        <div class="text-gray-600" id="email"></div>

                                        <div class="fw-bolder mt-5">رساله المتقدم :</div>
                                        <div class="text-black-600 badge-gray border-padding p-4" style="border:1px dotted grey; border-radius:15px ;  " id="message"></div>

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
    <!-------------------------end EDIT modal -------------------------------------------------------------->



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
            var name = button.data('name')
            var job_name = button.data('job_name')
            var phone = button.data('phone')
            var email = button.data('email')
            var experience = button.data('experience')
            var work_address = button.data('work_address')
            var message = button.data('message')
            var Apply_job_name = button.data('apply_job_name')
            var image = button.data('image')
            var modal = $(this)
            modal.find('.modal-body #name').text(name);
            modal.find('.modal-body #job_name').text(job_name);
            modal.find('.modal-body #phone').text(phone);
            modal.find('.modal-body #email').text(email);
            modal.find('.modal-body #experience').text(experience);
            modal.find('.modal-body #work_address').text(work_address);
            modal.find('.modal-body #message').text(message);
            modal.find('.modal-body #Apply_job_name').text(Apply_job_name);
            modal.find('.modal-body #image').attr('src', image);
        });
    });
</script>
