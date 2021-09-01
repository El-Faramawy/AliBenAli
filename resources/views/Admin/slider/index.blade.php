@extends('layouts.admin.app')
@section('page_name') معرض الصور @endsection
@section('content')


<!-----------------------------------Start Data Table ------------------------------------->
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
<div class="card mb-5 mb-xl-8 mt-10">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">معرض الصور</span>
        </h3>
        <div class="card-toolbar">
            <a href="" class="btn btn-light-primary er fs-6 px-7 py-3 ml-2" data-bs-toggle="modal" data-bs-target="#create_slider">
                <span><i class="bi bi-plus-circle"></i></span>
                اضافة معرض</a>
            <a href="" class="btn btn-light-danger er fs-6 px-7 py-3" data-bs-toggle="modal" data-bs-target="#delete_all">
                <span><i class="bi bi-dash-circle"></i></span>
                حذف الكل</a>
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
                    <th>#</th>
                    <th class="ps-4 min-w-100px rounded-start">الصورة</th>
                    <th class="min-w-200px rounded-end">العمليات</th>
                </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                @foreach($sliders as $slider)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                        <div class="align-items-center">
                            <div class="symbol symbol-50px me-5">
								<span class="symbol-label bg-light">
									<img class="h-75" onclick="window.open(this.src)" style='cursor: pointer' src={{asset($slider->image)}}  alt="">
								</span>
                            </div>
                        </div>
                    </td>
                    <td class="">
                        <button data-bs-toggle='modal' data-bs-target="#delete_slider" class="btn btn-icon btn-bg-light btn-danger btn-sm me-1" data-toggle="modal" style="border-radius: 50% !important"
                                data-id="{{$slider->id}}"
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

<!-------------------------Start DELETE ALL Form ------------------------------------------------------------>
<div class="modal fade" id="delete_all" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>حذف الكل</h2>
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
                <form id="kt_modal_new_card_form" class="form" action="{{route('delete_all_sliders')}}" method="post">
                    <!--begin::Input group-->
                    {{csrf_field()}}
                    <div class="d-flex flex-column mb-3 fv-row">
                        <!--begin::Label-->
                            <h4>سيتم حذف جميع المعارض ! هل تريد المتابعة</h4>
                        <!--end::Label-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center pt-3">
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
<!-------------------------end DELETE ALL Form ------------------------------------------------------------>

<!-------------------------Start DELETE Form ------------------------------------------------------------>
<div class="modal fade" id="delete_slider" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>حذف معرض</h2>
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
                <form id="kt_modal_new_card_form" class="form" action="{{route('delete_slider')}}" method="post">
                    {{csrf_field()}}

                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                            <h4 class="pb-3">هل انت متاكد من حذف هذا المعرض</h4>
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
<!-------------------------End DELETE Form -------------------------------------------------------------->


<!-------------------------start ADD Form -------------------------------------------------------------->
<div class="modal fade show" id="create_slider" tabindex="-1" aria-modal="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>اضافة بيانات للمعرض</h2>
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
                <form method="post" id="kt_modal_new_card_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('create_slider')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="fv-row mb-5">
                        <!--begin::Label-->
                        <label class="d-block fw-bold fs-6 mb-1 required">رفع صورة معرض</label>
                        <!--end::Label-->
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true" style="background-image: url(assets/media/avatars/upload.png)">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-250px h-125px" style="background-image: none;"></div>
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

