<!--begin::Toolbar-->
<div class="toolbar py-5 py-lg-7" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
        <div class="page-title d-flex flex-column me-3">
            <h1 class="d-flex text-dark fw-bolder my-1 fs-3">@yield('PageName')</h1>
            <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
                @yield('breadcrumbs')
            </ul>
        </div>
        @yield('customFields')
        <!--begin::Actions-->
    {{--        <div class="d-flex align-items-center py-1">--}}
    {{--            <!--begin::Button-->--}}
    {{--            <a href="#" class="btn btn-icon btn-color-primary bg-body w-40px h-40px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">--}}
    {{--                <!--begin::Svg Icon | path: icons/duotune/files/fil008.svg-->--}}
    {{--                <span class="svg-icon svg-icon-1">--}}
    {{--										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
    {{--											<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM11.7 17.7L16.7 12.7C17.1 12.3 17.1 11.7 16.7 11.3C16.3 10.9 15.7 10.9 15.3 11.3L11 15.6L8.70001 13.3C8.30001 12.9 7.69999 12.9 7.29999 13.3C6.89999 13.7 6.89999 14.3 7.29999 14.7L10.3 17.7C10.5 17.9 10.8 18 11 18C11.2 18 11.5 17.9 11.7 17.7Z" fill="black" />--}}
    {{--											<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />--}}
    {{--										</svg>--}}
    {{--									</span>--}}
    {{--                <!--end::Svg Icon-->--}}
    {{--            </a>--}}
    {{--            <!--end::Button-->--}}
    {{--            <!--begin::Button-->--}}
    {{--            <a href="#" class="btn btn-icon btn-color-success bg-body w-40px h-40px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">--}}
    {{--                <!--begin::Svg Icon | path: icons/duotune/files/fil005.svg-->--}}
    {{--                <span class="svg-icon svg-icon-1">--}}
    {{--										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
    {{--											<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 13H13V10C13 9.4 12.6 9 12 9C11.4 9 11 9.4 11 10V13H8C7.4 13 7 13.4 7 14C7 14.6 7.4 15 8 15H11V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18V15H16C16.6 15 17 14.6 17 14C17 13.4 16.6 13 16 13Z" fill="black" />--}}
    {{--											<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />--}}
    {{--										</svg>--}}
    {{--									</span>--}}
    {{--                <!--end::Svg Icon-->--}}
    {{--            </a>--}}
    {{--            <!--end::Button-->--}}
    {{--            <!--begin::Button-->--}}
    {{--            <a href="#" class="btn btn-icon btn-color-warning bg-body w-40px h-40px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">--}}
    {{--                <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->--}}
    {{--                <span class="svg-icon svg-icon-1">--}}
    {{--										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
    {{--											<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z" fill="black" />--}}
    {{--											<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />--}}
    {{--										</svg>--}}
    {{--									</span>--}}
    {{--                <!--end::Svg Icon-->--}}
    {{--            </a>--}}
    {{--            <!--end::Button-->--}}
    {{--            <!--begin::Daterange-->--}}
    {{--            <a href="#" class="btn btn-flex bg-body h-40px me-3 px-5" id="kt_dashboard_daterangepicker" data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-trigger="hover" title="Select dashboard daterange">--}}
    {{--									<span class="me-4">--}}
    {{--										<span class="text-muted fw-bold me-1" id="kt_dashboard_daterangepicker_title">Today</span>--}}
    {{--										<span class="text-primary fw-bolder" id="kt_dashboard_daterangepicker_date">Nov 11</span>--}}
    {{--									</span>--}}
    {{--                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->--}}
    {{--                <span class="svg-icon svg-icon-4 m-0">--}}
    {{--										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
    {{--											<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />--}}
    {{--										</svg>--}}
    {{--									</span>--}}
    {{--                <!--end::Svg Icon-->--}}
    {{--            </a>--}}
    {{--            <!--end::Daterange-->--}}
    {{--            <!--begin::Menu wrapper-->--}}
    {{--            <div class="m-0">--}}
    {{--                <!--begin1::Toggle-->--}}
    {{--                <a href="#" class="btn btn-icon btn-primary w-40px h-40px me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">--}}
    {{--                    <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->--}}
    {{--                    <span class="svg-icon svg-icon-1">--}}
    {{--											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
    {{--												<path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="black" />--}}
    {{--												<path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="black" />--}}
    {{--											</svg>--}}
    {{--										</span>--}}
    {{--                    <!--end::Svg Icon-->--}}
    {{--                </a>--}}
    {{--                <!--end::Toggle-->--}}
    {{--                <!--begin::Menu 2-->--}}
    {{--                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">--}}
    {{--                    <!--begin::Menu item-->--}}
    {{--                    <div class="menu-item px-3">--}}
    {{--                        <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions</div>--}}
    {{--                    </div>--}}
    {{--                    <!--end::Menu item-->--}}
    {{--                    <!--begin::Menu separator-->--}}
    {{--                    <div class="separator mb-3 opacity-75"></div>--}}
    {{--                    <!--end::Menu separator-->--}}
    {{--                    <!--begin::Menu item-->--}}
    {{--                    <div class="menu-item px-3">--}}
    {{--                        <a href="#" class="menu-link px-3">New Ticket</a>--}}
    {{--                    </div>--}}
    {{--                    <!--end::Menu item-->--}}
    {{--                    <!--begin::Menu item-->--}}
    {{--                    <div class="menu-item px-3">--}}
    {{--                        <a href="#" class="menu-link px-3">New Customer</a>--}}
    {{--                    </div>--}}
    {{--                    <!--end::Menu item-->--}}
    {{--                    <!--begin::Menu item-->--}}
    {{--                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">--}}
    {{--                        <!--begin::Menu item-->--}}
    {{--                        <a href="#" class="menu-link px-3">--}}
    {{--                            <span class="menu-title">New Group</span>--}}
    {{--                            <span class="menu-arrow"></span>--}}
    {{--                        </a>--}}
    {{--                        <!--end::Menu item-->--}}
    {{--                        <!--begin::Menu sub-->--}}
    {{--                        <div class="menu-sub menu-sub-dropdown w-175px py-4">--}}
    {{--                            <!--begin::Menu item-->--}}
    {{--                            <div class="menu-item px-3">--}}
    {{--                                <a href="#" class="menu-link px-3">Admin Group</a>--}}
    {{--                            </div>--}}
    {{--                            <!--end::Menu item-->--}}
    {{--                            <!--begin::Menu item-->--}}
    {{--                            <div class="menu-item px-3">--}}
    {{--                                <a href="#" class="menu-link px-3">Staff Group</a>--}}
    {{--                            </div>--}}
    {{--                            <!--end::Menu item-->--}}
    {{--                            <!--begin::Menu item-->--}}
    {{--                            <div class="menu-item px-3">--}}
    {{--                                <a href="#" class="menu-link px-3">Member Group</a>--}}
    {{--                            </div>--}}
    {{--                            <!--end::Menu item-->--}}
    {{--                        </div>--}}
    {{--                        <!--end::Menu sub-->--}}
    {{--                    </div>--}}
    {{--                    <!--end::Menu item-->--}}
    {{--                    <!--begin::Menu item-->--}}
    {{--                    <div class="menu-item px-3">--}}
    {{--                        <a href="#" class="menu-link px-3">New Contact</a>--}}
    {{--                    </div>--}}
    {{--                    <!--end::Menu item-->--}}
    {{--                    <!--begin::Menu separator-->--}}
    {{--                    <div class="separator mt-3 opacity-75"></div>--}}
    {{--                    <!--end::Menu separator-->--}}
    {{--                    <!--begin::Menu item-->--}}
    {{--                    <div class="menu-item px-3">--}}
    {{--                        <div class="menu-content px-3 py-3">--}}
    {{--                            <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <!--end::Menu item-->--}}
    {{--                </div>--}}
    {{--                <!--end::Menu 2-->--}}
    {{--            </div>--}}
    {{--            <!--end::Menu wrapper-->--}}
    {{--        </div>--}}
    <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
