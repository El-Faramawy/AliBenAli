@extends('layouts.admin.app')
@section('page_name') العروض @endsection
@section('content')
<br>
<br>
<br>
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{ $errors->first() }}',
            text: 'حاول مرة اخري!',
            confirmButtonText: 'حسنا',

// footer: '<a href="">Why do I have this issue?</a>'
        })
    </script>
@endif
<a href="{{route('admin.offer_add')}}" class="btn btn-primary er fs-6 mt-10">
    <span><i class="bi bi-plus-circle"></i></span>
    اضافة جديد</a>
<div class="row mt-3">
    @foreach($offers as $offer)
<div class="card mb-6 mb-xl-9 ml-3 col-xl-5">
    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Header-->
        <div class="row">
            <!--begin::Title-->
            <div class="mb-2 col-xl-7">
                <p class="fs-4 fw-bolder mb-1 text-gray-900 text-hover-primary">{{$offer->title_ar}} | {{$offer->title_en}}</p>
                <?php
                    $sum   = 0;
                    $count = 0;
                    ?>
                    @foreach($offer->rates as $rate)
                        <?php
                            $count ++;
                            $sum = $rate->rate + $sum
                        ?>
                    @endforeach
                    @if($count != 0)
                    @for($i = 1 ; $i <= number_format($sum / $count,0) ; $i++)
                        <i class="bi bi-star-fill" style="color: #FFD700" aria-hidden="true"></i>
                    @endfor
                    @for($i = 1 ; $i <= 5 - number_format($sum / $count,0) ; $i++)
                        <i class="bi bi-star" style="color: #FFD700" aria-hidden="true"></i>
                    @endfor
                    <p class="fs-6">من {{$count}} تقييمات</p>
                    @else
                    <span class="fs-6"><br></span>
                    <p class="fs-6">لا يوجد تقييمات</p>
                    @endif
            </div>
            <!--end::Title-->
            <div class="col-xl-5">
            <span class="badge badge-info">{{$offer->new_price}}</span>
            <span class="badge badge-danger text-decoration-line-through">{{$offer->old_price}}</span>
            <span class="badge badge-light">خصم {{$offer->offer}}%</span>
            </div>
            <!--end::Badge-->
        </div>
        <!--end::Header-->

        <!--begin::Content-->
        <div class="fs-6 fw-bold text-gray-600 mb-1">{{Str::limit($offer->details_ar,100)}}</div>
        @if($offer->clinic_id != null)
        <div class="mb-2">
            <span class="fw-bold text-gray-600 fs-5">يتبع قسم : </span>
            <span class="fs-6 fw-bolder text-primary mb-5">{{$offer->clinic->name_ar}}</span>
        </div>
        @endif
        <!--end::Content-->
        <!--begin::Footer-->
        <div class="d-flex flex-stack flex-wrapr">
            <!--begin::Users-->
            <div class="symbol-group symbol-hover my-1">
                @foreach($sliders as $slider)
                    @if($slider->offer_id == $offer->id)
                    <div class="symbol symbol-35px symbol-circle">
                    <img alt="Pic" src="{{asset($slider->image)}}" onclick="window.open(this.src)">
                </div>
                    @endif
                @endforeach
            </div>
            <!--end::Users-->
            <!--begin::Stats-->
            <div class="d-flex my-1">
                @if($offer->date->count())
                <div class="border border-dashed border-gray-300 rounded py-2 px-1">
                    <!--begin::Svg Icon | path: icons/duotone/General/Clip.svg-->
                    <a class="btn-sm" href="{{route('admin.offer_date',$offer->id)}}" title="عرض الايام">
                            <span class="svg-icon svg-icon-3">
                                <span class="svg-icon svg-icon-3">
                                    <i class="fa fa-calendar-alt text-success"></i>
                                </span>
                            </span>
                        <!--end::Svg Icon-->
                    </a>
                </div>
                @endif
            <!--begin::Stat-->
                <div class="border border-dashed border-gray-300 rounded py-2 px-2 mr-1">
                    <!--begin::Svg Icon | path: icons/duotone/Communication/Group-chat.svg-->
                    <a href="{{url('admin/edit_offer',$offer->id)}}">
                            <span class="svg-icon svg-icon-3">
                                <span class="svg-icon svg-icon-3">
                                    <i class="fa fa-edit text-info"></i>
                                </span>
                            </span>
                        <!--end::Svg Icon-->
                    </a>
                </div>
                <!--end::Stat-->
                <!--begin::Stat-->
                <div class="border border-dashed border-gray-300 rounded py-2 px-1">
                    <!--begin::Svg Icon | path: icons/duotone/General/Clip.svg-->
                    <button data-bs-toggle='modal' data-bs-target="#delete_offer" class="" data-toggle="modal" style="background-color: transparent;border: 0px"
                            data-id="{{$offer->id}}" data-name="{{$offer->title_ar}}">
                            <span class="svg-icon svg-icon-3">
                                <span class="svg-icon svg-icon-3">
                                    <i class="fa fa-trash text-danger"></i>
                                </span>
                            </span>
                        <!--end::Svg Icon-->
                    </button>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Stat-->
            </div>
            <!--end::Stats-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Card body-->
</div>
    @endforeach
</div>
<!-------------------------Start DELETE modal ------------------------------------------------------------>
<div class="modal fade" id="delete_offer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>حذف عرض</h2>
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
                <form id="kt_modal_new_card_form" class="form" action="{{route('admin.delete_offer')}}" method="post">
                    {{csrf_field()}}

                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <h4 class="pb-3">هل انت متاكد من حذف هذا العرض</h4>
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


@endsection

<script src="{{url('/')}}/admin/assets/js/jquery.js"></script>
<script src="{{url('/')}}/admin/assets/js/sweet.js"></script>
<script>
    $(document).ready(function(){
        //Show data in the delete form
        $('#delete_offer').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        });
    });
</script>
