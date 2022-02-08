@extends('layout.admin')

@section('title', 'Список организаций')

@section('content')
    <!--begin::Card-->
    <div id="kt_content_container" class="container-xxl" bis_skin_checked="1">
        <!--begin::Navbar-->
        <div class="card mb-6" bis_skin_checked="1">
            <div class="card-body pt-9 pb-0" bis_skin_checked="1">
                <!--begin::Details-->
                <div class="d-flex flex-wrap flex-sm-nowrap" bis_skin_checked="1">
                    <!--begin: Pic-->
                    <div class="me-7 mb-4" bis_skin_checked="1">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative" bis_skin_checked="1">
                            <img src="{{ $userInfo->avatar == null ? '/demo1/media/avatars/blank.png' : "/storage/".$userInfo->avatar }}" alt="image">
                        </div>
                    </div>
                    <!--end::Pic-->
                    <!--begin::Info-->
                    <div class="flex-grow-1" bis_skin_checked="1">
                        <!--begin::Title-->
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2" bis_skin_checked="1">
                            <!--begin::User-->
                            <div class="d-flex flex-column" bis_skin_checked="1">
                                <!--begin::Name-->
                                <div class="d-flex align-items-center mb-2" bis_skin_checked="1">
                                    <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{$userInfo->email}}</a>
                                </div>
                                <!--end::Name-->
                            </div>
                            <!--end::User-->
                            <!--begin::Actions-->
                            <div class="d-flex my-4" bis_skin_checked="1">
                                <!--begin::Menu-->
                                <div class="me-0" bis_skin_checked="1">
                                    <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary show menu-dropdown" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="bi bi-three-dots fs-3"></i>
                                    </button>
                                    <!--begin::Menu 3-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true" bis_skin_checked="1" style="">
                                        <!--begin::Heading-->
                                        <!--end::Heading-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3" bis_skin_checked="1">
                                            <a href="/admin/deleteUser/{{$userInfo->user_id}}" class="menu-link px-3">Удалить</a>
                                        </div>
                                        @if($userInfo->status)
                                            <div class="menu-item px-3" bis_skin_checked="1">
                                                <a href="/admin/blockUser/{{$userInfo->user_id}}" class="menu-link px-3  toBlock">Заблокировать</a>
                                            </div>
                                        @else
                                            <div class="menu-item px-3" bis_skin_checked="1">
                                                <a href="/admin/activeUser/{{$userInfo->user_id}}" class="menu-link px-3  toActive">Активировать</a>
                                            </div>
                                        @endif
                                        <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end" bis_skin_checked="1">
                                            <a href="#" class="menu-link px-3">
                                                <span class="menu-title">Назначить роль</span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <!--begin::Menu sub-->
                                            <div class="menu-sub menu-sub-dropdown w-175px py-4" bis_skin_checked="1" style="">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" bis_skin_checked="1">
                                                    <a href="#" class="menu-link px-3">Plans</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" bis_skin_checked="1">
                                                    <a href="#" class="menu-link px-3">Billing</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" bis_skin_checked="1">
                                                    <a href="#" class="menu-link px-3">Statements</a>
                                                </div>
                                            </div>
                                            <!--end::Menu sub-->
                                        </div>
                                    </div>
                                    <!--end::Menu 3-->
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Title-->
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap flex-stack" bis_skin_checked="1">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column flex-grow-1 pe-8" bis_skin_checked="1">
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap" bis_skin_checked="1">
                                    <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3" bis_skin_checked="1">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center" bis_skin_checked="1">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-3 svg-icon-success me-2">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black"></rect>
																			<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black"></path>
																		</svg>
																	</span>
                                            <!--end::Svg Icon-->
                                            <div class="fs-2 fw-bolder counted" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$" bis_skin_checked="1">{{$userInfo->balance}} руб.</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-6 text-gray-400" bis_skin_checked="1">Сумма на счету</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                </div>
                                <!--end::Stats-->
                            </div>
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Details-->
                <!--begin::Navs-->
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 navItem" href="/admin/users/{{$userInfo->user_id}}">Проекты</a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 navItem userProfile" href="#">Детали профиля</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 active navItem userOrganzation" href="#">Организации</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 navItem" href="/admin/userBalance/{{$userInfo->user_id}}">Баланс</a>
                    </li>
                </ul>
                <!--begin::Navs-->
            </div>
        </div>
        <!--end::Navbar-->
        <!--begin::Toolbar-->
        <div id="organization"  class="card mb-6 userBlock">
            <div class="card" bis_skin_checked="1">
                <div class="card-header border-0 pt-6" bis_skin_checked="1">
                    <form method="GET" action="/admin/userOrganization/{{$userInfo->user_id}}">
                        <div class="card-title" bis_skin_checked="1">
                            <div class="d-flex align-items-center position-relative my-1" bis_skin_checked="1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                            </svg>
                        </span>
                                <input type="text" name="organizationName" class="form-control form-control-solid w-250px ps-14" placeholder="Название организации" value="<?= (isset($_GET['organizationName']) && $_GET['organizationName']) ? $_GET['organizationName'] : '' ?>">
                                <button type="submit" class="btn btn-primary ms-5">Поиск</button>
                            </div>
                        </div>
                    </form>
                    <div class="card-toolbar" bis_skin_checked="1">
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base" bis_skin_checked="1">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_organization">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
                            </svg>
                        </span>
                                Добавить организацию</button>
                        </div>
                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected" bis_skin_checked="1">
                            <div class="fw-bolder me-5" bis_skin_checked="1">
                                <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                            <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                        </div>
                        <div class="modal fade" id="kt_modal_add_organization" tabindex="-1" aria-hidden="true" bis_skin_checked="1">
                            <div class="modal-dialog modal-dialog-centered mw-650px" bis_skin_checked="1">
                                <div class="modal-content" bis_skin_checked="1">
                                    <div class="modal-header" id="kt_modal_add_organization_header" bis_skin_checked="1">
                                        <h2 class="fw-bolder">Добавить организацию</h2>
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
                                        <form id="kt_modal_add_organization_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('admin.createUserOrganization') }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_organization_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_organization_header" data-kt-scroll-wrappers="#kt_modal_add_organization_scroll" data-kt-scroll-offset="300px" bis_skin_checked="1" style="max-height: 520px;">
                                                <input type="hidden" name="user_id" class="form-control form-control-solid mb-3 mb-lg-0" value="{{$userInfo->user_id}}">
                                                <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                                    <label class="fw-bold fs-6 mb-2">ИНН</label>
                                                    <input type="number" name="inn" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="ИНН" value="">
                                                    <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                                </div>
                                                <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                                    <label class="fw-bold fs-6 mb-2">Название</label>
                                                    <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Название" value="">
                                                    <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                                </div>
                                                <input type="hidden" name="full_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Название" value="">
                                                <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                                    <label class="fw-bold fs-6 mb-2">ОГРН</label>
                                                    <input type="text" name="ogrn" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="ОГРН" value="">
                                                    <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                                </div>
                                                <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                                    <label class="fw-bold fs-6 mb-2">КПП</label>
                                                    <input type="text" name="kpp" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="КПП" value="">
                                                    <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                                </div>
                                                <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                                    <label class="fw-bold fs-6 mb-2">Юридический адрес</label>
                                                    <input type="text" name="legal_address" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Юридический адрес" value="">
                                                    <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                                </div>
                                                <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                                    <label class="fw-bold fs-6 mb-2">Фактический  адрес</label>
                                                    <input type="text" name="actual_address" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Фактический адрес" value="">
                                                    <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 fv-row">
                                                        <label class="form-check form-check-inline form-check-solid me-5">
                                                            <input type="hidden" name="legalAddressFlag" value="0">
                                                            <input class="form-check-input" name="legalAddressFlag" type="checkbox" value="1" {{ old('legalAddressFlag', (isset($userCompany->legal_address) && isset($userCompany->actual_address) && $userCompany->legal_address == $userCompany->actual_address) ?? '') ? 'checked' : '' }}/>
                                                            <span class="fw-bold ps-2 fs-6">
                                                        {{ __('Соответствует юридическому') }}
                                                    </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center pt-15" bis_skin_checked="1">
                                                <button type="reset" class="btn btn-light me-3" data-kt-organization-modal-action="cancel">Сбросить</button>
                                                <button type="submit" class="btn btn-primary" data-kt-organization-modal-action="submit">
                                                    <span class="indicator-label">Добавить</span>
                                                    <span class="indicator-progress">Обрабатвается...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                                </button>
                                            </div>
                                            <div bis_skin_checked="1"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0" bis_skin_checked="1">
                    <div id="kt_table_organizations_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" bis_skin_checked="1"><div class="table-responsive" bis_skin_checked="1">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_organizations">
                                <thead>
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th tabindex="0" aria-controls="kt_table_organizations" rowspan="1" colspan="1">Название</th>
                                    <th tabindex="0" aria-controls="kt_table_organizations" rowspan="1" colspan="1" >ИНН</th>

                                    {{--                            TODO добавить инфо о участии в проектах, на данный момент проектов нет --}}

                                    <th tabindex="0" aria-controls="kt_table_organizations" rowspan="1" colspan="1" >Участвует в проектах</th>
                                    <th rowspan="1" colspan="1" aria-label="Actions" >Инструменты</th>
                                </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-bold">
                                @foreach ($allOrganization as $organization)
                                    <tr class="even">
                                        <td style="max-width: 200px;">{{ $organization->name }}</td>
                                        <td>{{ $organization->inn }}</td>
                                        <td>В разработке</td>
                                        <td>
                                            <button class="btn btn-primary editOrganization"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_add_organization"
                                                    organizationId="{{$organization->organization_id}}"
                                                    inn="{{$organization->inn}}"
                                                    short_name="{{$organization->name}}"
                                                    full_name="{{$organization->full_name}}"
                                                    ogrn="{{$organization->ogrn}}"
                                                    kpp="{{$organization->kpp}}"
                                                    legal_address="{{$organization->legal_address}}"
                                                    actual_address="{{$organization->actual_address}}">Редактировать</button>
                                            <a href="/admin/deleteOrganization/{{$organization->organization_id}}" class="btn btn-danger">Удалить</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row" bis_skin_checked="1">
                            <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start" bis_skin_checked="1"></div>
                            <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end" bis_skin_checked="1">
                                <div class="dataTables_paginate paging_simple_numbers" id="kt_table_organizations_paginate" bis_skin_checked="1">
                                    {{ $allOrganization->appends(['organizationName' => request()->organizationName])->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-5 mb-xl-10 userBlock" bis_skin_checked="1" id="profile" style="display: none">
            <div class="card-header border-0 cursor-pointer collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="false" aria-controls="kt_account_profile_details" bis_skin_checked="1">
                <div class="card-title m-0" bis_skin_checked="1">
                    <h3 class="fw-bolder m-0">Детали профиля</h3>
                </div>
            </div>
            <div id="kt_account_profile_details" class="collapse show" bis_skin_checked="1" style="">
                <input type="hidden" name="_method" value="PUT">
                <div class="card-body border-top p-9" bis_skin_checked="1">
                    <input type="hidden" name="user_id" class="form-control form-control-lg form-control-solid"  value="{{$userInfo->user_id}}">
                    <div class="row mb-6" bis_skin_checked="1">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">Email</label>
                        <div class="col-lg-8 fv-row" bis_skin_checked="1">
                            <input type="text" name="email" class="form-control form-control-lg form-control-solid" placeholder="Email" value="{{$userInfo->email}}">
                        </div>
                    </div>
                    <div class="row mb-6" bis_skin_checked="1">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span class="">Телефон</span>
                        </label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                            <input type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Телефон" value="{{$userInfo->phone}}">
                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                        </div>
                    </div>
                    <div class="row mb-6" bis_skin_checked="1">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span class="">Email подтвержден</span>
                        </label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                            <select class="form-control form-control-lg form-control-solid form-select " name="emailCorret" >
                                @if($userInfo->email_verified_at != null)
                                    <option value="1" selected>Да</option>
                                    <option value="0">Нет</option>
                                @else
                                    <option value="0" selected>Нет</option>
                                    <option value="1">Да</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row mb-6" bis_skin_checked="1">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span class="">Роль</span>
                        </label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                            <select class="form-control form-control-lg form-control-solid form-select " name="userRole">
                                @if($userAdminRole)
                                    <option value="0">Специалист</option>
                                    <option value="1" selected>Администратор</option>
                                @else
                                    <option value="0"  selected>Специалист</option>
                                    <option value="1">Администратор</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row mb-6" bis_skin_checked="1">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span class="">Пароль</span>
                        </label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                            <input type="text" name="password" class="form-control form-control-lg form-control-solid" placeholder="Пароль">
                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                        </div>
                    </div>
                    <div class="row mb-6" bis_skin_checked="1">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span class="">Подтверждения пароля</span>
                        </label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                            <input type="text" name="password2" class="form-control form-control-lg form-control-solid" placeholder="Подтверждения пароля"">
                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                        </div>
                    </div>
                    <div style="padding: 10px 0px 0px 0px;border-top: 1px solid #eff2f5;" bis_skin_checked="1">
                        <div class="row mb-6" bis_skin_checked="1">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="">Скидка на модули и тариф, %</span>
                            </label>
                            <div class="col-lg-8 fv-row fv-plugins-icon-container" bis_skin_checked="1">
                                <input type="number" min="0" max="100" name="discount" class="form-control form-control-lg form-control-solid" placeholder="Скидка на модули и тариф, %" value="{{$userInfo->discount}}">
                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <div class="dataFlase" data-field="email" style="font-size: 0.925rem;color: #F1416C;display: none">Введено недопустимое значение email</div>
                        <div class="dataSuccess" data-field="email" style="font-size: 0.925rem;color: #66ad5f;display: none">Данные сохранены успешно</div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9" bis_skin_checked="1">
                    <button type="submit" class="btn btn-primary" id="saveUserProfile">
                            <span class="indicator-label">
                            Сохранить
                            </span>
                    </button>
                </div>
                <div bis_skin_checked="1"></div>
            </div>
        </div>
        <!--end::Pagination-->
        <!--begin::Modals-->
        <!--begin::Modal - Create Project-->
        <div class="modal fade" id="kt_modal_create_project" tabindex="-1" bis_skin_checked="1" style="display: none;" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px" bis_skin_checked="1">
                <!--begin::Modal content-->
                <div class="modal-content rounded" bis_skin_checked="1">
                    <!--begin::Modal header-->
                    <div class="modal-header" bis_skin_checked="1">
                        <!--begin::Modal title-->
                        <h2>Добавить проект</h2>
                        <!--end::Modal title-->
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
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y m-5" bis_skin_checked="1">
                        <!--begin::Stepper-->
                        <div class="stepper stepper-links d-flex flex-column" id="kt_modal_create_project_stepper" data-kt-stepper="true" bis_skin_checked="1">
                            <!--begin::Container-->
                            <div class="container" bis_skin_checked="1">
                                <form class="mx-auto w-100 mw-800px pt-15 pb-10 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_modal_create_project_form" method="post">
                                    <div class="row mb-6" bis_skin_checked="1">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Название проекта</label>
                                        <div class="col-lg-8 fv-row" bis_skin_checked="1">
                                            <input type="text" required name="project_name" class="form-control form-control-lg form-control-solid" placeholder="Название">
                                        </div>
                                    </div>
                                    <div class="row mb-6" bis_skin_checked="1">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Организация</label>
                                        <div class="col-lg-8 fv-row" bis_skin_checked="1">
                                            <textarea name="project_description" class="form-control form-control-lg form-control-solid">
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-6" bis_skin_checked="1">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Описание проекта</label>
                                        <div class="col-lg-8 fv-row" bis_skin_checked="1">
                                            <select class="form-control form-control-lg form-control-solid form-select " name="organization" >
                                                <option value="0" selected>Не выбрано</option>
                                                @foreach($allOrganization as $organization)
                                                    <option value="{{$organization->organization_id}}">{{$organization->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end" bis_skin_checked="1">
                                        <button type="submit" class="btn btn-primary" id="saveUserProfile">
                                            <span class="indicator-label">Добавить</span>
                                        </button>
                                    </div>
                                    {{--                                    <div class="row mb-6" bis_skin_checked="1">--}}
                                    {{--                                        <div class="card-footer d-flex justify-content-end py-6 px-9" bis_skin_checked="1">--}}
                                    {{--                                            <button type="submit" class="btn btn-primary" id="saveUserProfile">--}}
                                    {{--                                                <span class="indicator-label">Сохранить</span>--}}
                                    {{--                                            </button>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--begin::Container-->
                        </div>
                        <!--end::Stepper-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Create Project-->
        <!--begin::Modal - Offer A Deal-->
        <div class="modal fade" id="kt_modal_offer_a_deal" tabindex="-1" aria-hidden="true" bis_skin_checked="1">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-1000px" bis_skin_checked="1">
                <!--begin::Modal content-->
                <div class="modal-content" bis_skin_checked="1">
                    <!--begin::Modal header-->
                    <div class="modal-header py-7 d-flex justify-content-between" bis_skin_checked="1">
                        <!--begin::Modal title-->
                        <h2>Offer a Deal</h2>
                        <!--end::Modal title-->
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
                    <div class="modal-body scroll-y m-5" bis_skin_checked="1">
                        <!--begin::Stepper-->
                        <div class="stepper stepper-links d-flex flex-column" id="kt_modal_offer_a_deal_stepper" data-kt-stepper="true" bis_skin_checked="1">
                            <!--begin::Nav-->
                            <div class="stepper-nav justify-content-center py-2" bis_skin_checked="1">
                                <!--begin::Step 1-->
                                <div class="stepper-item me-5 me-md-15 current" data-kt-stepper-element="nav" bis_skin_checked="1">
                                    <h3 class="stepper-title">Deal Type</h3>
                                </div>
                                <!--end::Step 1-->
                                <!--begin::Step 2-->
                                <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav" bis_skin_checked="1">
                                    <h3 class="stepper-title">Deal Details</h3>
                                </div>
                                <!--end::Step 2-->
                                <!--begin::Step 3-->
                                <div class="stepper-item me-5 me-md-15" data-kt-stepper-element="nav" bis_skin_checked="1">
                                    <h3 class="stepper-title">Finance Settings</h3>
                                </div>
                                <!--end::Step 3-->
                                <!--begin::Step 4-->
                                <div class="stepper-item" data-kt-stepper-element="nav" bis_skin_checked="1">
                                    <h3 class="stepper-title">Completed</h3>
                                </div>
                                <!--end::Step 4-->
                            </div>
                            <!--end::Nav-->
                            <!--begin::Form-->
                            <form class="mx-auto mw-500px w-100 pt-15 pb-10 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_modal_offer_a_deal_form">
                                <!--begin::Type-->
                                <div class="current" data-kt-stepper-element="content" bis_skin_checked="1">
                                    <!--begin::Wrapper-->
                                    <div class="w-100" bis_skin_checked="1">
                                        <!--begin::Heading-->
                                        <div class="mb-13" bis_skin_checked="1">
                                            <!--begin::Title-->
                                            <h2 class="mb-3">Deal Type</h2>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-bold fs-5" bis_skin_checked="1">If you need more info, please check out
                                                <a href="#" class="link-primary fw-bolder">FAQ Page</a>.</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-15 fv-plugins-icon-container" data-kt-buttons="true" bis_skin_checked="1">
                                            <!--begin::Option-->
                                            <label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6 mb-6 active">
                                                <!--begin::Input-->
                                                <input class="btn-check" type="radio" checked="checked" name="offer_type" value="1">
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="d-flex">
																			<!--begin::Icon-->
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
																			<span class="svg-icon svg-icon-3hx">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																					<path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black"></path>
																					<path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black"></path>
																				</svg>
																			</span>
                                                    <!--end::Svg Icon-->
                                                    <!--end::Icon-->
                                                    <!--begin::Info-->
																			<span class="ms-4">
																				<span class="fs-3 fw-bolder text-gray-900 mb-2 d-block">Personal Deal</span>
																				<span class="fw-bold fs-4 text-muted">If you need more info, please check it out</span>
																			</span>
                                                    <!--end::Info-->
																		</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6">
                                                <!--begin::Input-->
                                                <input class="btn-check" type="radio" name="offer_type" value="2">
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="d-flex">
																			<!--begin::Icon-->
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																			<span class="svg-icon svg-icon-3hx">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																					<rect x="2" y="2" width="9" height="9" rx="2" fill="black"></rect>
																					<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black"></rect>
																					<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"></rect>
																					<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"></rect>
																				</svg>
																			</span>
                                                    <!--end::Svg Icon-->
                                                    <!--end::Icon-->
                                                    <!--begin::Info-->
																			<span class="ms-4">
																				<span class="fs-3 fw-bolder text-gray-900 mb-2 d-block">Corporate Deal</span>
																				<span class="fw-bold fs-4 text-muted">Create corporate account to manage users</span>
																			</span>
                                                    <!--end::Info-->
																		</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Option-->
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div></div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-end" bis_skin_checked="1">
                                            <button type="button" class="btn btn-lg btn-primary" data-kt-element="type-next">
                                                <span class="indicator-label">Offer Details</span>
                                                <span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Type-->
                                <!--begin::Details-->
                                <div data-kt-stepper-element="content" bis_skin_checked="1">
                                    <!--begin::Wrapper-->
                                    <div class="w-100" bis_skin_checked="1">
                                        <!--begin::Heading-->
                                        <div class="mb-13" bis_skin_checked="1">
                                            <!--begin::Title-->
                                            <h2 class="mb-3">Deal Details</h2>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-bold fs-5" bis_skin_checked="1">If you need more info, please check out
                                                <a href="#" class="link-primary fw-bolder">FAQ Page</a>.</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-8 fv-plugins-icon-container" bis_skin_checked="1">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-bold mb-2">Customer</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select class="form-select form-select-solid select2-hidden-accessible" data-control="select2" data-placeholder="Select an option" name="details_customer" data-select2-id="select2-data-85-ss6r" tabindex="-1" aria-hidden="true">
                                                <option></option>
                                                <option value="1" selected="selected" data-select2-id="select2-data-87-okf1">Keenthemes</option>
                                                <option value="2">CRM App</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-86-frp1" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-details_customer-yp-container" aria-controls="select2-details_customer-yp-container"><span class="select2-selection__rendered" id="select2-details_customer-yp-container" role="textbox" aria-readonly="true" title="Keenthemes">Keenthemes</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div></div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-8 fv-plugins-icon-container" bis_skin_checked="1">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-bold mb-2">Deal Title</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder="Enter Deal Title" name="details_title" value="Marketing Campaign">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div></div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-8" bis_skin_checked="1">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold mb-2">Deal Description</label>
                                            <!--end::Label-->
                                            <!--begin::Label-->
                                            <textarea class="form-control form-control-solid" rows="3" placeholder="Enter Deal Description" name="details_description">Experience share market at your fingertips with TICK PRO stock investment mobile trading app</textarea>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-8 fv-plugins-icon-container" bis_skin_checked="1">
                                            <label class="required fs-6 fw-bold mb-2">Activation Date</label>
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
                                                <input class="form-control form-control-solid ps-12 flatpickr-input" placeholder="Pick date range" name="details_activation_date" type="text" readonly="readonly">
                                                <!--end::Datepicker-->
                                            </div>
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div></div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-15 fv-plugins-icon-container" bis_skin_checked="1">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-stack" bis_skin_checked="1">
                                                <!--begin::Label-->
                                                <div class="me-5" bis_skin_checked="1">
                                                    <label class="required fs-6 fw-bold">Notifications</label>
                                                    <div class="fs-7 fw-bold text-muted" bis_skin_checked="1">Allow Notifications by Phone or Email</div>
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Checkboxes-->
                                                <div class="d-flex" bis_skin_checked="1">
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid me-10">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input h-20px w-20px" type="checkbox" value="email" name="details_notifications[]">
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <span class="form-check-label fw-bold">Email</span>
                                                        <!--end::Label-->
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Checkbox-->
                                                    <label class="form-check form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input h-20px w-20px" type="checkbox" value="phone" checked="checked" name="details_notifications[]">
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <span class="form-check-label fw-bold">Phone</span>
                                                        <!--end::Label-->
                                                    </label>
                                                    <!--end::Checkbox-->
                                                </div>
                                                <!--end::Checkboxes-->
                                            </div>
                                            <!--begin::Wrapper-->
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div></div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="d-flex flex-stack" bis_skin_checked="1">
                                            <button type="button" class="btn btn-lg btn-light me-3" data-kt-element="details-previous">Deal Type</button>
                                            <button type="button" class="btn btn-lg btn-primary" data-kt-element="details-next">
                                                <span class="indicator-label">Financing</span>
                                                <span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Budget-->
                                <div data-kt-stepper-element="content" bis_skin_checked="1">
                                    <!--begin::Wrapper-->
                                    <div class="w-100" bis_skin_checked="1">
                                        <!--begin::Heading-->
                                        <div class="mb-13" bis_skin_checked="1">
                                            <!--begin::Title-->
                                            <h2 class="mb-3">Finance</h2>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-bold fs-5" bis_skin_checked="1">If you need more info, please check out
                                                <a href="#" class="link-primary fw-bolder">FAQ Page</a>.</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-8 fv-plugins-icon-container" bis_skin_checked="1">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="required">Setup Budget</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="<div class='p-4 rounded bg-light'> <div class='d-flex flex-stack text-muted mb-4'> <i class='fas fa-university fs-3 me-3'></i> <div class='fw-bold'>INCBANK **** 1245 STATEMENT</div> </div> <div class='d-flex flex-stack fw-bold text-gray-600'> <div>Amount</div> <div>Transaction</div> </div> <div class='separator separator-dashed my-2'></div> <div class='d-flex flex-stack text-dark fw-bolder mb-2'> <div>USD345.00</div> <div>KEENTHEMES*</div> </div> <div class='d-flex flex-stack text-muted mb-2'> <div>USD75.00</div> <div>Hosting fee</div> </div> <div class='d-flex flex-stack text-muted'> <div>USD3,950.00</div> <div>Payrol</div> </div> </div>" data-bs-original-title="" title=""></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Dialer-->
                                            <div class="position-relative w-lg-250px" id="kt_modal_finance_setup" data-kt-dialer="true" data-kt-dialer-min="50" data-kt-dialer-max="50000" data-kt-dialer-step="100" data-kt-dialer-prefix="$" data-kt-dialer-decimals="2" bis_skin_checked="1">
                                                <!--begin::Decrease control-->
                                                <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0" data-kt-dialer-control="decrease">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen042.svg-->
                                                    <span class="svg-icon svg-icon-1">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																					<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
																					<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black"></rect>
																				</svg>
																			</span>
                                                    <!--end::Svg Icon-->
                                                </button>
                                                <!--end::Decrease control-->
                                                <!--begin::Input control-->
                                                <input type="text" class="form-control form-control-solid border-0 ps-12" data-kt-dialer-control="input" placeholder="Amount" name="finance_setup" readonly="readonly" value="$50">
                                                <!--end::Input control-->
                                                <!--begin::Increase control-->
                                                <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0" data-kt-dialer-control="increase">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen041.svg-->
                                                    <span class="svg-icon svg-icon-1">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																					<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
																					<rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black"></rect>
																					<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black"></rect>
																				</svg>
																			</span>
                                                    <!--end::Svg Icon-->
                                                </button>
                                                <!--end::Increase control-->
                                            </div>
                                            <!--end::Dialer-->
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div></div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-8 fv-plugins-icon-container" bis_skin_checked="1">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold mb-2">Budget Usage</label>
                                            <!--end::Label-->
                                            <!--begin::Row-->
                                            <div class="row g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']" bis_skin_checked="1">
                                                <!--begin::Col-->
                                                <div class="col-md-6 col-lg-12 col-xxl-6" bis_skin_checked="1">
                                                    <!--begin::Option-->
                                                    <label class="btn btn-outline btn-outline-dashed btn-outline-default active d-flex text-start p-6" data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																					<input class="form-check-input" type="radio" name="finance_usage" value="1" checked="checked">
																				</span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5">
																					<span class="fs-4 fw-bolder text-gray-800 mb-2 d-block">Precise Usage</span>
																					<span class="fw-bold fs-7 text-gray-600">Withdraw money to your bank account per transaction under $50,000 budget</span>
																				</span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                    <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div></div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-6 col-lg-12 col-xxl-6" bis_skin_checked="1">
                                                    <!--begin::Option-->
                                                    <label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6" data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																					<input class="form-check-input" type="radio" name="finance_usage" value="2">
																				</span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5">
																					<span class="fs-4 fw-bolder text-gray-800 mb-2 d-block">Extreme Usage</span>
																					<span class="fw-bold fs-7 text-gray-600">Withdraw money to your bank account per transaction under $50,000 budget</span>
																				</span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-15 fv-plugins-icon-container" bis_skin_checked="1">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-stack" bis_skin_checked="1">
                                                <!--begin::Label-->
                                                <div class="me-5" bis_skin_checked="1">
                                                    <label class="fs-6 fw-bold">Allow Changes in Budget</label>
                                                    <div class="fs-7 fw-bold text-muted" bis_skin_checked="1">If you need more info, please check budget planning</div>
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Switch-->
                                                <label class="form-check form-switch form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value="1" name="finance_allow" checked="checked">
                                                    <span class="form-check-label fw-bold text-muted">Allowed</span>
                                                </label>
                                                <!--end::Switch-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div></div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="d-flex flex-stack" bis_skin_checked="1">
                                            <button type="button" class="btn btn-lg btn-light me-3" data-kt-element="finance-previous">Project Settings</button>
                                            <button type="button" class="btn btn-lg btn-primary" data-kt-element="finance-next">
                                                <span class="indicator-label">Build Team</span>
                                                <span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Budget-->
                                <!--begin::Complete-->
                                <div data-kt-stepper-element="content" bis_skin_checked="1">
                                    <!--begin::Wrapper-->
                                    <div class="w-100" bis_skin_checked="1">
                                        <!--begin::Heading-->
                                        <div class="mb-13" bis_skin_checked="1">
                                            <!--begin::Title-->
                                            <h2 class="mb-3">Deal Created!</h2>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-bold fs-5" bis_skin_checked="1">If you need more info, please check out
                                                <a href="#" class="link-primary fw-bolder">FAQ Page</a>.</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Actions-->
                                        <div class="d-flex flex-center pb-20" bis_skin_checked="1">
                                            <button type="button" class="btn btn-lg btn-light me-3" data-kt-element="complete-start">Create New Deal</button>
                                            <a href="#" class="btn btn-lg btn-primary" data-bs-toggle="tooltip" title="" data-bs-original-title="Coming Soon">View Deal</a>
                                        </div>
                                        <!--end::Actions-->
                                        <!--begin::Illustration-->
                                        <div class="text-center px-4" bis_skin_checked="1">
                                            <img src="/metronic8/demo1/assets/media/illustrations/sketchy-1/20.png" alt="" class="mw-100 mh-300px">
                                        </div>
                                        <!--end::Illustration-->
                                    </div>
                                </div>
                                <!--end::Complete-->
                                <div bis_skin_checked="1"></div><div bis_skin_checked="1"></div><div bis_skin_checked="1"></div></form>
                            <!--end::Form-->
                        </div>
                        <!--end::Stepper-->
                    </div>
                    <!--begin::Modal body-->
                </div>
            </div>
        </div>
        <!--end::Modal - Offer A Deal-->
        <!--end::Modals-->
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    $(document).on('keydown','input[name="discount"]', function(e){
        if(e.key.length == 1 && e.key.match(/[^0-9\,]/)){
            return false;
        };
    });
    $(document).on('click','#saveUserProfile',function (){
        $('.dataFlase').hide();
        $('.dataSuccess').hide();
        var user_id = $('input[name="user_id"]').val();
        var email = $('input[name="email"]').val().trim();
        if(email.length == 0){
            $('.dataFlase').text('Укажите Email');
            $('.dataFlase').show();
            return;
        }else if(email.indexOf('@') == -1){
            $('.dataFlase').text('Email должен содержать символ @');
            $('.dataFlase').show();
            return;
        }else{
            var emailRes = email.split('@')[0];
            var regexp = /[а-яё]/i;
            if(regexp.test(emailRes)) {
                $('.dataFlase').text('Email должен содержать только только латиницу');
                $('.dataFlase').show();
                return;
            }
        }
        var phone = $('input[name="phone"]').val().trim();
        var discount = $('input[name="discount"]').val().trim();
        if(discount == ''){
            discount = 0;
        }else{
            discount  = Number(discount);
        }
        if(discount > 100){
            $('.dataFlase').text('Процент скидки должен быть менее 100');
            $('.dataFlase').show();
            return;
        }
        if(discount < 0){
            $('.dataFlase').text('Процент скидки должен быть больше 0');
            $('.dataFlase').show();
            return;
        }
        if(phone.length == 0){
            $('.dataFlase').text('Укажите телефон');
            $('.dataFlase').show();
            return;
        }
        var emailCorrect = Number($('select[name="emailCorret"] option:selected').val());
        var userRole = Number($('select[name="userRole"] option:selected').val());
        var password = $('input[name="password"]').val().trim();
        var password2 = $('input[name="password2"]').val().trim();
        if(password2 != password){
            $('.dataFlase').text('Пароли не совпадают');
            $('.dataFlase').show();
            return;
        }
        var postData = {};
        postData['email'] = email;
        postData['discount'] = discount;
        postData['emailCorrect'] = emailCorrect;
        postData['password'] = password;
        postData['user_id'] = user_id;
        postData['phone'] = phone;
        postData['userRole'] = userRole;
        postData['_token'] = '{{ csrf_token() }}';
        $.ajax({
            url: "/admin/updateUserProfile",
            type: 'POST',
            async: false,
            data: postData,
            success: function(data) {
                data = JSON.parse(data);
                if(data['error']){
                    $('.dataSuccess').hide();
                    $('.dataFlase').show();
                    $('.dataFlase').text('Не удалось сохранить данные');

                }else{
                    $('.dataSuccess').show();
                    $('.dataFlase').hide();
                }
            },
            error: function(err) {
                $('.dataSuccess').hide();
                $('.dataFlase').show();
                $('.dataFlase').text('Не удалось сохранить данные');
            }
        });
    });

    $(document).on('click','.navItem',function (){
        $('.userBlock').hide();
        $('.navItem').removeClass('active');
        $(this).addClass('active');
        if($(this).hasClass('userOrganzation')){
            $('#organization').show();
        }else if($(this).hasClass('userProfile')){
            $('#profile').show();
        }
    });
    $(document).ready(function () {
        $('[data-bs-target="#kt_modal_add_organization"]').on('click', function (){
            $("input[name='inn']").val('');
            $("input[name='name']").val('');
            $("input[name='kpp']").val('');
            $("input[name='ogrn']").val('');
            $("input[name='actual_address']").val('');
            $("input[name='legal_address']").val('');
            $("input[name='full_name']").val('');
        });

        $('.editOrganization').on('click', function (){
            if ($(this).attr('inn') != "") {
                $("input[name='inn']").val($(this).attr('inn'));
                $("input[name='name']").val($(this).attr('short_name'));
                $("input[name='kpp']").val($(this).attr('kpp'));
                $("input[name='ogrn']").val($(this).attr('ogrn'));
                $("input[name='actual_address']").val($(this).attr('actual_address'));
                $("input[name='legal_address']").val($(this).attr('legal_address'));
                $("input[name='full_name']").val($(this).attr('full_name'));
            }
        });

        $('.btnCloseModal').on('click', function (){
            $('#kt_modal_add_organization').css('display', 'none');
            $('#kt_modal_add_organization').removeClass('show');
            $('#kt_modal_add_organization').removeAttr('role');
            $('.modal-backdrop').remove();
            $('body').removeClass('modal-open');
        });

        $('input[name="legalAddressFlag"]').change(function () {
            if ($(this).is(":checked")) {
                $("input[name='actual_address']").val($("input[name='legal_address']").val());
            } else {
                $("input[name='actual_address']").val('');
            }
        });
        $("input[name='inn']").keyup(function () {
            $.ajax({
                url: "/api/getInnInfo",
                async: false,
                type: 'GET',
                data: {
                    inn: $(this).val(),
                },
                success: function (data) {
                    if (data != "") {
                        data = JSON.parse(data);
                        if (typeof data['short_name']) {
                            $("input[name='name']").val(data['short_name']);
                        }
                        if (typeof data['kpp']) {
                            $("input[name='kpp']").val(data['kpp']);
                        }
                        if (typeof data['ogrn']) {
                            $("input[name='ogrn']").val(data['ogrn']);
                        }
                        if (typeof data['legal_address']) {
                            if ($('input[name="legalAddressFlag"]').is(":checked")) {
                                $("input[name='actual_address']").val(data['legal_address']);
                            }
                            $("input[name='legal_address']").val(data['legal_address']);
                        }
                        if (typeof data['full_name']) {
                            $("input[name='full_name']").val(data['full_name']);
                        }
                    }
                },
                error: function (err) {
                }
            });
        });
    });
</script>
