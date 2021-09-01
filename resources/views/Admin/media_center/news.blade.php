@extends('layouts.admin.app')
@section('page_name') المركز الاعلامي @endsection
@section('content')


    <!-----------------------------------Start Data Table ------------------------------------->
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

    <div class="card mb-5 mb-xl-8 mt-10">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">اخبارنا</span>
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
                        <th class="min-w-80px">#</th>
                        <th class="min-w-80px">الصوره</th>
                        <th class="min-w-80px">الاسم بالعربي</th>
                        <th class="min-w-80px">الاسم بالانجليزي</th>
                        <th class="min-w-125px">المحتوي بالعربي</th>
                        <th class="min-w-125px">المحتوي بالانجليزي</th>
                        <th class="min-w-200px rounded-end">العمليات</th>
                    </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                    @foreach($show_news as $show_new)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img onclick="window.open(this.src)" style="border-radius:15px;height: 50px;width: 70px ;cursor: pointer" src="{{asset($show_new->image )}}"/></td>
                            <td>{{$show_new->title_ar}}</td>
                            <td>{{$show_new->title_en}}</td>
                            <td>{{Str::limit($show_new->content_ar,100)}}</td>
                            <td>{{Str::limit($show_new->content_en,100)}}</td>
                            <td class="">
                                <button data-bs-toggle='modal' data-bs-target="#edit_details" class="btn btn-icon btn-bg-light btn-primary btn-sm me-1" data-toggle="modal" style="border-radius: 50% !important"
                                        data-id="{{$show_new->id}}" data-title_ar="{{$show_new->title_ar}}" data-title_en="{{$show_new->title_en}}"
                                        data-content_ar="{{$show_new->content_ar}}" data-content_en="{{$show_new->content_en}}"
                                        data-address_ar="{{$show_new->address_ar}}" data-address_en="{{$show_new->address_en}}"
                                        data-category_ar="{{$show_new->category_ar}}" data-category_en="{{$show_new->category_en}}"
                                        data-category-image="{{asset($show_new->image)}}"
                                >
                            <span class="svg-icon svg-icon-3">
                                    <i class="bi bi-pencil"></i>
                            </span>
                                    <!--end::Svg Icon-->
                                </button>

                                <button data-bs-toggle='modal' data-bs-target="#delete_slider" class="btn btn-icon btn-bg-light btn-danger btn-sm me-1" data-toggle="modal" style="border-radius: 50% !important"
                                        data-id="{{$show_new->id}}" data-join_title_ar="{{$show_new->title_ar}}"
                                >
                            <span class="svg-icon svg-icon-3">
                                <span class="svg-icon svg-icon-3">
                                    <i class="bi bi-trash"></i>
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
                    <form id="kt_modal_new_card_form" class="form" action="{{route('admin/Media_Center/Delete_AllNews')}}" method="post">
                        <!--begin::Input group-->
                        {{csrf_field()}}
                        <div class="d-flex flex-column mb-3 fv-row">
                            <!--begin::Label-->
                            <h4>سيتم حذف جميع الاخبار  ! هل تريد المتابعة</h4>
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
    <div class="modal fade" id="delete_slider" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>حذف الاخبار</h2>
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
                    <form id="kt_modal_new_card_form" class="form" action="{{route('admin/Media_Center/Delete_News')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <h4 class="pb-3">هل انت متاكد من حذف هذه الخبر نهائيا !!</h4>
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



    <!-------------------------start ADD modal -------------------------------------------------------------->
    <div class="modal fade show" id="create_join" tabindex="-1" aria-modal="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>اضافة اعلان جديد</h2>
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
                    <form method="post" enctype="multipart/form-data" id="kt_modal_new_card_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('admin/Media_Center/Add_News')}}">
                    {{csrf_field()}}
                    <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <div class="row">
                                <div class="col-6">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">العنوان الرئيسي بالعربي</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid mb-4" placeholder=" اكتب العنوان الرئيسي بالعربي" name="title_ar" value="" autocomplete="off">
                                    <!--end::Input group-->
                                </div>
                                <div class="col-6">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">العنوان الرئيسي بالانجليزي</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب العنوان الرئيسي بالانجليزي" name="title_en" value="" autocomplete="off">
                                    <!--end::Input group-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">المحتوي بالعربي</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب المحتوي بالعربي" name="content_ar" value="" autocomplete="off">
                                    <!--end::Input group-->
                                </div>
                                <div class="col-6">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">المحتوي بالانجليزي</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب المحتوي بالانجليزي" name="content_en" value="" autocomplete="off">
                                    <!--end::Input group-->
                                </div>
                            </div>


                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">

                                <div class="row wd-300">
                                    <label for="title_ar" class="mr-sm-2">ادخال الصوره
                                        :</label>
                                    <input type="file" class="form-control" name="image">
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
                    <form method="post" id="kt_modal_new_card_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('admin/Media_Center/Edit_News')}}" enctype="multipart/form-data">
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

                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">الاسم بالعربي</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب اسم القائل بالعربي" name="title_ar" id="title_ar" autocomplete="off">
                            </div>
                            <div class="col-6">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">الاسم بالانجليزي</span>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid mb-4" placeholder="اكتب اسم القائل بالانجليزي" name="title_en" id="title_en"  autocomplete="off">
                            </div>
                            <!--end::Input group-->
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">المحتوى بالعربي</span>
                                </label>
                                <!--end::Label-->
                                <textarea type="text" class="form-control form-control-solid mb-4" rows="3" placeholder="اكتب المحتوى بالعربي" name="content_ar" id="content_ar"  autocomplete="off"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">المحتوى بالانجليزي</span>
                                </label>
                                <!--end::Label-->
                                <textarea type="text" class="form-control form-control-solid mb-4" rows="3" placeholder="اكتب المحتوى بالانجليزي" name="content_en" id="content_en"  autocomplete="off"></textarea>
                            </div>
                            <!--end::Input group-->
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
            var address_ar = button.data('address_ar')
            var address_en = button.data('address_en')
            var content_ar = button.data('content_ar')
            var content_en = button.data('content_en')
            var img_show = button.data('category-image')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #title_ar').val(title_ar);
            modal.find('.modal-body #title_en').val(title_en);
            modal.find('.modal-body #address_ar').val(address_ar);
            modal.find('.modal-body #address_en').val(address_en);
            modal.find('.modal-body #content_ar').val(content_ar);
            modal.find('.modal-body #content_en').val(content_en);
            modal.find('.modal-body #img_show').attr('src',img_show );
        });



    });
</script>

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
