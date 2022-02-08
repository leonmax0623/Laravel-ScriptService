@extends('layout.admin')

@section('title', 'Проекты')

@section('content')
    <!--begin::Card-->
    <div class="card" bis_skin_checked="1">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6" bis_skin_checked="1">
            <!--begin::Card title-->
            <div class="card-title" bis_skin_checked="1">
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar" bis_skin_checked="1">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base" bis_skin_checked="1">
                    <!--begin::Filter-->
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"></path>
													</svg>
												</span>
                        <!--end::Svg Icon-->Фильтр</button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" bis_skin_checked="1">
                        <!--begin::Header-->
                        <div class="px-7 py-5" bis_skin_checked="1">
                            <div class="fs-5 text-dark fw-bolder" bis_skin_checked="1">Фильтр поиска</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Separator-->
                        <div class="separator border-gray-200" bis_skin_checked="1"></div>
                        <!--end::Separator-->
                        <!--begin::Content-->
                        <div class="px-7 py-5" data-kt-user-table-filter="form" bis_skin_checked="1">
                            <form method="GET" action="{{route('admin.project')}}">
                                <!--begin::Input group-->
                                <div class="mb-10" bis_skin_checked="1">
                                    <label class="form-label fs-6 fw-bold">Email:</label>
                                    <input type="text" class="form-control  fw-bolder " data-placeholder="Введите Email" name="email" />
                                </div>
                                <div class="d-flex justify-content-end" bis_skin_checked="1">
                                    <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Поиск</button>
                                </div>
                            </form>
                            <!--end::Actions-->
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected" bis_skin_checked="1">
                    <div class="fw-bolder me-5" bis_skin_checked="1">
                        <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                    <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                </div>
                <!--end::Group actions-->
                <!--begin::Modal - Adjust Balance-->
                <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true" bis_skin_checked="1">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px" bis_skin_checked="1">
                        <!--begin::Modal content-->
                        <div class="modal-content" bis_skin_checked="1">
                            <!--begin::Modal header-->
                            <div class="modal-header" bis_skin_checked="1">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">Export Users</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close" bis_skin_checked="1">
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
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7" bis_skin_checked="1">
                                <!--begin::Form-->
                                <form id="kt_modal_export_users_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10" bis_skin_checked="1">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mb-2">Select Roles:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="role" data-control="select2" data-placeholder="Select a role" data-hide-search="true" class="form-select form-select-solid fw-bolder select2-hidden-accessible" data-select2-id="select2-data-16-mui6" tabindex="-1" aria-hidden="true">
                                            <option data-select2-id="select2-data-18-pcom"></option>
                                            <option value="Administrator">Administrator</option>
                                            <option value="Analyst">Analyst</option>
                                            <option value="Developer">Developer</option>
                                            <option value="Support">Support</option>
                                            <option value="Trial">Trial</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-17-dm24" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid fw-bolder" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-role-f0-container" aria-controls="select2-role-f0-container"><span class="select2-selection__rendered" id="select2-role-f0-container" role="textbox" aria-readonly="true" title="Select a role"><span class="select2-selection__placeholder">Select a role</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10 fv-plugins-icon-container" bis_skin_checked="1">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold form-label mb-2">Select Export Format:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bolder select2-hidden-accessible" data-select2-id="select2-data-19-0bzf" tabindex="-1" aria-hidden="true">
                                            <option data-select2-id="select2-data-21-6691"></option>
                                            <option value="excel">Excel</option>
                                            <option value="pdf">PDF</option>
                                            <option value="cvs">CVS</option>
                                            <option value="zip">ZIP</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-20-5qd4" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid fw-bolder" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-format-u9-container" aria-controls="select2-format-u9-container"><span class="select2-selection__rendered" id="select2-format-u9-container" role="textbox" aria-readonly="true" title="Select a format"><span class="select2-selection__placeholder">Select a format</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div></div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="text-center" bis_skin_checked="1">
                                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                    <div bis_skin_checked="1"></div></form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - New Card-->
                <!--begin::Modal - Add task-->
                <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true" bis_skin_checked="1">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px" bis_skin_checked="1">
                        <!--begin::Modal content-->
                        <div class="modal-content" bis_skin_checked="1">
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_user_header" bis_skin_checked="1">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">Add User</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close" bis_skin_checked="1">
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
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7" bis_skin_checked="1">
                                <!--begin::Form-->
                                <form id="kt_modal_add_user_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                    <!--begin::Scroll-->
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px" bis_skin_checked="1" style="max-height: 520px;">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7" bis_skin_checked="1">
                                            <!--begin::Label-->
                                            <label class="d-block fw-bold fs-6 mb-5">Avatar</label>
                                            <!--end::Label-->
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(/metronic8/demo1/assets/media/avatars/blank.png)" bis_skin_checked="1">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url(/metronic8/demo1/assets/media/avatars/150-1.jpg);" bis_skin_checked="1"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                                    <input type="hidden" name="avatar_remove">
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancel avatar">
																				<i class="bi bi-x fs-2"></i>
																			</span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="Remove avatar">
																				<i class="bi bi-x fs-2"></i>
																			</span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Hint-->
                                            <div class="form-text" bis_skin_checked="1">Allowed file types: png, jpg, jpeg.</div>
                                            <!--end::Hint-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">Full Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="Emma Smith">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div></div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-2">Email</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="email" name="user_email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="e.smith@kpmg.com.au">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div></div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-7" bis_skin_checked="1">
                                            <!--begin::Label-->
                                            <label class="required fw-bold fs-6 mb-5">Role</label>
                                            <!--end::Label-->
                                            <!--begin::Roles-->
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row" bis_skin_checked="1">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid" bis_skin_checked="1">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="user_role" type="radio" value="0" id="kt_modal_update_role_option_0" checked="checked">
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                        <div class="fw-bolder text-gray-800" bis_skin_checked="1">Administrator</div>
                                                        <div class="text-gray-600" bis_skin_checked="1">Best for business owners and company administrators</div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                            <div class="separator separator-dashed my-5" bis_skin_checked="1"></div>
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row" bis_skin_checked="1">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid" bis_skin_checked="1">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="user_role" type="radio" value="1" id="kt_modal_update_role_option_1">
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                                        <div class="fw-bolder text-gray-800" bis_skin_checked="1">Developer</div>
                                                        <div class="text-gray-600" bis_skin_checked="1">Best for developers or people primarily using the API</div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                            <div class="separator separator-dashed my-5" bis_skin_checked="1"></div>
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row" bis_skin_checked="1">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid" bis_skin_checked="1">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="user_role" type="radio" value="2" id="kt_modal_update_role_option_2">
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label" for="kt_modal_update_role_option_2">
                                                        <div class="fw-bolder text-gray-800" bis_skin_checked="1">Analyst</div>
                                                        <div class="text-gray-600" bis_skin_checked="1">Best for people who need full access to analytics data, but don't need to update business settings</div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                            <div class="separator separator-dashed my-5" bis_skin_checked="1"></div>
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row" bis_skin_checked="1">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid" bis_skin_checked="1">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="user_role" type="radio" value="3" id="kt_modal_update_role_option_3">
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label" for="kt_modal_update_role_option_3">
                                                        <div class="fw-bolder text-gray-800" bis_skin_checked="1">Support</div>
                                                        <div class="text-gray-600" bis_skin_checked="1">Best for employees who regularly refund payments and respond to disputes</div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                            <div class="separator separator-dashed my-5" bis_skin_checked="1"></div>
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row" bis_skin_checked="1">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid" bis_skin_checked="1">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="user_role" type="radio" value="4" id="kt_modal_update_role_option_4">
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label" for="kt_modal_update_role_option_4">
                                                        <div class="fw-bolder text-gray-800" bis_skin_checked="1">Trial</div>
                                                        <div class="text-gray-600" bis_skin_checked="1">Best for people who need to preview content data, but don't need to make any updates</div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                            <!--end::Roles-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Scroll-->
                                    <!--begin::Actions-->
                                    <div class="text-center pt-15" bis_skin_checked="1">
                                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                    <div bis_skin_checked="1"></div></form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - Add task-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0" bis_skin_checked="1">
            <!--begin::Table-->
            <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" bis_skin_checked="1"><div class="table-responsive" bis_skin_checked="1">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Специалист</th>
                            <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Название проекта</th>
                            <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1"  >Организация</th>
                            <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Статус</th>
                            <th rowspan="1" colspan="1" aria-label="Actions" >Инструменты</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-bold">
                        @foreach ($allProject as $project)
                            <tr class="even">
                                <!--begin::Checkbox-->
                                <!--end::Checkbox-->
                                <!--begin::User=-->
                                <td>
                                    <!--begin:: Avatar -->
                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3" bis_skin_checked="1">
                                        <a href="/metronic8/demo1/../demo1/apps/user-management/users/view.html">
                                        </a>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex flex-column" bis_skin_checked="1">
                                        <a href="/admin/users/{{$project->user_id}}" class="text-gray-800 text-hover-primary mb-1">{{ $project->email }}</a>
                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <td >{{ $project->project_name }}</td>
                                <td >{{ $project->organizationName != null ? $project->organizationName : 'Не добавлена' }}</td>
                                <td data-order="2021-12-06T21:50:19+02:00">
                                    @if($project->statusProject == 0)
                                        <div class="badge badge-primary fw-bolder" bis_skin_checked="1">В разработке</div>
                                    @elseif($project->statusProject == 1)
                                        <div class="badge badge-warning fw-bolder" bis_skin_checked="1">На экспертизе</div>
                                    @else
                                        <div class="badge badge-success fw-bolder" bis_skin_checked="1">Готов</div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="/admin/deleteProject/{{$project->project_id}}" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="row" bis_skin_checked="1">
                    <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start" bis_skin_checked="1"></div>
                    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end" bis_skin_checked="1">
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate" bis_skin_checked="1">
                            {{ $allProject->appends(['email'=>request()->email])->links('vendor.pagination.bootstrap-4') }}


                            {{--                            <ul class="pagination">--}}
                            {{--                                <li class="paginate_button page-item previous disabled" id="kt_table_users_previous">--}}
                            {{--                                    <a href="#" aria-controls="kt_table_users" data-dt-idx="0" tabindex="0" class="page-link">--}}
                            {{--                                        <i class="previous"></i></a></li>--}}
                            {{--                                <li class="paginate_button page-item active">--}}
                            {{--                                    <a href="#" aria-controls="kt_table_users" data-dt-idx="1" tabindex="0" class="page-link">{{$allUsers->links()}}</a>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="paginate_button page-item ">--}}
                            {{--                                    <a href="#" aria-controls="kt_table_users" data-dt-idx="2" tabindex="0" class="page-link">2</a>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="paginate_button page-item ">--}}
                            {{--                                    <a href="#" aria-controls="kt_table_users" data-dt-idx="3" tabindex="0" class="page-link">3</a>--}}
                            {{--                                </li><li class="paginate_button page-item next" id="kt_table_users_next">--}}
                            {{--                                    <a href="#" aria-controls="kt_table_users" data-dt-idx="4" tabindex="0" class="page-link">--}}
                            {{--                                        <i class="next">--}}
                            {{--                                        </i>--}}
                            {{--                                    </a>--}}
                            {{--                                </li>--}}
                            {{--                            </ul>--}}
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>    <!--end::Card-->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
</script>
