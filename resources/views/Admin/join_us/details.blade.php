@extends('layouts.admin.app')
@section('page_name') اعلانات الوظائف @endsection
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
                <span class="card-label fw-bolder fs-3 mb-1">تفاصيل الوظائف المعلنة</span>
            </h3>
            <div class="card-toolbar">
                <a href="" class="btn btn-light-primary er fs-6 px-7 py-3 ml-2" data-bs-toggle="modal" data-bs-target="#create_join">
                    <span><i class="bi bi-plus-circle"></i></span>
                    اضافة جديد</a>
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
                        <th class="min-w-80px">الوظيفة بالعربي</th>
                        <th class="min-w-80px">الوظيفة بالانجليزي</th>
                        <th class="min-w-125px">التخصص بالعربي</th>
                        <th class="min-w-125px">التخصص بالانجليزي</th>
                        <th class="min-w-125px">الوصف بالعربي</th>
                        <th class="min-w-125px">الوصف بالانجليزي</th>
                        <th class="min-w-80px">مكان العمل بالعربي</th>
                        <th class="min-w-80px">مكان العمل بالانجليزي</th>
                        <th class="min-w-200px rounded-end">العمليات</th>
                    </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                    @foreach($joins as $join)
                        <tr>
                            <td>{{$join->title_ar}}</td>
                            <td>{{$join->title_en}}</td>
                            <td>{{$join->category_ar}}</td>
                            <td>{{$join->category_en}}</td>
                            <td>{{Str::limit($join->content_ar,50)}}</td>
                            <td>{{Str::limit($join->content_en,50)}}</td>
                            <td>{{$join->address_ar}}</td>
                            <td>{{$join->address_en}}</td>
                            <td class="">
                                <button data-bs-toggle='modal' data-bs-target="#edit_details" class="btn btn-icon btn-bg-light btn-primary btn-sm me-1" data-toggle="modal" style="border-radius: 50% !important"
                                        data-id="{{$join->id}}" data-title_ar="{{$join->title_ar}}" data-title_en="{{$join->title_en}}"
                                        data-content_ar="{{$join->content_ar}}" data-content_en="{{$join->content_en}}"
                                        data-address_ar="{{$join->address_ar}}" data-address_en="{{$join->address_en}}"
                                        data-category_ar="{{$join->category_ar}}" data-category_en="{{$join->category_en}}"
                                >
                            <span class="svg-icon svg-icon-3">
                                    <i class="bi bi-pencil"></i>
                            </span>
                                    <!--end::Svg Icon-->
                                </button>

                                <button data-bs-toggle='modal' data-bs-target="#delete_join" class="btn btn-icon btn-bg-light btn-danger btn-sm me-1" data-toggle="modal" style="border-radius: 50% !important"
                                        data-id="{{$join->id}}" data-join_title_ar="{{$join->title_ar}}"
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

    <!-------------------------Start DELETE ALL modal ------------------------------------------------------------>
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
                    <form id="kt_modal_new_card_form" class="form" action="{{route('delete_all_details')}}" method="post">
                        <!--begin::Input group-->
                        {{csrf_field()}}
                        <div class="d-flex flex-column mb-3 fv-row">
                            <!--begin::Label-->
                            <h4>سيتم حذف جميع اعلانات الوظائف ! هل تريد المتابعة</h4>
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
    <!-------------------------end DELETE ALL modal ------------------------------------------------------------>

    <!-------------------------Start DELETE modal ------------------------------------------------------------>
    <div class="modal fade" id="delete_join" tabindex="-1" aria-hidden="true">
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
                    <form id="kt_modal_new_card_form" class="form" action="{{route('Delete_ِDetails')}}" method="post">
                        {{csrf_field()}}

                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <h4 class="pb-3">هل انت متاكد من حذف اعلان هذه الوظيفة</h4>
                            <!--end::Label-->
                            <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                            <input type="text" disabled class="form-control form-control-solid fs-2" placeholder="" name="join_title" id="join_title" value="">
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
    <div class="modal fade show" id="create_join" tabindex="-1" aria-modal="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>اضافة وظيفة جديدة</h2>
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
                    <form method="post" id="kt_modal_new_card_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('Add_Join_ِDetails')}}">
                        {{csrf_field()}}
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <div class="row">
                                <div class="col-6">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">الوظيفة بالعربي</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب اسم الوظيفة بالعربي" name="title_ar" value="" autocomplete="off">
                            <!--end::Input group-->
                                </div>
                                <div class="col-6">
                                <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">الوظيفة بالانجليزي</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب اسم الوظيفة بالانجليزي" name="title_en" value="" autocomplete="off">
                            <!--end::Input group-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">التخصص بالعربي</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب اسم التخصص بالعربي" name="category_ar" value="" autocomplete="off">
                                    <!--end::Input group-->
                                </div>
                                <div class="col-6">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">التخصص بالانجليزي</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب اسم التخصص بالانجليزي" name="category_en" value="" autocomplete="off">
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">مكان العمل بالعربي</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب مكان العمل بالعربي" name="address_ar" value="" autocomplete="off">
                                    <!--end::Input group-->
                                </div>
                                <div class="col-6">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">مكان العمل بالانجليزي</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب مكان العمل بالانجليزي" name="address_en" value="" autocomplete="off">
                                    <!--end::Input group-->
                                </div>
                            </div>


                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="required fs-4 fw-bold form-label mb-2">وصف الوظيفة بالعربي</label>
                                <!--end::Label-->
                                <!--begin::Input wrapper-->
                                <div class="position-relative">
                                    <!--begin::Input-->
                                    <textarea type="text" class="form-control form-control-solid" placeholder="اضف شرح الوظيفة باللغة العربية" name="content_ar" autocomplete="off"></textarea>
                                    <!--end::Input-->
                                </div>
                                <label class="required fs-4 fw-bold form-label mb-2 mt-3">وصف الوظيفة بالانجليزي</label>
                                <!--end::Label-->
                                <!--begin::Input wrapper-->
                                <div class="position-relative">
                                    <!--begin::Input-->
                                    <textarea type="text" class="form-control form-control-solid" placeholder="اضف شرح الوظيفة باللغة الانجليزية" name="content_en" autocomplete="off"></textarea>
                                    <!--end::Input-->
                                </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->


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
    <div class="modal fade show" id="edit_details" tabindex="-1" aria-modal="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>تعديل تفاصيل وظيفة</h2>
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
                    <form method="post" id="kt_modal_new_card_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('edit_join_ِdetails')}}">
                        {{csrf_field()}}
                        <input type="hidden" id="id" name="id">
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Input group-->
                            <div class="row">
                                <div class="col-6">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">الوظيفة بالعربي</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب اسم الوظيفة بالعربي" name="title_ar" id='title_ar' autocomplete="off">
                                    <!--end::Input group-->
                                </div>
                                <div class="col-6">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">الوظيفة بالانجليزي</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب اسم الوظيفة بالانجليزي" name="title_en" id='title_en' autocomplete="off">
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">التخصص بالعربي</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب اسم التخصص بالعربي" name="category_ar" id='category_ar' autocomplete="off">
                                    <!--end::Input group-->
                                </div>
                                <div class="col-6">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">التخصص بالانجليزي</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب اسم التخصص بالانجليزي" name="category_en" id='category_en' autocomplete="off">
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">مكان العمل بالعربي</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب مكان العمل بالعربي" name="address_ar" id='address_ar'>
                                    <!--end::Input group-->
                                </div>
                                <div class="col-6">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">مكان العمل بالانجليزي</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب مكان العمل بالانجليزي" name="address_en" id='address_en'>
                                    <!--end::Input group-->
                                </div>
                            </div>


                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="required fs-4  fw-bold form-label mb-2">وصف الوظيفة بالعربي</label>
                                <!--end::Label-->
                                <!--begin::Input wrapper-->
                                <div class="position-relative">
                                    <!--begin::Input-->
                                    <textarea type="text" class="form-control form-control-solid" placeholder="اضف شرح الوظيفة باللغة العربية" name="content_ar" id='content_ar' autocomplete="off"></textarea>
                                    <!--end::Input-->
                                </div>
                                <label class="required fs-4 fw-bold form-label mb-2 mt-3">وصف الوظيفة بالانجليزي</label>
                                <!--end::Label-->
                                <!--begin::Input wrapper-->
                                <div class="position-relative">
                                    <!--begin::Input-->
                                    <textarea type="text" class="form-control form-control-solid" placeholder="اضف شرح الوظيفة باللغة الانجليزية" name="content_en"  id='content_en' autocomplete="off"></textarea>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->


                                <!--begin::Actions-->
                                <div class="text-center pt-5">
                                    <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-white me-3" data-bs-dismiss="modal">الغاء</button>
                                    <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                                        <span class="indicator-label">تحديث</span>
                                        <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
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
    <!-------------------------end EDIT modal -------------------------------------------------------------->

@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>
<script src="{{url('/')}}/admin/assets/js/sweet.js"></script>

<script>
    $(document).ready(function(){
        //Show data in the delete form
        $('#delete_join').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var title_ar = button.data('join_title_ar')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #join_title').val(title_ar);
        });

        //Show data in the edit form
        $('#edit_details').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var title_ar = button.data('title_ar')
            var title_en = button.data('title_en')
            var category_ar = button.data('category_ar')
            var category_en = button.data('category_en')
            var address_ar = button.data('address_ar')
            var address_en = button.data('address_en')
            var content_ar = button.data('content_ar')
            var content_en = button.data('content_en')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #title_ar').val(title_ar);
            modal.find('.modal-body #title_en').val(title_en);
            modal.find('.modal-body #category_ar').val(category_ar);
            modal.find('.modal-body #category_en').val(category_en);
            modal.find('.modal-body #address_ar').val(address_ar);
            modal.find('.modal-body #address_en').val(address_en);
            modal.find('.modal-body #content_ar').val(content_ar);
            modal.find('.modal-body #content_en').val(content_en);
        });



    });
</script>

