@extends('layouts.admin.app')
@section('page_name') المركز الاعلامي @endsection
@section('content')
    <br>
    <br>
    <br>
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        {{--        <script>--}}
        {{--            Swal.fire({--}}
        {{--                icon: 'error',--}}
        {{--                title: 'حدث خطا',--}}
        {{--                text: 'يرجي ادخال هذه الجقول',--}}
        {{--                footer: <ul>--}}
        {{--                    @foreach($errors as $error)--}}
        {{--                    <li>{{$error}}</li>--}}
        {{--                    @endforeach--}}
        {{--                </ul>--}}
        {{--            })--}}
        {{--        </script>--}}
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
                        فديوهات تظهر في الصفحة الرئيسية
                        <i class="bi bi-info-circle"></i>
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Top-->
                <!--begin::Row-->
                <div class="row g-10">
                    <!--begin::Col-->
                    @foreach($show_videos as $show_videos)
                        <div class="col-md-4">
                            <!--begin::Publications post-->
                            <div class="card-xl-stretch ms-md-6">
                                <!--begin::Overlay-->
                                <a href="{{asset($show_videos->image)}}" target="_blank" class="d-block overlay mb-4" data-fslightbox="lightbox-hot-sales" style='cursor: pointer'>
                                    <!--begin::Image-->
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url({{asset($show_videos->image)}})"></div>
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
                                    <!--begin::Title-->
                                    <a class="fs-5 text-dark fw-bolder text-hover-primary text-dark lh-base" href="{{url($show_videos->link)}}" style="cursor: pointer"> {{$show_videos->link}}</a>
                                    <!--end::Title-->
                                    <!--begin::Content-->
                                    <div class="mt-2 row">
                                        <button class="btn btn-light-success col-6" data-bs-toggle="modal" data-bs-target="#edit_about"
                                                data-id="{{$show_videos->id}}" data-title_ar="{{$show_videos->title_ar}}" data-title_en="{{$show_videos->title_en}}"
                                                data-about_image="{{asset($show_videos->image)}}" data-text_ar="{{$show_videos->text_ar}}" data-text_en="{{$show_videos->text_en}}"
                                                data-job_ar="{{$show_videos->job_ar}}" data-job_en="{{$show_videos->job_en}}">تعديل</button>
                                        <button class="btn btn-light-danger col-6" data-bs-toggle="modal" data-bs-target="#delete_about" data-id="{{$show_videos->id}}" data-title_ar="{{$show_videos->title_ar}}">حذف</button>
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
                    <form method="post" id="kt_modal_new_card_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('admin/Media_Center/Add_Videos')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="fv-row mb-3">
                            <!--begin::Label-->
                            <label class="d-block fw-bold fs-6 mb-1 required">رفع صورة</label>
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
                                    <input type="hidden" name="avatar_remove" value="1">
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

                            <div class="row-12">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">اضافه لينك</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب اللينك" name="link" value="" autocomplete="off">
                            </div>

                            <!--end::Input group-->

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

    <!-------------------------start EDIT Form -------------------------------------------------------------->
    <div class="modal fade show" id="edit_about" tabindex="-1" aria-modal="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>تعديل بيانات</h2>
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
                    <form method="post" id="kt_modal_new_card_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('admin/Media_Center/Edit_Videos')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id">
                        <div class="fv-row mb-5">
                            <!--begin::Label-->
                            <label class="d-block fw-bold fs-6 mb-1 required">رفع صورة</label>
                            <!--end::Label-->
                            <!--begin::Image input-->
                            <div class="row">
                                <div class="col-6 image-input image-input-outline image-input-empty" data-kt-image-input="true" style="background-image: url(assets/media/avatars/upload.png)">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-250px h-250px" style="background-image: none; border-radius: 50%"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="اضافة صورة">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg">
                                        <input type="hidden" name="avatar_remove" value="1">
                                        <input type="hidden" name="num" value="1">
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="الغاء الصورة">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                                    <!--end::Cancel-->
                                </div>
                                <div class="col-6 text-center">
                                    <label class="d-block fw-bold fs-6 mb-1">الصورة الحالية</label>
                                    <img height="200px" width="100%" id="img_show" onclick="window.open(this.src)" style="cursor: pointer;border-radius: 50%">
                                </div>
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <div class="form-text">مسموح بالصيغ الاتية : png, jpg, jpeg.</div>
                            <!--end::Hint-->
                        </div>

                            <div class="row-6">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required"> لينك الفيديو</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب  لينك الفيديو" name="link" id="link" value="{{$show_videos->link}}" autocomplete="off">
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
    <!-------------------------end EDIT Form -------------------------------------------------------------->


    <!-------------------------Start DELETE modal ------------------------------------------------------------>
    <div class="modal fade" id="delete_about" tabindex="-1" aria-hidden="true">
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
                    <form id="kt_modal_new_card_form" class="form" action="{{route('admin/Media_Center/Delete_Videos')}}" method="post">
                        {{csrf_field()}}

                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <h4 class="pb-3">هل انت متاكد من حذف الفيديو</h4>
                            <!--end::Label-->
                            <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                            <input type="text" disabled class="form-control form-control-solid fs-2" placeholder="" name="title_ar" id="title_ar" value="{{$show_videos->link}}">
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
    $(document).ready(function() {
        //Show data in the delete form
        $('#delete_about').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var title_ar = button.data('title_ar')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #title_ar').val(title_ar);
        });

        //Show data in the edit form
        $('#edit_about').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var title_ar = button.data('title_ar')
            var title_en = button.data('title_en')
            var text_ar = button.data('text_ar')
            var text_en = button.data('text_en')
            var job_ar = button.data('job_ar')
            var job_en = button.data('job_en')
            var img_show = button.data('about_image')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #img_show').attr('src',img_show);
            modal.find('.modal-body #title_ar').val(title_ar);
            modal.find('.modal-body #title_en').val(title_en);
            modal.find('.modal-body #text_ar').val(text_ar);
            modal.find('.modal-body #text_en').val(text_en);
            modal.find('.modal-body #job_ar').val(job_ar);
            modal.find('.modal-body #job_en').val(job_en);
        });
    });
</script>
