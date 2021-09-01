@extends('layouts.admin.app')
@section('page_name') التقارير الطبية @endsection
@section('content')
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
    <!-----------------------------------Start Data Table ------------------------------------->

    <div class="card mb-5 mb-xl-8 mt-10">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">التقارير المرفوعة للمرضي</span>
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
                        <th class="min-w-80px">#</th>
                        <th class="min-w-80px">المريض</th>
                        <th class="min-w-80px">التقرير المرفوع</th>
                        <th class="min-w-200px rounded-end">العمليات</th>
                    </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                    <?php $i = 1?>
                    @foreach($reports as $report)
                        @if($report->reservation->doctor_id == admin()->user()->id)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$report->reservation->name}}</td>
                            <td>
                            @if($report->reservation->report_text != null)
                                <button data-bs-toggle='modal' data-bs-target="#reservation2" class="btn btn-sm btn-color-muted btn-active-primary fw-bold px-4 me-1" data-toggle="modal"
                                        data-id="{{$report->id}}" data-name="{{$report->reservation->name}}" data-report="{{$report->reservation->report_text}}" >
                                    <i class="fa fa-file" aria-hidden="true" style="font-size:20px "></i>
                                    عرض التقرير
                                    </button>
                            @else
                                <span class="text-gray-600">لا يوجد</span>
                            @endif
                            </td>
                                <td class="">
                                <a href="{{url($report->report)}}" target="_blank" title="فتح التقرير" class="btn btn-sm btn-color-muted btn-active-light-primary fw-bolder px-4 me-1"
                                        data-id="{{$report->id}}">
                                    <i class="fa fa-eye"></i>
                                    عرض
                                </a>
                                <a class="btn btn-sm btn-color-muted btn-active-light-success fw-bolder px-4 me-1"
                                   href="{{url($report->report)}}"
                                   download
                                   role="button"><i
                                        class="fas fa-download"></i>&nbsp;
                                    تحميل</a>
                                <button data-bs-toggle='modal' data-bs-target="#reservation" class="btn btn-sm btn-color-muted btn-active-light-danger fw-bolder px-4 me-1" data-toggle="modal"
                                        data-id="{{$report->id}}" data-name="{{$report->reservation->name}}" >
                                    <i class="fa fa-trash"></i>
                                    حذف </button>
                            </td>
                        </tr>
                        <?php $i ++?>
                        @endif
                    @endforeach

                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
    </div>


    <!-------------------------Start DELETE modal ------------------------------------------------------------>
    <div class="modal fade" id="reservation" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>حذف تقرير</h2>
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
                    <form id="kt_modal_new_card_form" class="form" action="{{route('delete_report')}}" method="post">
                        {{csrf_field()}}

                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <h4 class="pb-3">هل انت متاكد من حذف التقرير الخاص بالمريض التالي ؟</h4>
                            <!--end::Label-->
                            <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                            <input type="text" disabled class="form-control form-control-solid fs-2" placeholder="" name="name" id="name" value="" >
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


    <!-------------------------Start DELETE modal ------------------------------------------------------------>
    <div class="modal fade show" id="reservation2" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog model-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2> عرض التقارير</h2>
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
                <div class="modal-body scroll-y mx-3 mx-xl-15 my-3" style="height:500px">
                    <!--begin::Form-->
                    <form id="kt_modal_new_card_form" class="form" action="" method="" style="height:350px">
                        {{csrf_field()}}

                        <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container" style="height:350px">
                            <input type="hidden" class="form-control form-control-solid pt" name="id" id="id" value="">
                            <div type="text" disabled class="form-control form-control-solid fs-2" placeholder="" name="report" id="report" value="" style="height:100%"></div>
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-danger  me-3" data-bs-dismiss="modal">الغاء</button>
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
        $('#reservation').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        });

    });
</script>
<script>
    $(document).ready(function(){
        //Show data in the delete form
        $('#reservation2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var report = button.data('report')
            $(this).find('.modal-body #report').text('');
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #report').append(report);
        });

    });
</script>
