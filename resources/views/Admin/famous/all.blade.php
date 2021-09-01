@extends('layouts.admin.app')
@section('page_name') قائمة المشاهير @endsection
@section('content')


{{--##################################### Start Data Table #####################################--}}
<br>
<br>
<br>
<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">قائمة المشاهير</span>
        </h3>
        <div class="card-toolbar">
{{--            <button class="btn-lg btn btn-primary">اضافة جديد</button>--}}
            <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Add New Card</a>
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
                    <th class="ps-4 min-w-300px rounded-start">Agent</th>
                    <th class="min-w-125px">Earnings</th>
                    <th class="min-w-125px">Comission</th>
                    <th class="min-w-200px">Company</th>
                    <th class="min-w-150px">Rating</th>
                    <th class="min-w-200px text-end rounded-end"></th>
                </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
																	<span class="symbol-label bg-light">
																		<img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="">
																	</span>
                            </div>
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Brad Simmons</a>
                                <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$8,000,000</a>
                        <span class="text-muted fw-bold text-muted d-block fs-7">Pending</span>
                    </td>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$5,400</a>
                        <span class="text-muted fw-bold text-muted d-block fs-7">Paid</span>
                    </td>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">Intertico</a>
                        <span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span>
                    </td>
                    <td>
                        <div class="rating">
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                        </div>
                        <span class="text-muted fw-bold text-muted d-block fs-7 mt-1">Best Rated</span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
                        <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
																	<span class="symbol-label bg-light">
																		<img src="assets/media/svg/avatars/047-girl-25.svg" class="h-75 align-self-end" alt="">
																	</span>
                            </div>
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Lebron Wayde</a>
                                <span class="text-muted fw-bold text-muted d-block fs-7">PHP, Laravel, VueJS</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$8,750,000</a>
                        <span class="text-muted fw-bold text-muted d-block fs-7">Paid</span>
                    </td>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$7,400</a>
                        <span class="text-muted fw-bold text-muted d-block fs-7">Paid</span>
                    </td>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">Agoda</a>
                        <span class="text-muted fw-bold text-muted d-block fs-7">Houses &amp; Hotels</span>
                    </td>
                    <td>
                        <div class="rating">
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                        </div>
                        <span class="text-muted fw-bold text-muted d-block fs-7 mt-1">Above Avarage</span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
                        <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
																	<span class="symbol-label bg-light">
																		<img src="assets/media/svg/avatars/006-girl-3.svg" class="h-75 align-self-end" alt="">
																	</span>
                            </div>
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Brad Simmons</a>
                                <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$8,000,000</a>
                        <span class="text-muted fw-bold text-muted d-block fs-7">In Proccess</span>
                    </td>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$2,500</a>
                        <span class="text-muted fw-bold text-muted d-block fs-7">Rejected</span>
                    </td>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">RoadGee</a>
                        <span class="text-muted fw-bold text-muted d-block fs-7">Paid</span>
                    </td>
                    <td>
                        <div class="rating">
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                        </div>
                        <span class="text-muted fw-bold text-muted d-block fs-7 mt-1">Best Rated</span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
                        <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
																	<span class="symbol-label bg-light">
																		<img src="assets/media/svg/avatars/014-girl-7.svg" class="h-75 align-self-end" alt="">
																	</span>
                            </div>
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Natali Trump</a>
                                <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$700,000</a>
                        <span class="text-muted fw-bold text-muted d-block fs-7">Pending</span>
                    </td>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$7,760</a>
                        <span class="text-muted fw-bold text-muted d-block fs-7">Paid</span>
                    </td>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">The Hill</a>
                        <span class="text-muted fw-bold text-muted d-block fs-7">Insurance</span>
                    </td>
                    <td>
                        <div class="rating">
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                        </div>
                        <span class="text-muted fw-bold text-muted d-block fs-7 mt-1">Avarage</span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
                        <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-5">
																	<span class="symbol-label bg-light">
																		<img src="assets/media/svg/avatars/020-girl-11.svg" class="h-75 align-self-end" alt="">
																	</span>
                            </div>
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Jessie Clarcson</a>
                                <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$1,320,000</a>
                        <span class="text-muted fw-bold text-muted d-block fs-7">Pending</span>
                    </td>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">$6,250</a>
                        <span class="text-muted fw-bold text-muted d-block fs-7">Paid</span>
                    </td>
                    <td>
                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">Intertico</a>
                        <span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span>
                    </td>
                    <td>
                        <div class="rating">
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                            <div class="rating-label me-2 checked">
                                <i class="bi bi-star-fill fs-5"></i>
                            </div>
                        </div>
                        <span class="text-muted fw-bold text-muted d-block fs-7 mt-1">Best Rated</span>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
                        <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
                    </td>
                </tr>
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
    <!--begin::Body-->
</div>
<!--begin::Modal - New Card-->
<div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Add New Card</h2>
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
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="kt_modal_new_card_form" class="form" action="#">
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-7 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Name On Card</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a card holder's name"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="card_name" value="Max Doe" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-7 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-bold form-label mb-2">Card Number</label>
                        <!--end::Label-->
                        <!--begin::Input wrapper-->
                        <div class="position-relative">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter card number" name="card_number" value="4111 1111 1111 1111" />
                            <!--end::Input-->
                            <!--begin::Card logos-->
                            <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                <img src="assets/media/svg/card-logos/visa.svg" alt="" class="h-25px" />
                                <img src="assets/media/svg/card-logos/mastercard.svg" alt="" class="h-25px" />
                                <img src="assets/media/svg/card-logos/american-express.svg" alt="" class="h-25px" />
                            </div>
                            <!--end::Card logos-->
                        </div>
                        <!--end::Input wrapper-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-10">
                        <!--begin::Col-->
                        <div class="col-md-8 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold form-label mb-2">Expiration Date</label>
                            <!--end::Label-->
                            <!--begin::Row-->
                            <div class="row fv-row">
                                <!--begin::Col-->
                                <div class="col-6">
                                    <select name="card_expiry_month" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Month">
                                        <option></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-6">
                                    <select name="card_expiry_year" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Year">
                                        <option></option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                        <option value="2031">2031</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-4 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">CVV</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Enter a card CVV code"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input wrapper-->
                            <div class="position-relative">
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" minlength="3" maxlength="4" placeholder="CVV" name="card_cvv" />
                                <!--end::Input-->
                                <!--begin::CVV icon-->
                                <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                    <!--begin::Svg Icon | path: icons/duotone/Shopping/Credit-card.svg-->
                                    <span class="svg-icon svg-icon-2hx">
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24" height="24" />
																				<rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2" />
																				<rect fill="#000000" x="2" y="8" width="20" height="3" />
																				<rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1" />
																			</g>
																		</svg>
																	</span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::CVV icon-->
                            </div>
                            <!--end::Input wrapper-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-stack">
                        <!--begin::Label-->
                        <div class="me-5">
                            <label class="fs-6 fw-bold form-label">Save Card for further billing?</label>
                            <div class="fs-7 fw-bold text-gray-400">If you need more info, please check budget planning</div>
                        </div>
                        <!--end::Label-->
                        <!--begin::Switch-->
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                            <span class="form-check-label fw-bold text-gray-400">Save Card</span>
                        </label>
                        <!--end::Switch-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-white me-3" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
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
<!--end::Modal - New Card-->
@endsection
