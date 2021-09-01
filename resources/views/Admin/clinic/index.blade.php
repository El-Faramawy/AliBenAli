@extends('layouts.admin.app')
@section('page_name') قائمة الاقسام @endsection
@section('content')


    <!-----------------------------------Start Data Table ------------------------------------->
    <br>
    <br>
    <br>
{{--    @if(Session::has('message'))--}}
{{--        <script>--}}
{{--            Swal.fire({--}}
{{--                icon: 'success',--}}
{{--                title: '{{ Session::get('message') }}',--}}
{{--                text: 'حاول مرة اخري!',--}}
{{--                confirmButtonText: 'حسنا',--}}
{{--            })--}}
{{--        </script>--}}
{{--    @endif--}}
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: '@foreach ($errors->all() as $error){{ $error }}<br>@endforeach',
                text: 'حاول مرة اخري!',
                confirmButtonText: 'حسنا',

// footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    <div class="card mb-5 mb-xl-8 mt-10">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">كل الاقسام</span>
            </h3>
            <div class="card-toolbar">
                <a href="" class="btn btn-light-primary er fs-6 px-7 py-3 ml-2" data-bs-toggle="modal" data-bs-target="#create_clinic">
                    <span><i class="bi bi-plus-circle"></i></span>
                    اضافة جديد</a>
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
                        <th class="min-w-70px">#</th>
                        <th class="min-w-125px">الصورة</th>
                        <th class="min-w-125px">الاسم بالعربي</th>
                        <th class="min-w-125px">الاسم بالانجليزي</th>
                        <th class="min-w-200px rounded-end">العمليات</th>
                    </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                    @foreach($clinics as $clinic)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-75" onclick="window.open(this.src)" style='cursor: pointer' src={{asset($clinic->image)}}  alt="">
								</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{$clinic->name_ar}}</td>
                            <td>{{$clinic->name_en}}</td>
                            <td class="">
                                <button data-bs-toggle='modal' data-bs-target="#edit_clinic" class="btn btn-icon btn-bg-light btn-primary btn-sm me-1" data-toggle="modal" style="border-radius: 50% !important"
                                        data-id="{{$clinic->id}}" data-name_ar="{{$clinic->name_ar}}" data-name_en="{{$clinic->name_en}}" data-about_image="{{asset($clinic->image)}}"
                                >
                            <span class="svg-icon svg-icon-3">
                                    <i class="bi bi-pencil"></i>
                            </span>
                                    <!--end::Svg Icon-->
                                </button>

                                <button data-bs-toggle='modal' data-bs-target="#delete_clinic" class="btn btn-icon btn-bg-light btn-danger btn-sm me-1" data-toggle="modal" style="border-radius: 50% !important"
                                        data-id="{{$clinic->id}}" data-clinic_name_ar="{{$clinic->name_ar}}"
                                >
                            <span class="svg-icon svg-icon-3">
                                <span class="svg-icon svg-icon-3">
                                    <i class="fa fa-trash"></i>
                                </span>
                            </span>
                                    <!--end::Svg Icon-->
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
    </div>
    <!-----------------------------------end Data Table ------------------------------------->

    <!-------------------------Start DELETE modal ------------------------------------------------------------>
    <div class="modal fade" id="delete_clinic" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>حذف قسم</h2>
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
                    <form id="kt_modal_new_card_form" class="form" action="{{route('delete_clinic')}}" method="post">
                        {{csrf_field()}}

                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <h4 class="pb-3">هل انت متاكد من حذف هذا القسم</h4>
                            <!--end::Label-->
                            <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                            <input type="text" disabled class="form-control form-control-solid fs-2" placeholder="" name="clinic_name_ar" id="clinic_name_ar" value="">
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


    <!-------------------------start ADD modal -------------------------------------------------------------->
    <div class="modal fade show" id="create_clinic" tabindex="-1" aria-modal="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>اضافة قسم جديد</h2>
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
                    <form method="post" id="kt_modal_new_card_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('add_clinic')}}" enctype="multipart/form-data">
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
                                    <i class="fa fa-pen fs-7"></i>
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

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">العنوان بالعربي</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid mb-4 fs-5" placeholder="اكتب اسم القسم باللغة العربية" name="name_ar" value="" autocomplete="off">

                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">العنوان بالانجليزي</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid mb-4 fs-5" placeholder="اكتب اسم القسم باللغة الانجليزية" name="name_en" value="" autocomplete="off">
                            <!--end::Input group-->

                            <!--begin::Actions-->
                            <div class="text-center pt-5">
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
    <!-------------------------end ADD modal -------------------------------------------------------------->


    <!-------------------------start EDIT modal -------------------------------------------------------------->
    <div class="modal fade show" id="edit_clinic" tabindex="-1" aria-modal="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>تعديل بيانات قسم</h2>
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
                    <form method="post" id="kt_modal_new_card_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('edit_clinic')}}" enctype="multipart/form-data">
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
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">العنوان بالعربي</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid mb-4 fs-5" placeholder="اكتب اسم القسم باللغة العربية" name="name_ar" id="name_ar" autocomplete="off">

                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">العنوان بالانجليزي</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid mb-4 fs-5" placeholder="اكتب اسم القسم باللغة الانجليزية" name="name_en" id="name_en" autocomplete="off">
                            <!--end::Input group-->


                            <!--begin::Actions-->
                            <div class="text-center pt-5">
                                <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-white me-3" data-bs-dismiss="modal">الغاء</button>
                                <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                                    <span class="indicator-label">تحديث</span>
                                    <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                            <div>
                            </div>
                        </div>
                        <input type="hidden" id="id">
                    </form>
                    <!--end::Form-->
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
<script src="{{url('/')}}/admin/assets/js/sweet.js"></script>
<script>
    $(document).ready(function(){
        //Show data in the delete form
        $('#delete_clinic').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var clinic_name_ar = button.data('clinic_name_ar')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #clinic_name_ar').val(clinic_name_ar);
        });

        //Show data in the edit form
        $('#edit_clinic').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var img_show = button.data('about_image')
            var name_ar = button.data('name_ar')
            var name_en = button.data('name_en')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #img_show').attr('src',img_show);
            modal.find('.modal-body #name_ar').val(name_ar);
            modal.find('.modal-body #name_en').val(name_en);
        });



    });
</script>

