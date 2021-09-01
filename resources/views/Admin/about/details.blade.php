@extends('layouts.admin.app')
@section('page_name') رؤيتنا @endsection
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
                <span class="card-label fw-bolder fs-3 mb-1">رؤيتنا ورسالتنا</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{route('add_About_details')}}" class="btn btn-light-primary er fs-6 px-7 py-3 ml-2">
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
                        <th class="min-w-80px">العنوان بالعربي</th>
                        <th class="min-w-80px">العنوان بالانجليزي</th>
                        <th class="min-w-125px">المحتوي بالعربي</th>
                        <th class="min-w-125px">المحتوي بالانجليزي</th>
                        <th class="ps-4 min-w-100px rounded-start">الايقونة</th>
                        <th class="min-w-200px rounded-end">العمليات</th>
                    </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                    @foreach($abouts as $about)
                        <tr>
                            <td>{{$about->title_ar}}</td>
                            <td>{{$about->title_en}}</td>
                            <td>{!!Str::limit($about->text_ar,50)!!}</td>
                            <td>{!!Str::limit($about->text_en,50)!!}</td>
                            <td><span><i class="{{$about->icon}}"></i></span></td>
                            <td class="">
                                <a href="{{ route('edit_About_details',$about->id) }}" class="btn btn-icon btn-bg-light btn-primary btn-sm me-1" style="border-radius: 50% !important"
                                        data-id="{{$about->id}}"
                                        data-about_title_ar="{{$about->title_ar}}"
                                >
                            <span class="svg-icon svg-icon-3">
                                <span class="svg-icon svg-icon-3">
                                    <i class="bi bi-pencil"></i>
                                </span>
                            </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <button data-bs-toggle='modal' data-bs-target="#delete_about" class="btn btn-icon btn-bg-light btn-danger btn-sm me-1" data-toggle="modal" style="border-radius: 50% !important"
                                        data-id="{{$about->id}}"
                                        data-about_title_ar="{{$about->title_ar}}"
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
    <!-------------------------Start DELETE modal ------------------------------------------------------------>
    <div class="modal fade" id="delete_about" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>حذف صف</h2>
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
                    <form id="kt_modal_new_card_form" class="form" action="{{route('delete_about_details')}}" method="post">
                        {{csrf_field()}}

                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <h4 class="pb-3">هل انت متاكد من حذف هذا الصف</h4>
                            <!--end::Label-->
                            <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                            <input type="text" disabled class="form-control form-control-solid fs-2" placeholder="" name="about_title" id="about_title" value="">
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

<script>
    $(document).ready(function() {
        //Show data in the delete form
        $('#delete_about').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var title_ar = button.data('about_title_ar')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #about_title').val(title_ar);
        });
    });
</script>
