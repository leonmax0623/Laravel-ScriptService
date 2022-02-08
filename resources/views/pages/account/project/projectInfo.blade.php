<title>{{ $projectInfo->project_name }}</title>
@section('PageName', $projectInfo->project_name)
@section('breadcrumbs')
    <li class="breadcrumb-item text-gray-600">
        <a href="/" class="text-muted text-hover-primary">
            Рабочая панель
        </a>
    </li>
    <li class="breadcrumb-item text-gray-600">
        <a href="/account/project" class="text-muted text-hover-primary">
            Мои проекты
        </a>
    </li>
    <li class="breadcrumb-item text-gray-500">{{ $projectInfo->project_name }}</li>
@endsection
<x-base-layout>
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl" bis_skin_checked="1">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content" bis_skin_checked="1" data-select2-id="select2-data-kt_content">
            <!--begin::Navbar-->
            <div class="card mb-6 mb-xl-9" bis_skin_checked="1">
                <div class="card-body pt-9 pb-0" bis_skin_checked="1">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-6" bis_skin_checked="1">
                        <!--begin::Image-->
                        <div class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4" bis_skin_checked="1">
                            <img class="mw-50px mw-lg-75px" src="/core/media/svg/brand-logos/disqus.svg" alt="image">
                        </div>
                        <!--end::Image-->
                        <!--begin::Wrapper-->
                        <div class="flex-grow-1" bis_skin_checked="1">
                            <!--begin::Head-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2" bis_skin_checked="1">
                                <!--begin::Details-->
                                <div class="d-flex flex-column" bis_skin_checked="1">
                                    <!--begin::Status-->
                                    <div class="d-flex align-items-center mb-1" bis_skin_checked="1">
                                        <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">{{$projectInfo->project_name}}</a>
                                        @if($projectInfo->status == 0)
                                            <span class="badge badge-light-success me-auto">В разработке </span>
                                        @elseif($projectInfo->status == 1)
                                            <span class="badge badge-light-warning me-auto">На экспертизе </span>
                                        @else
                                            <span class="badge badge-light-success me-auto">Готов </span>
                                        @endif
                                    </div>
                                    <!--end::Status-->
                                    <!--begin::Description-->
                                    <div class="d-flex flex-wrap fw-bold mb-4 fs-5 text-gray-400" bis_skin_checked="1">{{$projectInfo->description}}</div>
                                    <!--end::Description-->
                                </div>
                            </div>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Details-->
                    <div class="separator" bis_skin_checked="1"></div>
                    <!--begin::Nav wrapper-->
                    <div class="d-flex overflow-auto h-55px" bis_skin_checked="1">
                        <!--begin::Nav links-->
                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                            <!--begin::Nav item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary me-6 active" href="#">Основная информация</a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary me-6" href="#">Результаты расчетов</a>
                            </li>
                        </ul>
                        <!--end::Nav links-->
                    </div>
                    <!--end::Nav wrapper-->
                </div>
            </div>
            <!--end::Navbar-->
            <!--begin::Modals-->
            <!--begin::Modal - View Users-->
            <div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true" bis_skin_checked="1">
                <!--begin::Modal dialog-->
                <div class="modal-dialog mw-650px" bis_skin_checked="1">
                    <!--begin::Modal content-->
                    <div class="modal-content" bis_skin_checked="1">
                        <!--begin::Modal header-->
                        <div class="modal-header pb-0 border-0 justify-content-end" bis_skin_checked="1">
                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" bis_skin_checked="1">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
														<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
													</svg>
												</span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--begin::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15" bis_skin_checked="1">
                            <!--begin::Heading-->
                            <div class="text-center mb-13" bis_skin_checked="1">
                                <!--begin::Title-->
                                <h1 class="mb-3">Browse Users</h1>
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="text-muted fw-bold fs-5" bis_skin_checked="1">If you need more info, please check out our
                                    <a href="#" class="link-primary fw-bolder">Users Directory</a>.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Users-->
                            <div class="mb-15" bis_skin_checked="1">
                                <!--begin::List-->
                                <div class="mh-375px scroll-y me-n7 pe-7" bis_skin_checked="1">
                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-1.jpg">
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-6" bis_skin_checked="1">
                                                <!--begin::Name-->
                                                <a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Emma Smith
                                                    <span class="badge badge-light fs-8 fw-bold ms-2">Art Director</span></a>
                                                <!--end::Name-->
                                                <!--begin::Email-->
                                                <div class="fw-bold text-muted" bis_skin_checked="1">e.smith@kpmg.com.au</div>
                                                <!--end::Email-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Stats-->
                                        <div class="d-flex" bis_skin_checked="1">
                                            <!--begin::Sales-->
                                            <div class="text-end" bis_skin_checked="1">
                                                <div class="fs-5 fw-bolder text-dark" bis_skin_checked="1">$23,000</div>
                                                <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                            </div>
                                            <!--end::Sales-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                <span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-6" bis_skin_checked="1">
                                                <!--begin::Name-->
                                                <a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Melody Macy
                                                    <span class="badge badge-light fs-8 fw-bold ms-2">Marketing Analytic</span></a>
                                                <!--end::Name-->
                                                <!--begin::Email-->
                                                <div class="fw-bold text-muted" bis_skin_checked="1">melody@altbox.com</div>
                                                <!--end::Email-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Stats-->
                                        <div class="d-flex" bis_skin_checked="1">
                                            <!--begin::Sales-->
                                            <div class="text-end" bis_skin_checked="1">
                                                <div class="fs-5 fw-bolder text-dark" bis_skin_checked="1">$50,500</div>
                                                <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                            </div>
                                            <!--end::Sales-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-26.jpg">
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-6" bis_skin_checked="1">
                                                <!--begin::Name-->
                                                <a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Max Smith
                                                    <span class="badge badge-light fs-8 fw-bold ms-2">Software Enginer</span></a>
                                                <!--end::Name-->
                                                <!--begin::Email-->
                                                <div class="fw-bold text-muted" bis_skin_checked="1">max@kt.com</div>
                                                <!--end::Email-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Stats-->
                                        <div class="d-flex" bis_skin_checked="1">
                                            <!--begin::Sales-->
                                            <div class="text-end" bis_skin_checked="1">
                                                <div class="fs-5 fw-bolder text-dark" bis_skin_checked="1">$75,900</div>
                                                <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                            </div>
                                            <!--end::Sales-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-4.jpg">
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-6" bis_skin_checked="1">
                                                <!--begin::Name-->
                                                <a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Sean Bean
                                                    <span class="badge badge-light fs-8 fw-bold ms-2">Web Developer</span></a>
                                                <!--end::Name-->
                                                <!--begin::Email-->
                                                <div class="fw-bold text-muted" bis_skin_checked="1">sean@dellito.com</div>
                                                <!--end::Email-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Stats-->
                                        <div class="d-flex" bis_skin_checked="1">
                                            <!--begin::Sales-->
                                            <div class="text-end" bis_skin_checked="1">
                                                <div class="fs-5 fw-bolder text-dark" bis_skin_checked="1">$10,500</div>
                                                <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                            </div>
                                            <!--end::Sales-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-15.jpg">
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-6" bis_skin_checked="1">
                                                <!--begin::Name-->
                                                <a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Brian Cox
                                                    <span class="badge badge-light fs-8 fw-bold ms-2">UI/UX Designer</span></a>
                                                <!--end::Name-->
                                                <!--begin::Email-->
                                                <div class="fw-bold text-muted" bis_skin_checked="1">brian@exchange.com</div>
                                                <!--end::Email-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Stats-->
                                        <div class="d-flex" bis_skin_checked="1">
                                            <!--begin::Sales-->
                                            <div class="text-end" bis_skin_checked="1">
                                                <div class="fs-5 fw-bolder text-dark" bis_skin_checked="1">$20,000</div>
                                                <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                            </div>
                                            <!--end::Sales-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                <span class="symbol-label bg-light-warning text-warning fw-bold">C</span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-6" bis_skin_checked="1">
                                                <!--begin::Name-->
                                                <a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Mikaela Collins
                                                    <span class="badge badge-light fs-8 fw-bold ms-2">Head Of Marketing</span></a>
                                                <!--end::Name-->
                                                <!--begin::Email-->
                                                <div class="fw-bold text-muted" bis_skin_checked="1">mikaela@pexcom.com</div>
                                                <!--end::Email-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Stats-->
                                        <div class="d-flex" bis_skin_checked="1">
                                            <!--begin::Sales-->
                                            <div class="text-end" bis_skin_checked="1">
                                                <div class="fs-5 fw-bolder text-dark" bis_skin_checked="1">$9,300</div>
                                                <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                            </div>
                                            <!--end::Sales-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-8.jpg">
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-6" bis_skin_checked="1">
                                                <!--begin::Name-->
                                                <a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Francis Mitcham
                                                    <span class="badge badge-light fs-8 fw-bold ms-2">Software Arcitect</span></a>
                                                <!--end::Name-->
                                                <!--begin::Email-->
                                                <div class="fw-bold text-muted" bis_skin_checked="1">f.mitcham@kpmg.com.au</div>
                                                <!--end::Email-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Stats-->
                                        <div class="d-flex" bis_skin_checked="1">
                                            <!--begin::Sales-->
                                            <div class="text-end" bis_skin_checked="1">
                                                <div class="fs-5 fw-bolder text-dark" bis_skin_checked="1">$15,000</div>
                                                <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                            </div>
                                            <!--end::Sales-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                <span class="symbol-label bg-light-danger text-danger fw-bold">O</span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-6" bis_skin_checked="1">
                                                <!--begin::Name-->
                                                <a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Olivia Wild
                                                    <span class="badge badge-light fs-8 fw-bold ms-2">System Admin</span></a>
                                                <!--end::Name-->
                                                <!--begin::Email-->
                                                <div class="fw-bold text-muted" bis_skin_checked="1">olivia@corpmail.com</div>
                                                <!--end::Email-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Stats-->
                                        <div class="d-flex" bis_skin_checked="1">
                                            <!--begin::Sales-->
                                            <div class="text-end" bis_skin_checked="1">
                                                <div class="fs-5 fw-bolder text-dark" bis_skin_checked="1">$23,000</div>
                                                <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                            </div>
                                            <!--end::Sales-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                <span class="symbol-label bg-light-primary text-primary fw-bold">N</span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-6" bis_skin_checked="1">
                                                <!--begin::Name-->
                                                <a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Neil Owen
                                                    <span class="badge badge-light fs-8 fw-bold ms-2">Account Manager</span></a>
                                                <!--end::Name-->
                                                <!--begin::Email-->
                                                <div class="fw-bold text-muted" bis_skin_checked="1">owen.neil@gmail.com</div>
                                                <!--end::Email-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Stats-->
                                        <div class="d-flex" bis_skin_checked="1">
                                            <!--begin::Sales-->
                                            <div class="text-end" bis_skin_checked="1">
                                                <div class="fs-5 fw-bolder text-dark" bis_skin_checked="1">$45,800</div>
                                                <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                            </div>
                                            <!--end::Sales-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-6.jpg">
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-6" bis_skin_checked="1">
                                                <!--begin::Name-->
                                                <a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Dan Wilson
                                                    <span class="badge badge-light fs-8 fw-bold ms-2">Web Desinger</span></a>
                                                <!--end::Name-->
                                                <!--begin::Email-->
                                                <div class="fw-bold text-muted" bis_skin_checked="1">dam@consilting.com</div>
                                                <!--end::Email-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Stats-->
                                        <div class="d-flex" bis_skin_checked="1">
                                            <!--begin::Sales-->
                                            <div class="text-end" bis_skin_checked="1">
                                                <div class="fs-5 fw-bolder text-dark" bis_skin_checked="1">$90,500</div>
                                                <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                            </div>
                                            <!--end::Sales-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                <span class="symbol-label bg-light-danger text-danger fw-bold">E</span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-6" bis_skin_checked="1">
                                                <!--begin::Name-->
                                                <a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Emma Bold
                                                    <span class="badge badge-light fs-8 fw-bold ms-2">Corporate Finance</span></a>
                                                <!--end::Name-->
                                                <!--begin::Email-->
                                                <div class="fw-bold text-muted" bis_skin_checked="1">emma@intenso.com</div>
                                                <!--end::Email-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Stats-->
                                        <div class="d-flex" bis_skin_checked="1">
                                            <!--begin::Sales-->
                                            <div class="text-end" bis_skin_checked="1">
                                                <div class="fs-5 fw-bolder text-dark" bis_skin_checked="1">$5,000</div>
                                                <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                            </div>
                                            <!--end::Sales-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-7.jpg">
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-6" bis_skin_checked="1">
                                                <!--begin::Name-->
                                                <a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Ana Crown
                                                    <span class="badge badge-light fs-8 fw-bold ms-2">Customer Relationship</span></a>
                                                <!--end::Name-->
                                                <!--begin::Email-->
                                                <div class="fw-bold text-muted" bis_skin_checked="1">ana.cf@limtel.com</div>
                                                <!--end::Email-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Stats-->
                                        <div class="d-flex" bis_skin_checked="1">
                                            <!--begin::Sales-->
                                            <div class="text-end" bis_skin_checked="1">
                                                <div class="fs-5 fw-bolder text-dark" bis_skin_checked="1">$70,000</div>
                                                <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                            </div>
                                            <!--end::Sales-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::User-->
                                    <div class="d-flex flex-stack py-5" bis_skin_checked="1">
                                        <!--begin::Details-->
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                <span class="symbol-label bg-light-info text-info fw-bold">A</span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Details-->
                                            <div class="ms-6" bis_skin_checked="1">
                                                <!--begin::Name-->
                                                <a href="#" class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Robert Doe
                                                    <span class="badge badge-light fs-8 fw-bold ms-2">Marketing Executive</span></a>
                                                <!--end::Name-->
                                                <!--begin::Email-->
                                                <div class="fw-bold text-muted" bis_skin_checked="1">robert@benko.com</div>
                                                <!--end::Email-->
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Stats-->
                                        <div class="d-flex" bis_skin_checked="1">
                                            <!--begin::Sales-->
                                            <div class="text-end" bis_skin_checked="1">
                                                <div class="fs-5 fw-bolder text-dark" bis_skin_checked="1">$45,500</div>
                                                <div class="fs-7 text-muted" bis_skin_checked="1">Sales</div>
                                            </div>
                                            <!--end::Sales-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::List-->
                            </div>
                            <!--end::Users-->
                            <!--begin::Notice-->
                            <div class="d-flex justify-content-between" bis_skin_checked="1">
                                <!--begin::Label-->
                                <div class="fw-bold" bis_skin_checked="1">
                                    <label class="fs-6">Adding Users by Team Members</label>
                                    <div class="fs-7 text-muted" bis_skin_checked="1">If you need more info, please check budget planning</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" checked="checked">
                                    <span class="form-check-label fw-bold text-muted">Allowed</span>
                                </label>
                                <!--end::Switch-->
                            </div>
                            <!--end::Notice-->
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>
            <!--end::Modal - View Users-->
            <!--begin::Modal - Users Search-->
            <div class="modal fade" id="kt_modal_users_search" tabindex="-1" aria-hidden="true" bis_skin_checked="1">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px" bis_skin_checked="1">
                    <!--begin::Modal content-->
                    <div class="modal-content" bis_skin_checked="1">
                        <!--begin::Modal header-->
                        <div class="modal-header pb-0 border-0 justify-content-end" bis_skin_checked="1">
                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" bis_skin_checked="1">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
														<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
													</svg>
												</span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--begin::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15" bis_skin_checked="1">
                            <!--begin::Content-->
                            <div class="text-center mb-13" bis_skin_checked="1">
                                <h1 class="mb-3">Search Users</h1>
                                <div class="text-muted fw-bold fs-5" bis_skin_checked="1">Invite Collaborators To Your Project</div>
                            </div>
                            <!--end::Content-->
                            <!--begin::Search-->
                            <div id="kt_modal_users_search_handler" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline" data-kt-search="true" bis_skin_checked="1">
                                <!--begin::Form-->
                                <form data-kt-search-element="form" class="w-100 position-relative mb-5" autocomplete="off">
                                    <!--begin::Hidden input(Added to disable form autocomplete)-->
                                    <input type="hidden">
                                    <!--end::Hidden input-->
                                    <!--begin::Icon-->
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
															<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
														</svg>
													</span>
                                    <!--end::Svg Icon-->
                                    <!--end::Icon-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-lg form-control-solid px-15" name="search" value="" placeholder="Search by username, full name or email..." data-kt-search-element="input">
                                    <!--end::Input-->
                                    <!--begin::Spinner-->
                                    <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
														<span class="spinner-border h-15px w-15px align-middle text-muted"></span>
													</span>
                                    <!--end::Spinner-->
                                    <!--begin::Reset-->
                                    <span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none" data-kt-search-element="clear">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
														<span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
																<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
															</svg>
														</span>
                                        <!--end::Svg Icon-->
													</span>
                                    <!--end::Reset-->
                                </form>
                                <!--end::Form-->
                                <!--begin::Wrapper-->
                                <div class="py-5" bis_skin_checked="1">
                                    <!--begin::Suggestions-->
                                    <div data-kt-search-element="suggestions" bis_skin_checked="1">
                                        <!--begin::Heading-->
                                        <h3 class="fw-bold mb-5">Recently searched:</h3>
                                        <!--end::Heading-->
                                        <!--begin::Users-->
                                        <div class="mh-375px scroll-y me-n7 pe-7" bis_skin_checked="1">
                                            <!--begin::User-->
                                            <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle me-5" bis_skin_checked="1">
                                                    <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-1.jpg">
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Info-->
                                                <div class="fw-bold" bis_skin_checked="1">
                                                    <span class="fs-6 text-gray-800 me-2">Emma Smith</span>
                                                    <span class="badge badge-light">Art Director</span>
                                                </div>
                                                <!--end::Info-->
                                            </a>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle me-5" bis_skin_checked="1">
                                                    <span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Info-->
                                                <div class="fw-bold" bis_skin_checked="1">
                                                    <span class="fs-6 text-gray-800 me-2">Melody Macy</span>
                                                    <span class="badge badge-light">Marketing Analytic</span>
                                                </div>
                                                <!--end::Info-->
                                            </a>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle me-5" bis_skin_checked="1">
                                                    <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-26.jpg">
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Info-->
                                                <div class="fw-bold" bis_skin_checked="1">
                                                    <span class="fs-6 text-gray-800 me-2">Max Smith</span>
                                                    <span class="badge badge-light">Software Enginer</span>
                                                </div>
                                                <!--end::Info-->
                                            </a>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle me-5" bis_skin_checked="1">
                                                    <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-4.jpg">
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Info-->
                                                <div class="fw-bold" bis_skin_checked="1">
                                                    <span class="fs-6 text-gray-800 me-2">Sean Bean</span>
                                                    <span class="badge badge-light">Web Developer</span>
                                                </div>
                                                <!--end::Info-->
                                            </a>
                                            <!--end::User-->
                                            <!--begin::User-->
                                            <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle me-5" bis_skin_checked="1">
                                                    <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-15.jpg">
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Info-->
                                                <div class="fw-bold" bis_skin_checked="1">
                                                    <span class="fs-6 text-gray-800 me-2">Brian Cox</span>
                                                    <span class="badge badge-light">UI/UX Designer</span>
                                                </div>
                                                <!--end::Info-->
                                            </a>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Users-->
                                    </div>
                                    <!--end::Suggestions-->
                                    <!--begin::Results(add d-none to below element to hide the users list by default)-->
                                    <div data-kt-search-element="results" class="d-none" bis_skin_checked="1">
                                        <!--begin::Users-->
                                        <div class="mh-375px scroll-y me-n7 pe-7" bis_skin_checked="1">
                                            <!--begin::User-->
                                            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="0" bis_skin_checked="1">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='0']" value="0">
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                        <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-1.jpg">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5" bis_skin_checked="1">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma Smith</a>
                                                        <div class="fw-bold text-muted" bis_skin_checked="1">e.smith@kpmg.com.au</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Access menu-->
                                                <div class="ms-2 w-100px" bis_skin_checked="1">
                                                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-7-ks1q" tabindex="-1" aria-hidden="true">
                                                        <option value="1">Guest</option>
                                                        <option value="2" selected="selected" data-select2-id="select2-data-9-ycv4">Owner</option>
                                                        <option value="3">Can Edit</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-l4vd" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-fz52-container" aria-controls="select2-fz52-container"><span class="select2-selection__rendered" id="select2-fz52-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <!--end::Access menu-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1"></div>
                                            <!--end::Separator-->
                                            <!--begin::User-->
                                            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="1" bis_skin_checked="1">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='1']" value="1">
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                        <span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5" bis_skin_checked="1">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Melody Macy</a>
                                                        <div class="fw-bold text-muted" bis_skin_checked="1">melody@altbox.com</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Access menu-->
                                                <div class="ms-2 w-100px" bis_skin_checked="1">
                                                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-10-1w1j" tabindex="-1" aria-hidden="true">
                                                        <option value="1" selected="selected" data-select2-id="select2-data-12-p8ul">Guest</option>
                                                        <option value="2">Owner</option>
                                                        <option value="3">Can Edit</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-9rid" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-civk-container" aria-controls="select2-civk-container"><span class="select2-selection__rendered" id="select2-civk-container" role="textbox" aria-readonly="true" title="Guest">Guest</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <!--end::Access menu-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1"></div>
                                            <!--end::Separator-->
                                            <!--begin::User-->
                                            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="2" bis_skin_checked="1">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='2']" value="2">
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                        <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-26.jpg">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5" bis_skin_checked="1">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Max Smith</a>
                                                        <div class="fw-bold text-muted" bis_skin_checked="1">max@kt.com</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Access menu-->
                                                <div class="ms-2 w-100px" bis_skin_checked="1">
                                                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-13-xepx" tabindex="-1" aria-hidden="true">
                                                        <option value="1">Guest</option>
                                                        <option value="2">Owner</option>
                                                        <option value="3" selected="selected" data-select2-id="select2-data-15-ilcr">Can Edit</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-14-ag1s" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-zlev-container" aria-controls="select2-zlev-container"><span class="select2-selection__rendered" id="select2-zlev-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <!--end::Access menu-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1"></div>
                                            <!--end::Separator-->
                                            <!--begin::User-->
                                            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="3" bis_skin_checked="1">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='3']" value="3">
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                        <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-4.jpg">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5" bis_skin_checked="1">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Sean Bean</a>
                                                        <div class="fw-bold text-muted" bis_skin_checked="1">sean@dellito.com</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Access menu-->
                                                <div class="ms-2 w-100px" bis_skin_checked="1">
                                                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-16-l4p0" tabindex="-1" aria-hidden="true">
                                                        <option value="1">Guest</option>
                                                        <option value="2" selected="selected" data-select2-id="select2-data-18-95up">Owner</option>
                                                        <option value="3">Can Edit</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-17-8bkm" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-dkk3-container" aria-controls="select2-dkk3-container"><span class="select2-selection__rendered" id="select2-dkk3-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <!--end::Access menu-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1"></div>
                                            <!--end::Separator-->
                                            <!--begin::User-->
                                            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="4" bis_skin_checked="1">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='4']" value="4">
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                        <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-15.jpg">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5" bis_skin_checked="1">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Brian Cox</a>
                                                        <div class="fw-bold text-muted" bis_skin_checked="1">brian@exchange.com</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Access menu-->
                                                <div class="ms-2 w-100px" bis_skin_checked="1">
                                                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-19-5etk" tabindex="-1" aria-hidden="true">
                                                        <option value="1">Guest</option>
                                                        <option value="2">Owner</option>
                                                        <option value="3" selected="selected" data-select2-id="select2-data-21-h6j9">Can Edit</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-20-ce7u" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-gz6h-container" aria-controls="select2-gz6h-container"><span class="select2-selection__rendered" id="select2-gz6h-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <!--end::Access menu-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1"></div>
                                            <!--end::Separator-->
                                            <!--begin::User-->
                                            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="5" bis_skin_checked="1">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='5']" value="5">
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                        <span class="symbol-label bg-light-warning text-warning fw-bold">C</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5" bis_skin_checked="1">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Mikaela Collins</a>
                                                        <div class="fw-bold text-muted" bis_skin_checked="1">mikaela@pexcom.com</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Access menu-->
                                                <div class="ms-2 w-100px" bis_skin_checked="1">
                                                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-22-c9cy" tabindex="-1" aria-hidden="true">
                                                        <option value="1">Guest</option>
                                                        <option value="2" selected="selected" data-select2-id="select2-data-24-zdhi">Owner</option>
                                                        <option value="3">Can Edit</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-23-eyxb" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-skuq-container" aria-controls="select2-skuq-container"><span class="select2-selection__rendered" id="select2-skuq-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <!--end::Access menu-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1"></div>
                                            <!--end::Separator-->
                                            <!--begin::User-->
                                            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="6" bis_skin_checked="1">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='6']" value="6">
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                        <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-8.jpg">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5" bis_skin_checked="1">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Francis Mitcham</a>
                                                        <div class="fw-bold text-muted" bis_skin_checked="1">f.mitcham@kpmg.com.au</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Access menu-->
                                                <div class="ms-2 w-100px" bis_skin_checked="1">
                                                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-25-iavj" tabindex="-1" aria-hidden="true">
                                                        <option value="1">Guest</option>
                                                        <option value="2">Owner</option>
                                                        <option value="3" selected="selected" data-select2-id="select2-data-27-9zpz">Can Edit</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-26-8z6c" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-fre0-container" aria-controls="select2-fre0-container"><span class="select2-selection__rendered" id="select2-fre0-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <!--end::Access menu-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1"></div>
                                            <!--end::Separator-->
                                            <!--begin::User-->
                                            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="7" bis_skin_checked="1">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='7']" value="7">
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                        <span class="symbol-label bg-light-danger text-danger fw-bold">O</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5" bis_skin_checked="1">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Olivia Wild</a>
                                                        <div class="fw-bold text-muted" bis_skin_checked="1">olivia@corpmail.com</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Access menu-->
                                                <div class="ms-2 w-100px" bis_skin_checked="1">
                                                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-28-k8li" tabindex="-1" aria-hidden="true">
                                                        <option value="1">Guest</option>
                                                        <option value="2" selected="selected" data-select2-id="select2-data-30-jzwj">Owner</option>
                                                        <option value="3">Can Edit</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-29-jcro" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-fojs-container" aria-controls="select2-fojs-container"><span class="select2-selection__rendered" id="select2-fojs-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <!--end::Access menu-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1"></div>
                                            <!--end::Separator-->
                                            <!--begin::User-->
                                            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="8" bis_skin_checked="1">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='8']" value="8">
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                        <span class="symbol-label bg-light-primary text-primary fw-bold">N</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5" bis_skin_checked="1">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Neil Owen</a>
                                                        <div class="fw-bold text-muted" bis_skin_checked="1">owen.neil@gmail.com</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Access menu-->
                                                <div class="ms-2 w-100px" bis_skin_checked="1">
                                                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-31-bp82" tabindex="-1" aria-hidden="true">
                                                        <option value="1" selected="selected" data-select2-id="select2-data-33-xqdk">Guest</option>
                                                        <option value="2">Owner</option>
                                                        <option value="3">Can Edit</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-32-qh7n" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-idc1-container" aria-controls="select2-idc1-container"><span class="select2-selection__rendered" id="select2-idc1-container" role="textbox" aria-readonly="true" title="Guest">Guest</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <!--end::Access menu-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1"></div>
                                            <!--end::Separator-->
                                            <!--begin::User-->
                                            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="9" bis_skin_checked="1">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='9']" value="9">
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                        <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-6.jpg">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5" bis_skin_checked="1">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Dan Wilson</a>
                                                        <div class="fw-bold text-muted" bis_skin_checked="1">dam@consilting.com</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Access menu-->
                                                <div class="ms-2 w-100px" bis_skin_checked="1">
                                                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-34-zj43" tabindex="-1" aria-hidden="true">
                                                        <option value="1">Guest</option>
                                                        <option value="2">Owner</option>
                                                        <option value="3" selected="selected" data-select2-id="select2-data-36-tglg">Can Edit</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-35-i5jj" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-3es4-container" aria-controls="select2-3es4-container"><span class="select2-selection__rendered" id="select2-3es4-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <!--end::Access menu-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1"></div>
                                            <!--end::Separator-->
                                            <!--begin::User-->
                                            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="10" bis_skin_checked="1">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='10']" value="10">
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                        <span class="symbol-label bg-light-danger text-danger fw-bold">E</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5" bis_skin_checked="1">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma Bold</a>
                                                        <div class="fw-bold text-muted" bis_skin_checked="1">emma@intenso.com</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Access menu-->
                                                <div class="ms-2 w-100px" bis_skin_checked="1">
                                                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-37-cn4w" tabindex="-1" aria-hidden="true">
                                                        <option value="1">Guest</option>
                                                        <option value="2" selected="selected" data-select2-id="select2-data-39-15b6">Owner</option>
                                                        <option value="3">Can Edit</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-38-rdd0" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-b501-container" aria-controls="select2-b501-container"><span class="select2-selection__rendered" id="select2-b501-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <!--end::Access menu-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1"></div>
                                            <!--end::Separator-->
                                            <!--begin::User-->
                                            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="11" bis_skin_checked="1">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='11']" value="11">
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                        <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-7.jpg">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5" bis_skin_checked="1">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ana Crown</a>
                                                        <div class="fw-bold text-muted" bis_skin_checked="1">ana.cf@limtel.com</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Access menu-->
                                                <div class="ms-2 w-100px" bis_skin_checked="1">
                                                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-40-68xj" tabindex="-1" aria-hidden="true">
                                                        <option value="1" selected="selected" data-select2-id="select2-data-42-g1cq">Guest</option>
                                                        <option value="2">Owner</option>
                                                        <option value="3">Can Edit</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-41-7ig0" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-x6ov-container" aria-controls="select2-x6ov-container"><span class="select2-selection__rendered" id="select2-x6ov-container" role="textbox" aria-readonly="true" title="Guest">Guest</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <!--end::Access menu-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1"></div>
                                            <!--end::Separator-->
                                            <!--begin::User-->
                                            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="12" bis_skin_checked="1">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='12']" value="12">
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                        <span class="symbol-label bg-light-info text-info fw-bold">A</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5" bis_skin_checked="1">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Robert Doe</a>
                                                        <div class="fw-bold text-muted" bis_skin_checked="1">robert@benko.com</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Access menu-->
                                                <div class="ms-2 w-100px" bis_skin_checked="1">
                                                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-43-kjbh" tabindex="-1" aria-hidden="true">
                                                        <option value="1">Guest</option>
                                                        <option value="2">Owner</option>
                                                        <option value="3" selected="selected" data-select2-id="select2-data-45-2nd5">Can Edit</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-44-w2ju" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-hgrf-container" aria-controls="select2-hgrf-container"><span class="select2-selection__rendered" id="select2-hgrf-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <!--end::Access menu-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1"></div>
                                            <!--end::Separator-->
                                            <!--begin::User-->
                                            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="13" bis_skin_checked="1">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='13']" value="13">
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                        <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-17.jpg">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5" bis_skin_checked="1">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">John Miller</a>
                                                        <div class="fw-bold text-muted" bis_skin_checked="1">miller@mapple.com</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Access menu-->
                                                <div class="ms-2 w-100px" bis_skin_checked="1">
                                                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-46-zilz" tabindex="-1" aria-hidden="true">
                                                        <option value="1">Guest</option>
                                                        <option value="2">Owner</option>
                                                        <option value="3" selected="selected" data-select2-id="select2-data-48-egt6">Can Edit</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-47-88kh" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-fr97-container" aria-controls="select2-fr97-container"><span class="select2-selection__rendered" id="select2-fr97-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <!--end::Access menu-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1"></div>
                                            <!--end::Separator-->
                                            <!--begin::User-->
                                            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="14" bis_skin_checked="1">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='14']" value="14">
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                        <span class="symbol-label bg-light-success text-success fw-bold">L</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5" bis_skin_checked="1">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Lucy Kunic</a>
                                                        <div class="fw-bold text-muted" bis_skin_checked="1">lucy.m@fentech.com</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Access menu-->
                                                <div class="ms-2 w-100px" bis_skin_checked="1">
                                                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-49-f3qy" tabindex="-1" aria-hidden="true">
                                                        <option value="1">Guest</option>
                                                        <option value="2" selected="selected" data-select2-id="select2-data-51-0quv">Owner</option>
                                                        <option value="3">Can Edit</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-50-kmyg" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-k7l1-container" aria-controls="select2-k7l1-container"><span class="select2-selection__rendered" id="select2-k7l1-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <!--end::Access menu-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1"></div>
                                            <!--end::Separator-->
                                            <!--begin::User-->
                                            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="15" bis_skin_checked="1">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='15']" value="15">
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                        <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-10.jpg">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5" bis_skin_checked="1">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ethan Wilder</a>
                                                        <div class="fw-bold text-muted" bis_skin_checked="1">ethan@loop.com.au</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Access menu-->
                                                <div class="ms-2 w-100px" bis_skin_checked="1">
                                                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-52-glrz" tabindex="-1" aria-hidden="true">
                                                        <option value="1" selected="selected" data-select2-id="select2-data-54-dade">Guest</option>
                                                        <option value="2">Owner</option>
                                                        <option value="3">Can Edit</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-53-l4em" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-6csl-container" aria-controls="select2-6csl-container"><span class="select2-selection__rendered" id="select2-6csl-container" role="textbox" aria-readonly="true" title="Guest">Guest</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <!--end::Access menu-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="border-bottom border-gray-300 border-bottom-dashed" bis_skin_checked="1"></div>
                                            <!--end::Separator-->
                                            <!--begin::User-->
                                            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="16" bis_skin_checked="1">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='16']" value="16">
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle" bis_skin_checked="1">
                                                        <img alt="Pic" src="/metronic8/demo16/assets/media/avatars/150-6.jpg">
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5" bis_skin_checked="1">
                                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Dan Wilson</a>
                                                        <div class="fw-bold text-muted" bis_skin_checked="1">dam@consilting.com</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Access menu-->
                                                <div class="ms-2 w-100px" bis_skin_checked="1">
                                                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-55-vz2a" tabindex="-1" aria-hidden="true">
                                                        <option value="1">Guest</option>
                                                        <option value="2">Owner</option>
                                                        <option value="3" selected="selected" data-select2-id="select2-data-57-7x7e">Can Edit</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-56-sxzb" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-sfmx-container" aria-controls="select2-sfmx-container"><span class="select2-selection__rendered" id="select2-sfmx-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <!--end::Access menu-->
                                            </div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Users-->
                                        <!--begin::Actions-->
                                        <div class="d-flex flex-center mt-15" bis_skin_checked="1">
                                            <button type="reset" id="kt_modal_users_search_reset" data-bs-dismiss="modal" class="btn btn-active-light me-3">Cancel</button>
                                            <button type="submit" id="kt_modal_users_search_submit" class="btn btn-primary">Add Selected Users</button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Results-->
                                    <!--begin::Empty-->
                                    <div data-kt-search-element="empty" class="text-center d-none" bis_skin_checked="1">
                                        <!--begin::Message-->
                                        <div class="fw-bold py-10" bis_skin_checked="1">
                                            <div class="text-gray-600 fs-3 mb-2" bis_skin_checked="1">No users found</div>
                                            <div class="text-muted fs-6" bis_skin_checked="1">Try to search by username, full name or email...</div>
                                        </div>
                                        <!--end::Message-->
                                        <!--begin::Illustration-->
                                        <div class="text-center px-5" bis_skin_checked="1">
                                            <img src="/metronic8/demo16/assets/media/illustrations/sketchy-1/1.png" alt="" class="w-100 h-200px h-sm-325px">
                                        </div>
                                        <!--end::Illustration-->
                                    </div>
                                    <!--end::Empty-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>
            <!--end::Modal - Users Search-->
            <!--begin::Modal - New Target-->
            <div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true" bis_skin_checked="1">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px" bis_skin_checked="1">
                    <!--begin::Modal content-->
                    <div class="modal-content rounded" bis_skin_checked="1">
                        <!--begin::Modal header-->
                        <div class="modal-header pb-0 border-0 justify-content-end" bis_skin_checked="1">
                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" bis_skin_checked="1">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
														<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
													</svg>
												</span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--begin::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15" bis_skin_checked="1">
                            <!--begin:Form-->
                            <form id="kt_modal_new_target_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                <!--begin::Heading-->
                                <div class="mb-13 text-center" bis_skin_checked="1">
                                    <!--begin::Title-->
                                    <h1 class="mb-3">Set First Target</h1>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="text-muted fw-bold fs-5" bis_skin_checked="1">If you need more info, please check
                                        <a href="#" class="fw-bolder link-primary">Project Guidelines</a>.</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Target Title</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Specify a target name for future usage and reference" aria-label="Specify a target name for future usage and reference"></i>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Target Title" name="target_title">
                                    <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div></div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row g-9 mb-8" bis_skin_checked="1">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                                        <label class="required fs-6 fw-bold mb-2">Assign</label>
                                        <select class="form-select form-select-solid select2-hidden-accessible" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="target_assign" data-select2-id="select2-data-58-q8pw" tabindex="-1" aria-hidden="true">
                                            <option value="" data-select2-id="select2-data-60-1c15">Select user...</option>
                                            <option value="1">Karina Clark</option>
                                            <option value="2">Robert Doe</option>
                                            <option value="3">Niel Owen</option>
                                            <option value="4">Olivia Wild</option>
                                            <option value="5">Sean Bean</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-59-9eki" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-target_assign-ct-container" aria-controls="select2-target_assign-ct-container"><span class="select2-selection__rendered" id="select2-target_assign-ct-container" role="textbox" aria-readonly="true" title="Select a Team Member"><span class="select2-selection__placeholder">Select a Team Member</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div></div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row" bis_skin_checked="1">
                                        <label class="required fs-6 fw-bold mb-2">Due Date</label>
                                        <!--begin::Input-->
                                        <div class="position-relative d-flex align-items-center" bis_skin_checked="1">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                            <span class="svg-icon svg-icon-2 position-absolute mx-4">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black"></path>
																	<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black"></path>
																	<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black"></path>
																</svg>
															</span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Datepicker-->
                                            <input class="form-control form-control-solid ps-12 flatpickr-input" placeholder="Select a date" name="due_date" type="text" readonly="readonly">
                                            <!--end::Datepicker-->
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-8" bis_skin_checked="1">
                                    <label class="fs-6 fw-bold mb-2">Target Details</label>
                                    <textarea class="form-control form-control-solid" rows="3" name="target_details" placeholder="Type Target Details"></textarea>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-8 fv-row" bis_skin_checked="1">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Tags</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Specify a target priorty" aria-label="Specify a target priorty"></i>
                                    </label>
                                    <!--end::Label-->
                                    <tags class="tagify form-control form-control-solid" tabindex="-1">
                                        <tag title="Important" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" value="Important"><x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x><div bis_skin_checked="1"><span class="tagify__tag-text">Important</span></div></tag><tag title="Urgent" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify--noAnim" value="Urgent"><x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x><div bis_skin_checked="1"><span class="tagify__tag-text">Urgent</span></div></tag><span contenteditable="" tabindex="0" data-placeholder="&ZeroWidthSpace;" aria-placeholder="" class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
                                    </tags><input class="form-control form-control-solid" value="Important, Urgent" name="tags">
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-stack mb-8" bis_skin_checked="1">
                                    <!--begin::Label-->
                                    <div class="me-5" bis_skin_checked="1">
                                        <label class="fs-6 fw-bold">Adding Users by Team Members</label>
                                        <div class="fs-7 fw-bold text-muted" bis_skin_checked="1">If you need more info, please check budget planning</div>
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" checked="checked">
                                        <span class="form-check-label fw-bold text-muted">Allowed</span>
                                    </label>
                                    <!--end::Switch-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-15 fv-row" bis_skin_checked="1">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack" bis_skin_checked="1">
                                        <!--begin::Label-->
                                        <div class="fw-bold me-5" bis_skin_checked="1">
                                            <label class="fs-6">Notifications</label>
                                            <div class="fs-7 text-muted" bis_skin_checked="1">Allow Notifications by Phone or Email</div>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Checkboxes-->
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-10">
                                                <input class="form-check-input h-20px w-20px" type="checkbox" name="communication[]" value="email" checked="checked">
                                                <span class="form-check-label fw-bold">Email</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input h-20px w-20px" type="checkbox" name="communication[]" value="phone">
                                                <span class="form-check-label fw-bold">Phone</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Checkboxes-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="text-center" bis_skin_checked="1">
                                    <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
                                    <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                                <div bis_skin_checked="1"></div></form>
                            <!--end:Form-->
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>
            <div class="row g-6 g-xl-9">

                <div class="col-lg-8">
                    <!--begin::Summary-->
                    <div class="card card-flush h-lg-100">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title flex-column">
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">{{ __('Детали проекта') }}</h3>
                                </div>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div id="project_details" class="collapse show" style="">
                            <form id="project_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('account.projectUpdate') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input required type="hidden" name="project_id" class="form-control form-control-lg form-control-solid"  value="{{$projectInfo->project_id}}">
                                <div class="card-body border-top p-9">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Название</span>
                                        <input type="text" class="form-control" name="project_name" placeholder="Название" value="{{$projectInfo->project_name}}"  aria-describedby="basic-addon1"/>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text">Описание</span>
                                        <textarea class="form-control " name="description">{{$projectInfo->description}}</textarea>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Организация</span>
                                        <select class="form-select" name="organization_id">
                                            <option value="0" {{$projectInfo->organization_id == null ? 'selected' : '' }}selected >Не выбрана</option>
                                            @foreach($allUserOrganization as $orgatization)
                                                <option value="{{$orgatization->organization_id}}" {{$projectInfo->organization_id == $orgatization->organization_id ? 'selected' : ''}} >{{$orgatization->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Статус</span>
                                        <select class="form-select" name="project_status">
                                            <option value="0" {{$projectInfo->status == 0 ? 'selected' : ''}} >В разработке</option>
                                            <option value="1" {{$projectInfo->status == 1 ? 'selected' : ''}} >На экспертизе</option>
                                            <option value="2" {{$projectInfo->status == 2 ? 'selected' : ''}} >Готов</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary" id="project_details_submit">Сохранить</button>
                                    </div>
{{--                                    <div class="row mb-8 ">--}}
{{--                                        <!--begin::Col-->--}}
{{--                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">--}}
{{--                                            <label class="fs-6 fw-bold mb-2">Название</label>--}}
{{--                                            <input required type="text" name="project_name" class="form-control form-control-lg form-control-solid" placeholder="Название проекта" value="{{$projectInfo->project_name}}">--}}
{{--                                            <div class="projectNameNotDone" data-field="password" data-validator="callback " style="font-size: 0.925rem;color: #F1416C; display: none">Проект с таким названием уже добавлен</div>--}}
{{--                                            <div class="fv-plugins-message-container invalid-feedback"></div></div>--}}
{{--                                        <!--end::Col-->--}}
{{--                                        <!--begin::Col-->--}}
{{--                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">--}}
{{--                                            <label class="fs-6 fw-bold mb-2">Статус</label>--}}
{{--                                            <select class="form-select form-select-solid" name="project_status">--}}
{{--                                                <option value="0" {{$projectInfo->status == 0 ? 'selected' : ''}} >В разработке</option>--}}
{{--                                                <option value="1" {{$projectInfo->status == 1 ? 'selected' : ''}} >На экспертизе</option>--}}
{{--                                                <option value="2" {{$projectInfo->status == 2 ? 'selected' : ''}} >Готов</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                        <!--end::Col-->--}}
{{--                                    </div>--}}
{{--                                    <div class="row mb-8 ">--}}
{{--                                        <!--begin::Col-->--}}
{{--                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">--}}
{{--                                            <label class="fs-6 fw-bold mb-2">Описание</label>--}}
{{--                                            <textarea class="form-control form-control-lg form-control-solid" name="description">{{$projectInfo->description}}</textarea>--}}
{{--                                            <div class="fv-plugins-message-container invalid-feedback"></div>--}}
{{--                                        </div>--}}
{{--                                        <!--end::Col-->--}}
{{--                                        <!--begin::Col-->--}}
{{--                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">--}}
{{--                                            <label class="fs-6 fw-bold mb-2">Организация</label>--}}
{{--                                            <select class="form-select form-select-solid" name="organization_id">--}}
{{--                                                <option value="0" {{$projectInfo->organization_id == null ? 'selected' : '' }}selected >Не выбрана</option>--}}
{{--                                                @foreach($allUserOrganization as $orgatization)--}}
{{--                                                    <option value="{{$orgatization->organization_id}}" {{$projectInfo->organization_id == $orgatization->organization_id ? 'selected' : ''}} >{{$orgatization->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                            <div class="fv-plugins-message-container invalid-feedback"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </form>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Summary-->
                </div>
                <div class="col-lg-4">
                    <div class="card bgi-no-repeat card-xl-stretch mb-xl-8" style="background-position: right top; background-size: 30% auto; background-image: url(/demo1/media/svg/shapes/abstract-4.svg) !important;">
                        <!--begin::Body-->
                        <div class="card-body">
                            <p class="card-title fw-bolder text-dark text-hover-primary fs-4">Организация</p>
                            @if($projectInfo->organization_id != null)
                                <p>Название: {{$projectInfo->name}}</p>
                                <p>ИНН: {{$projectInfo->inn}}</p>
                                <p>ОГРН: {{$projectInfo->ogrn}}</p>
                                <p>КПП: {{$projectInfo->kpp}}</p>
                                <p>Юридический адрес: {{$projectInfo->legal_address}}</p>
                                <p>Фактический адрес: {{$projectInfo->actual_address}}</p>
                            @else
                                <p>Организация не выбрана</p>
                            @endif
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--begin::Summary-->
{{--                    <div class="card card-flush h-lg-100">--}}
{{--                        <!--begin::Card header-->--}}
{{--                        <div class="card-header mt-2">--}}
{{--                            <!--begin::Card title-->--}}
{{--                            <div class="card-title flex-column">--}}
{{--                                <div class="card-title m-0">--}}
{{--                                    <h3 class="fw-bolder m-0">{{ __('Органицазия') }}</h3>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card card-xl-stretch mb-xl-8">--}}
{{--                            <!--begin::Body-->--}}
{{--                            <div class="card-body  align-items-center pt-3 pb-0">--}}
{{--                                <div class=" flex-column flex-grow-1 py-2 py-lg-13 me-2">--}}
{{--                                    <p>Название: {{$projectInfo->name}}</p>--}}
{{--                                    <p>ИНН: {{$projectInfo->inn}}</p>--}}
{{--                                    <p>ОГРН: {{$projectInfo->ogrn}}</p>--}}
{{--                                    <p>КПП: {{$projectInfo->kpp}}</p>--}}
{{--                                    <p>Юридический адрес: {{$projectInfo->legal_address}}</p>--}}
{{--                                    <p>Фактический адрес: {{$projectInfo->actual_address}}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end::Body-->--}}
{{--                        </div>--}}
{{--                        <!--end::Card header-->--}}
{{--                        <!--begin::Card body-->--}}
{{--                        <div class="card-body border-top p-9">--}}
{{--                            <div class="row mb-6">--}}
{{--                                <label class="col-lg-4 col-form-label fw-bold fs-6">Название</label>--}}
{{--                                <div class="col-lg-8 fv-row">--}}
{{--                                    <input required type="text" name="organization_name" class="form-control form-control-lg form-control-solid" disabled value="{{$projectInfo->organization_id != null ? $projectInfo->name: 'Не добавлено'}}">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row mb-6">--}}
{{--                                <label class="col-lg-4 col-form-label fw-bold fs-6">ИНН</label>--}}
{{--                                <div class="col-lg-8 fv-row">--}}
{{--                                    <input required type="text" name="inn" class="form-control form-control-lg form-control-solid" disabled value="{{$projectInfo->organization_id != null ? $projectInfo->inn: 'Не добавлено'}}"></div>--}}
{{--                            </div>--}}
{{--                            <div class="row mb-6">--}}
{{--                                <label class="col-lg-4 col-form-label fw-bold fs-6">ОГРН</label>--}}
{{--                                <div class="col-lg-8 fv-row">--}}
{{--                                    <input required type="text" name="ogrn" class="form-control form-control-lg form-control-solid" disabled value="{{$projectInfo->organization_id != null ? $projectInfo->ogrn: 'Не добавлено'}}"></div>--}}
{{--                            </div>--}}
{{--                            <div class="row mb-6">--}}
{{--                                <label class="col-lg-4 col-form-label fw-bold fs-6">КПП</label>--}}
{{--                                <div class="col-lg-8 fv-row">--}}
{{--                                    <input required type="text" name="kpp" class="form-control form-control-lg form-control-solid" disabled value="{{$projectInfo->organization_id != null ? $projectInfo->kpp: 'Не добавлено'}}"></div>--}}
{{--                            </div>--}}
{{--                            <div class="row mb-6">--}}
{{--                                <label class="col-lg-4 col-form-label fw-bold fs-6">Юридический адрес</label>--}}
{{--                                <div class="col-lg-8 fv-row">--}}
{{--                                    <input required type="text" name="legal_address" class="form-control form-control-lg form-control-solid" disabled value="{{$projectInfo->organization_id != null ? $projectInfo->legal_address: 'Не добавлено'}}"></div>--}}
{{--                            </div>--}}
{{--                            <div class="row mb-6">--}}
{{--                                <label class="col-lg-4 col-form-label fw-bold fs-6">Фактический адрес</label>--}}
{{--                                <div class="col-lg-8 fv-row">--}}
{{--                                    <input required type="text" name="actual_address" class="form-control form-control-lg form-control-solid" disabled value="{{$projectInfo->organization_id != null ? $projectInfo->actual_address: 'Не добавлено'}}"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--end::Card body-->--}}
{{--                    </div>--}}
                    <!--end::Summary-->
                </div>
            </div>
            <div class="card card-flush mt-6 mt-xl-9" bis_skin_checked="1">
                <!--begin::Card header-->
                <div class="card-header mt-5" bis_skin_checked="1">
                    <!--begin::Card title-->
                    <div class="card-title flex-column" bis_skin_checked="1">
                        <h3 class="fw-bolder mb-1">Объекты ОНВ</h3>
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar my-1" bis_skin_checked="1">
                        <!--begin::Select-->
                        <!--end::Select-->
                        <!--begin::Select-->
                        <!--end::Select-->
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1" bis_skin_checked="1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <a href="/account/createObject/{{$projectInfo->project_id}}"  class="btn btn-primary btn-sm" >Добавить объект</a>
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0" bis_skin_checked="1">
                    <!--begin::Table container-->
                    <div class="table-responsive" bis_skin_checked="1">
                        <!--begin::Table-->
                        <div id="kt_profile_overview_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" bis_skin_checked="1"><div class="table-responsive" bis_skin_checked="1">
                                <table id="kt_profile_overview_table" class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                                    <!--begin::Head-->
                                    <thead class="fs-7 text-gray-500  text-uppercase">
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" style="width: 20px">Код объекта</th>
                                        <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" style="width: 20px" >Наименование</th>
                                        <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" style="width: 200px" >Кадастровый номер</th>
                                        <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Описание</th>
                                        <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Регион</th>
                                        <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Город</th>
                                        <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Цеха</th>
                                        <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Инструменты</th>
                                    </tr>
                                    </thead>
                                    <!--end::Head-->
                                    <!--begin::Body-->
                                    <tbody class="text-gray-500 fw-bold">
                                    @foreach ($allUserObject as $object)
                                        <tr class="even">
                                        <td>{{$object->object_number}}</td>
                                        <td class="align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-50px overflow-hidden me-3">
                                                <a href="/account/project/{{$projectInfo->project_id}}/object/{{$object->object_id}}" class="text-gray-800 text-hover-primary mb-1">
                                                    {{$object->object_name}}
                                                </a>
                                            </div>
                                        </td>
                                        <td>{{$object->cadastral_number}}</td>
                                        <td>{{$object->description}}</td>
                                        <td>{{$object->region}}</td>
                                        <td>{{$object->city}}</td>
                                        <td>{{$object->workshop_count}}</td>
                                        <td>
                                            <a href="/account/editObject/{{$object->object_id}}"  class="btn btn-sm btn-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                </svg>
                                            </a>
                                            <button  class="btn btn-sm btn-danger deleteObject" data-bs-toggle="modal" objectId = "{{$object->object_id}}"data-bs-target="#kt_modal_1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <!--end::Body-->
                                </table>
                            </div>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--end::Card body-->
            </div>
            <div class="card card-flush mt-6 mt-xl-9" bis_skin_checked="1">
                 <div class="card-header mt-5" bis_skin_checked="1">
                    <!--begin::Card title-->
                    <div class="card-title flex-column" bis_skin_checked="1">
                        <h3 class="fw-bolder mb-1">Цеха</h3>
                    </div>
                </div>
            </div>

            <!--end::Card-->
        </div>
        <!--end::Post-->
    </div>
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Подтвердите удаление</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <p>Вы уверены, что хотите удалить объект?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light notDeletedObject" data-bs-dismiss="modal">Нет</button>
                    <button type="button" class="btn btn-primary deletedObject">Да</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="kt_modal_edit_object" tabindex="-1" aria-hidden="true" bis_skin_checked="1">
        <div class="modal-dialog modal-dialog-centered mw-650px" bis_skin_checked="1">
            <div class="modal-content" bis_skin_checked="1">
                <div class="modal-header" id="kt_modal_edit_object_header" bis_skin_checked="1">
                    <h2 class="fw-bolder">Редактировать объект</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary btnCloseModal" data-kt-organization-modal-action="close" bis_skin_checked="1">
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                                        </svg>
                                    </span>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7" bis_skin_checked="1">
                    <form id="kt_modal_edit_object_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('account.updateObject') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_edit_object_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_object_header" data-kt-scroll-wrappers="#kt_modal_edit_object_scroll" data-kt-scroll-offset="300px" bis_skin_checked="1" style="max-height: 520px;">
                            <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                <label class="fw-bold fs-6 mb-2">Номер объекта</label>
                                <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                    <input type="text" required="" class="form-control form-control-solid" placeholder="Введите номер объекта" name="object_number" value="">
                                </div>
                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                            </div>
                            <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                <label class="fw-bold fs-6 mb-2">Наименование объекта</label>
                                <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                    <input class="form-control rounded-end form-control-solid" placeholder="Введите наименование объекта" name="object_name" value="">
                                </div>
                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                            </div>
                            <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                <label class="fw-bold fs-6 mb-2">Кадастровый номер</label>
                                <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                    <input class="form-control form-control-solid" placeholder="Введите кадастровый номер" name="cadastral_number">                                </div>
                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                            </div>
                            <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                <label class="fw-bold fs-6 mb-2">Описание объекта</label>
                                <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                    <textarea class="form-control form-control-solid" placeholder="Описание объекта" name="object_description"></textarea>                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                            </div>
                            <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                <label class="fw-bold fs-6 mb-2">Регион</label>
                                <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                    <select name="regin_id" id="regin_id" required data-placeholder="Выберите регион" class="form-select form-select-solid form-select-lg fw-bold" style="display: none">
                                        <option value="">Выберите регион</option>
                                        <?php if (isset($regions)){ ?>
                                        @foreach($regions as $key => $value)
                                            <option value="{{ $key }}">{{ $regions[$key]->name }}</option>
                                        @endforeach
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                            </div>
                            <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                <label class="fw-bold fs-6 mb-2">Город</label>
                                <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                    <select name="city_id" id="city_id"  required data-placeholder="Выберите населенный пункт" class="form-select form-select-solid form-select-lg fw-bold" style="display: none">
                                        <option selected value="">Выберите населенный пункт</option>
                                        <option  value="-1">Нет моего города</option>
                                    </select>
                                </div>
                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                            </div>
                            <div class="flex-column mb-5 cityBlock" bis_skin_checked="1" style="display: none">
                                <label class="fw-bold fs-6 mb-2">Введите свой населенный пункт</label>
                                <input class="form-control required form-control-solid" placeholder="Введите свой населенный пункт" name="city_name">                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                            </div>
                        </div>
                        <input type="hidden" name="object_id" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="">
                        <input type="hidden" name="project_id" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$projectInfo->project_id}}">
                        <div class="text-center" bis_skin_checked="1">
                            <button type="submit" class="btn btn-primary" data-kt-organization-modal-action="submit">
                                <span class="indicator-label">Редактировать</span>
                            </button>
                        </div>
                        <div bis_skin_checked="1"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--@section('script')--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        var cities = <?=$cities?>;
        var oldProjectName = "<?=$projectInfo->project_name?>";

        $(document).ready(function () {
            $('#city_id').on('change', function (e) {
                var cityId = $(this).select2('val');
                if(cityId == -1){
                    $('.cityBlock').show();
                    if($('input[name="city_name"]').val().trim() == ""){
                        $('#kt_contact_submit_button').prop('disabled', true);
                    }else{
                        $('#kt_contact_submit_button').removeAttr("disabled");
                    }
                    return;
                }else{
                    $('.cityBlock').hide();
                }
            });
            $('input[name="city_name"]').on('keydown', function(e){
                if($('input[name="city_name"]').val().trim() == ""){
                    $('#kt_contact_submit_button').prop('disabled', true);
                }else{
                    $('#kt_contact_submit_button').removeAttr("disabled");
                }
            });
            $('#regin_id').on('change', function (e) {
                var regionId = $(this).select2('val');
                if(cities.length > 0){
                    $('#city_id').empty();
                    for(var i = 0; i < cities.length; i++){
                        if(cities[i].region_id == regionId){
                            console.log('cities[i].region_id',cities[i].region_id);
                            var newOption = new Option(cities[i].name, cities[i].city_id,false,false);
                            $('#city_id').append(newOption).trigger('change');
                        }
                    }
                    var newOption = new Option('Нет моего города', '-1',false,false);
                    $('#city_id').append(newOption).trigger('change');
                }

            });
            $('.projectFilter').show();
        });
        var deleteObjectId = 0;
        $(document).on('click','.deleteObject',function (){
            deleteObjectId = Number($(this).attr('objectId'));
        });
        $(document).on('click','.notDeletedObject',function (){
            deleteObjectId = 0;
        });
        $(document).on('click','.deletedObject',function (){
            if(deleteObjectId != 0){
                $.ajax({
                    url: "/account/deletedObject",
                    async: false,
                    type: 'GET',
                    data: {
                        deleteObjectId:deleteObjectId,
                    },
                    success: function(data) {
                        location.reload();
                    },
                    error: function(err) {}
                });
            }
        });
        $('.btnCloseModal').on('click', function (){
            $('#kt_modal_add_organization').css('display', 'none');
            $('#kt_modal_add_organization').removeClass('show');
            $('#kt_modal_add_organization').removeAttr('role');
            $('.modal-backdrop').remove();
            $('body').removeClass('modal-open');
        });
        $('.editObject').on('click', function (){
            $("[name='object_number']").val($(this).attr('object_number'));
            $("[name='object_name']").val($(this).attr('object_name'));
            $("[name='cadastral_number']").val($(this).attr('cadastral_number'));
            $("[name='object_description']").val($(this).attr('object_description'));
            $("[name='object_id']").val($(this).attr('object_id'));
            $("#regin_id").select2();
            $("#city_id").select2();
            $('#regin_id').val($(this).attr('region_id'));
            $('#regin_id').trigger('change');
            $('#city_id').val($(this).attr('city_id'));
            $('#city_id').trigger('change');
        });
        $('input[name="project_name"]').on('keydown', function(e){
            $('.projectNameNotDone').hide();
            $('#project_details_submit').removeAttr("disabled");

            var _this = this;
            setTimeout(function (){
                var projectName = $(_this).val().trim();
                if(projectName != oldProjectName) {
                    $.ajax({
                        url: "/api/issetProjectName",
                        async: false,
                        type: 'GET',
                        data: {
                            project_name: projectName,
                        },
                        success: function (data) {
                            var k = JSON.parse(data);
                            if (k.error) {
                                $('.projectNameNotDone').show();
                                $('#project_details_submit').prop('disabled', true);
                            }

                            // location.reload();
                        },
                        error: function (err) {
                        }
                    });
                }
            },500);
        });


    </script>

</x-base-layout>
