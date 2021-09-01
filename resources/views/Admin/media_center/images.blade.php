@extends('layouts.admin.app')
@section('page_name') المركز الاعلامي @endsection
@section('content')
    <br>
    <br>
    <br>
    <br>
    @if ($errors->any())
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}

                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'حدث خطا',
                        text: 'يرجي ادخال هذه الجقول',
                        footer: <ul>
                            @foreach($errors as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    })
                </script>
@endif

        <!---------------------------------- Start Page --------------------------------!-->
    <div class="card">
        <!--begin::Body-->
        <div class="card-body p-lg-17 mt-10 pt-0">
            <!--begin::Section-->
            <div class="mb-16">
                <!--begin::Top-->
                <a href="" class="btn btn-light-primary er fs-6 px-7 py-3 ml-2" data-bs-toggle="modal" data-bs-target="#create_new">
                    <span><i class="bi bi-plus-circle"></i></span>
                    اضافة جديد</a>
                <div class="text-center mb-12">
                    <!--begin::Text-->
                    <div class="fs-4 text-muted fw-bold">
                        صور المركز الاعلامي للمستشفي <i class="bi bi-info-circle"></i>
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Top-->
                <!--begin::Row-->
                <div class="row g-10">
                    <!--begin::Col-->
                    @foreach($show_images as $show_image)
                        <div class="col-md-4">
                            <!--begin::Publications post-->
                            <div class="card-xl-stretch ms-md-6">
                                <!--begin::Overlay-->
                                <a href="{{asset($show_image->image)}}" target="_blank" class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales" style='cursor: pointer'>
                                    <!--begin::Image-->
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url({{asset($show_image->image)}})"></div>
                                    <!--end::Image-->
                                    <!--begin::Action-->
                                    <div class="overlay-layer bg-dark card-rounded bg-opacity-25">
                                        <i class="bi bi-eye-fill fs-2x text-white"></i>
                                    </div>
                                    <!--end::Action-->
                                </a>
                                <!--end::Overlay-->
                                <!--begin::Body-->
                                <div class="m-0  text-center">
                                    <div class="mt-2 row">
                                         <button class="btn btn-light-danger col-12" data-bs-toggle="modal" data-bs-target="#delete_slider" data-id="{{$show_image->id}}">حذف</button>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Publications post-->
                        </div>
                @endforeach
                <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Section-->
        </div>
        <!--end::Body-->
    </div>
    <!---------------------------------- End Page --------------------------------!-->


    <!-------------------------start ADD Form -------------------------------------------------------------->
    <div class="modal fade show" id="create_new" tabindex="-1" aria-modal="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>اضافة بيانات جديدة</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1"></rect>
                            </g>
                        </svg>
                    </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-1">
                    <!--begin::Form-->
                    <form method="post" id="kt_modal_new_card_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('admin/Media_Center/Add_Image')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="fv-row mb-3" style="text-align: center">
                            <!--begin::Label-->
                            <label class="d-block fw-bold fs-12 mb-1 required">رفع صورة</label>
                            <!--end::Label-->
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true" style="background-image: url(assets/media/avatars/upload.png)">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-250px h-250px" style="background-image: none; border-radius: 50%"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="اضافة صورة">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg">
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="الغاء الصورة">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                                <!--end::Cancel-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <div class="form-text">مسموح بالصيغ الاتية : png, jpg, jpeg.</div>
                            <!--end::Hint-->
                        </div>



                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">

                            <!--begin::Actions-->
                            <div class="text-center">
                                <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-white me-3" data-bs-dismiss="modal">الغاء</button>
                                <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                                    <span class="indicator-label">اضافة</span>
                                    <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                            <div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!-------------------------end ADD Form -------------------------------------------------------------->



    <!-------------------------Start DELETE modal ------------------------------------------------------------>
    <div class="modal fade" id="delete_slider" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>حذف بيانات</h2>
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
                    <form id="kt_modal_new_card_form" class="form" action="{{route('admin/Media_Center/delete_image')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <h4 class="pb-3">هل انت متاكد من حذف هذه الصوره نهائيا !!</h4>
                            <!--end::Label-->
                            <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">

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

@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>
<script src="{{url('/')}}/admin/assets/js/sweet.js"></script>
<script>
    $(document).ready(function(){
        //Show data in the delete form
        $('#delete_slider').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        });

    });
</script>
