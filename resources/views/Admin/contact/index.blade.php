@extends('layouts.admin.app')
@section('page_name') رسائل العملاء @endsection
@section('content')


<!-----------------------------------Start Data Table ------------------------------------->
<br>
<br>
<br>
@if ($errors->any())
    <div class="alert alert-danger mt-3 py-4">
        <h3> خطأ !!</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card mb-5 mb-xl-8 mt-10">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">اطلع علي شكاوي ورسائل العملاء </span>
        </h3>
        <div class="card-toolbar">
            <a href="" class="btn btn-danger er fs-6 px-7 py-3" data-bs-toggle="modal" data-bs-target="#delete_all">حذف الكل</a>
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
                    <th class="min-w-80px">الاسم</th>
                    <th class="min-w-80px">الايميل</th>
                    <th class="min-w-80px">الرقم</th>
                    <th class="min-w-80px">الرسالة</th>
                    <th class="min-w-80px">وقت الارسال</th>
                    <th class="min-w-200px rounded-end">العمليات</th>
                </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                @foreach($contacts as $contact)
                    <tr>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->phone != null ? $contact->phone : 'لم يسجل'}}</td>
                    <td>{{$contact->message}}</td>
                    <td>{{$contact->created_at->format('d/m/Y H:i')}}</td>
                    <td class="">
                        <button data-bs-toggle='modal' data-bs-target="#delete_contact" class="btn btn-icon btn-bg-light btn-danger btn-sm me-1" data-toggle="modal"
                                data-id="{{$contact->id}}"
                                data-name="{{$contact->name}}"  STYLE="border-radius: 50% !important;"
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
                <form id="kt_modal_new_card_form" class="form" action="{{route('delete_all_contacts')}}" method="post">
                    <!--begin::Input group-->
                    {{csrf_field()}}
                    <div class="d-flex flex-column mb-3 fv-row">
                        <!--begin::Label-->
                            <h4>سيتم حذف جميع الرسائل  ! هل تريد المتابعة</h4>
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
<div class="modal fade" id="delete_contact" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>حذف عداد</h2>
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
                <form id="kt_modal_new_card_form" class="form" action="{{route('delete_one_contact')}}" method="post">
                    {{csrf_field()}}

                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                            <h4 class="pb-3">هل انت متاكد من حذف رسالة هذا العميل</h4>
                        <!--end::Label-->
                        <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                        <input type="text" class="form-control form-control-solid pt fs-2" name="name" id="name" value="">
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




@endsection
<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>

<script>
    $(document).ready(function(){
        //Show data in the delete form
    $('#delete_contact').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
    });

    });
</script>

