@extends('layout.admin')

@section('title', 'Статистика')

@section('content')

    <div class="row gy-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::Mixed Widget 2-->
            <div class="card card-xl-stretch">
                <!--begin::Header-->
                <div class="card-header border-0 bg-danger py-5">
                    <h3 class="card-title fw-bolder text-white">Sales Statistics</h3>
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <button type="button" class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color- border-0 me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                            <span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"></rect>
																	<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
																	<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
																	<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
																</g>
															</svg>
														</span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--begin::Menu 3-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                            <!--begin::Heading-->
                            <div class="menu-item px-3">
                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Create Invoice</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link flex-stack px-3">Create Payment
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Specify a target name for future usage and reference" aria-label="Specify a target name for future usage and reference"></i></a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Generate Bill</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                <a href="#" class="menu-link px-3">
                                    <span class="menu-title">Subscription</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <!--begin::Menu sub-->
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Plans</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Billing</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Statements</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content px-3">
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications">
                                                <!--end::Input-->
                                                <!--end::Label-->
                                                <span class="form-check-label text-muted fs-6">Recuring</span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu sub-->
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3 my-1">
                                <a href="#" class="menu-link px-3">Settings</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu 3-->
                        <!--end::Menu-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0" style="position: relative;">
                    <!--begin::Chart-->
                    <div class="mixed-widget-2-chart card-rounded-bottom bg-danger" data-kt-color="danger" style="height: 200px; min-height: 200px;"><div id="apexchartszkxub74n" class="apexcharts-canvas apexchartszkxub74n apexcharts-theme-light" style="width: 403px; height: 200px;"><svg id="SvgjsSvg1257" width="403" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent none repeat scroll 0% 0%;"><g id="SvgjsG1259" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1258"><clipPath id="gridRectMaskzkxub74n"><rect id="SvgjsRect1262" width="410" height="203" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskzkxub74n"></clipPath><clipPath id="nonForecastMaskzkxub74n"></clipPath><clipPath id="gridRectMarkerMaskzkxub74n"><rect id="SvgjsRect1263" width="407" height="204" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><filter id="SvgjsFilter1269" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood1270" flood-color="#cb1b46" flood-opacity="0.5" result="SvgjsFeFlood1270Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1271" in="SvgjsFeFlood1270Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1271Out"></feComposite><feOffset id="SvgjsFeOffset1272" dx="0" dy="5" result="SvgjsFeOffset1272Out" in="SvgjsFeComposite1271Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1273" stdDeviation="3 " result="SvgjsFeGaussianBlur1273Out" in="SvgjsFeOffset1272Out"></feGaussianBlur><feBlend id="SvgjsFeBlend1274" in="SourceGraphic" in2="SvgjsFeGaussianBlur1273Out" mode="normal" result="SvgjsFeBlend1274Out"></feBlend></filter><filter id="SvgjsFilter1276" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood1277" flood-color="#cb1b46" flood-opacity="0.5" result="SvgjsFeFlood1277Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1278" in="SvgjsFeFlood1277Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1278Out"></feComposite><feOffset id="SvgjsFeOffset1279" dx="0" dy="5" result="SvgjsFeOffset1279Out" in="SvgjsFeComposite1278Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1280" stdDeviation="3 " result="SvgjsFeGaussianBlur1280Out" in="SvgjsFeOffset1279Out"></feGaussianBlur><feBlend id="SvgjsFeBlend1281" in="SourceGraphic" in2="SvgjsFeGaussianBlur1280Out" mode="normal" result="SvgjsFeBlend1281Out"></feBlend></filter></defs><g id="SvgjsG1282" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1283" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1292" class="apexcharts-grid"><g id="SvgjsG1293" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1295" x1="0" y1="0" x2="403" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1296" x1="0" y1="20" x2="403" y2="20" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1297" x1="0" y1="40" x2="403" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1298" x1="0" y1="60" x2="403" y2="60" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1299" x1="0" y1="80" x2="403" y2="80" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1300" x1="0" y1="100" x2="403" y2="100" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1301" x1="0" y1="120" x2="403" y2="120" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1302" x1="0" y1="140" x2="403" y2="140" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1303" x1="0" y1="160" x2="403" y2="160" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1304" x1="0" y1="180" x2="403" y2="180" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1305" x1="0" y1="200" x2="403" y2="200" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1294" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1307" x1="0" y1="200" x2="403" y2="200" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1306" x1="0" y1="1" x2="0" y2="200" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1264" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1265" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1268" d="M 0 200L 0 125C 23.508333333333333 125 43.65833333333334 87.5 67.16666666666667 87.5C 90.67500000000001 87.5 110.82500000000002 120 134.33333333333334 120C 157.84166666666667 120 177.99166666666667 25 201.5 25C 225.00833333333333 25 245.15833333333336 100 268.6666666666667 100C 292.175 100 312.325 100 335.8333333333333 100C 359.34166666666664 100 379.4916666666667 100 403 100C 403 100 403 100 403 200M 403 100z" fill="transparent" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskzkxub74n)" filter="url(#SvgjsFilter1269)" pathTo="M 0 200L 0 125C 23.508333333333333 125 43.65833333333334 87.5 67.16666666666667 87.5C 90.67500000000001 87.5 110.82500000000002 120 134.33333333333334 120C 157.84166666666667 120 177.99166666666667 25 201.5 25C 225.00833333333333 25 245.15833333333336 100 268.6666666666667 100C 292.175 100 312.325 100 335.8333333333333 100C 359.34166666666664 100 379.4916666666667 100 403 100C 403 100 403 100 403 200M 403 100z" pathFrom="M -1 200L -1 200L 67.16666666666667 200L 134.33333333333334 200L 201.5 200L 268.6666666666667 200L 335.8333333333333 200L 403 200"></path><path id="SvgjsPath1275" d="M 0 125C 23.508333333333333 125 43.65833333333334 87.5 67.16666666666667 87.5C 90.67500000000001 87.5 110.82500000000002 120 134.33333333333334 120C 157.84166666666667 120 177.99166666666667 25 201.5 25C 225.00833333333333 25 245.15833333333336 100 268.6666666666667 100C 292.175 100 312.325 100 335.8333333333333 100C 359.34166666666664 100 379.4916666666667 100 403 100" fill="none" fill-opacity="1" stroke="#cb1b46" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskzkxub74n)" filter="url(#SvgjsFilter1276)" pathTo="M 0 125C 23.508333333333333 125 43.65833333333334 87.5 67.16666666666667 87.5C 90.67500000000001 87.5 110.82500000000002 120 134.33333333333334 120C 157.84166666666667 120 177.99166666666667 25 201.5 25C 225.00833333333333 25 245.15833333333336 100 268.6666666666667 100C 292.175 100 312.325 100 335.8333333333333 100C 359.34166666666664 100 379.4916666666667 100 403 100" pathFrom="M -1 200L -1 200L 67.16666666666667 200L 134.33333333333334 200L 201.5 200L 268.6666666666667 200L 335.8333333333333 200L 403 200"></path><g id="SvgjsG1266" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1313" r="0" cx="0" cy="0" class="apexcharts-marker wuu65ybxbg no-pointer-events" stroke="#cb1b46" fill="#f1416c" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1267" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1308" x1="0" y1="0" x2="403" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1309" x1="0" y1="0" x2="403" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1310" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1311" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1312" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1291" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1260" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 100px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: transparent;"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                    <!--end::Chart-->
                    <!--begin::Stats-->
                    <div class="card-p mt-n20 position-relative">
                        <!--begin::Row-->
                        <div class="row g-0">
                            <!--begin::Col-->
                            <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<rect x="8" y="9" width="3" height="10" rx="1.5" fill="black"></rect>
																	<rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black"></rect>
																	<rect x="18" y="11" width="3" height="8" rx="1.5" fill="black"></rect>
																	<rect x="3" y="13" width="3" height="6" rx="1.5" fill="black"></rect>
																</svg>
															</span>
                                <!--end::Svg Icon-->
                                <a href="#" class="text-warning fw-bold fs-6">Weekly Sales</a>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
                                <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black"></path>
																	<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black"></path>
																</svg>
															</span>
                                <!--end::Svg Icon-->
                                <a href="#" class="text-primary fw-bold fs-6">New Projects</a>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row g-0">
                            <!--begin::Col-->
                            <div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
																	<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
																</svg>
															</span>
                                <!--end::Svg Icon-->
                                <a href="#" class="text-danger fw-bold fs-6 mt-2">Item Orders</a>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col bg-light-success px-6 py-8 rounded-2">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="black"></path>
																	<path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="black"></path>
																</svg>
															</span>
                                <!--end::Svg Icon-->
                                <a href="#" class="text-success fw-bold fs-6 mt-2">Bug Reports</a>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Stats-->
                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 404px; height: 462px;"></div></div><div class="contract-trigger"></div></div></div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::List Widget 5-->
            <div class="card card-xl-stretch">
                <!--begin::Header-->
                <div class="card-header align-items-center border-0 mt-4">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="fw-bolder mb-2 text-dark">Activities</span>
                        <span class="text-muted fw-bold fs-7">890,344 Sales</span>
                    </h3>
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                            <span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"></rect>
																	<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
																	<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
																	<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
																</g>
															</svg>
														</span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_618d2f2dc18f4">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Menu separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Menu separator-->
                            <!--begin::Form-->
                            <div class="px-7 py-5">
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold">Status:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div>
                                        <select class="form-select form-select-solid select2-hidden-accessible" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_618d2f2dc18f4" data-allow-clear="true" data-select2-id="select2-data-10-1y4u" tabindex="-1" aria-hidden="true">
                                            <option data-select2-id="select2-data-12-rdlt"></option>
                                            <option value="1">Approved</option>
                                            <option value="2">Pending</option>
                                            <option value="2">In Process</option>
                                            <option value="2">Rejected</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-v5p2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-gy4v-container" aria-controls="select2-gy4v-container"><span class="select2-selection__rendered" id="select2-gy4v-container" role="textbox" aria-readonly="true" title="Select option"><span class="select2-selection__placeholder">Select option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold">Member Type:</label>
                                    <!--end::Label-->
                                    <!--begin::Options-->
                                    <div class="d-flex">
                                        <!--begin::Options-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="checkbox" value="1">
                                            <span class="form-check-label">Author</span>
                                        </label>
                                        <!--end::Options-->
                                        <!--begin::Options-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="2" checked="checked">
                                            <span class="form-check-label">Customer</span>
                                        </label>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Options-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold">Notifications:</label>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked">
                                        <label class="form-check-label">Enabled</label>
                                    </div>
                                    <!--end::Switch-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                    <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Menu 1-->
                        <!--end::Menu-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-5">
                    <!--begin::Timeline-->
                    <div class="timeline-label">
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">08:42</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-warning fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Text-->
                            <div class="fw-mormal timeline-content text-muted ps-3">Outlines keep you honest. And keep structure</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">10:00</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-success fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Content-->
                            <div class="timeline-content d-flex">
                                <span class="fw-bolder text-gray-800 ps-3">AEOL meeting</span>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">14:37</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-danger fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Desc-->
                            <div class="timeline-content fw-bolder text-gray-800 ps-3">Make deposit
                                <a href="#" class="text-primary">USD 700</a>. to ESL</div>
                            <!--end::Desc-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">16:50</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-primary fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Text-->
                            <div class="timeline-content fw-mormal text-muted ps-3">Indulging in poorly driving and keep structure keep great</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">21:03</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-danger fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Desc-->
                            <div class="timeline-content fw-bold text-gray-800 ps-3">New order placed
                                <a href="#" class="text-primary">#XF-2356</a>.</div>
                            <!--end::Desc-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">16:50</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-primary fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Text-->
                            <div class="timeline-content fw-mormal text-muted ps-3">Indulging in poorly driving and keep structure keep great</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">21:03</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-danger fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Desc-->
                            <div class="timeline-content fw-bold text-gray-800 ps-3">New order placed
                                <a href="#" class="text-primary">#XF-2356</a>.</div>
                            <!--end::Desc-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="timeline-item">
                            <!--begin::Label-->
                            <div class="timeline-label fw-bolder text-gray-800 fs-6">10:30</div>
                            <!--end::Label-->
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-success fs-1"></i>
                            </div>
                            <!--end::Badge-->
                            <!--begin::Text-->
                            <div class="timeline-content fw-mormal text-muted ps-3">Finance KPI Mobile app launch preparion meeting</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Timeline-->
                </div>
                <!--end: Card Body-->
            </div>
            <!--end: List Widget 5-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::Mixed Widget 7-->
            <div class="card card-xl-stretch-50 mb-5 mb-xl-8">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column p-0" style="position: relative;">
                    <!--begin::Stats-->
                    <div class="flex-grow-1 card-p pb-0">
                        <div class="d-flex flex-stack flex-wrap">
                            <div class="me-2">
                                <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Generate Reports</a>
                                <div class="text-muted fs-7 fw-bold">Finance and accounting reports</div>
                            </div>
                            <div class="fw-bolder fs-3 text-primary">$24,500</div>
                        </div>
                    </div>
                    <!--end::Stats-->
                    <!--begin::Chart-->
                    <div class="mixed-widget-7-chart card-rounded-bottom" data-kt-chart-color="primary" style="height: 150px; min-height: 150px;"><div id="apexchartspyxwss0v" class="apexcharts-canvas apexchartspyxwss0v apexcharts-theme-light" style="width: 403px; height: 150px;"><svg id="SvgjsSvg1360" width="403" height="150" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent none repeat scroll 0% 0%;"><g id="SvgjsG1362" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1361"><clipPath id="gridRectMaskpyxwss0v"><rect id="SvgjsRect1365" width="410" height="153" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskpyxwss0v"></clipPath><clipPath id="nonForecastMaskpyxwss0v"></clipPath><clipPath id="gridRectMarkerMaskpyxwss0v"><rect id="SvgjsRect1366" width="407" height="154" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1373" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1374" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1382" class="apexcharts-grid"><g id="SvgjsG1383" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1385" x1="0" y1="0" x2="403" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1386" x1="0" y1="15" x2="403" y2="15" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1387" x1="0" y1="30" x2="403" y2="30" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1388" x1="0" y1="45" x2="403" y2="45" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1389" x1="0" y1="60" x2="403" y2="60" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1390" x1="0" y1="75" x2="403" y2="75" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1391" x1="0" y1="90" x2="403" y2="90" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1392" x1="0" y1="105" x2="403" y2="105" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1393" x1="0" y1="120" x2="403" y2="120" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1394" x1="0" y1="135" x2="403" y2="135" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1395" x1="0" y1="150" x2="403" y2="150" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1384" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1397" x1="0" y1="150" x2="403" y2="150" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1396" x1="0" y1="1" x2="0" y2="150" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1367" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1368" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1371" d="M 0 150L 0 112.5C 28.209999999999997 112.5 52.39 87.5 80.6 87.5C 108.80999999999999 87.5 132.98999999999998 112.5 161.2 112.5C 189.41 112.5 213.58999999999997 50 241.79999999999998 50C 270.01 50 294.19 100 322.4 100C 350.60999999999996 100 374.79 25 403 25C 403 25 403 25 403 150M 403 25z" fill="rgba(241,250,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskpyxwss0v)" pathTo="M 0 150L 0 112.5C 28.209999999999997 112.5 52.39 87.5 80.6 87.5C 108.80999999999999 87.5 132.98999999999998 112.5 161.2 112.5C 189.41 112.5 213.58999999999997 50 241.79999999999998 50C 270.01 50 294.19 100 322.4 100C 350.60999999999996 100 374.79 25 403 25C 403 25 403 25 403 150M 403 25z" pathFrom="M -1 150L -1 150L 80.6 150L 161.2 150L 241.79999999999998 150L 322.4 150L 403 150"></path><path id="SvgjsPath1372" d="M 0 112.5C 28.209999999999997 112.5 52.39 87.5 80.6 87.5C 108.80999999999999 87.5 132.98999999999998 112.5 161.2 112.5C 189.41 112.5 213.58999999999997 50 241.79999999999998 50C 270.01 50 294.19 100 322.4 100C 350.60999999999996 100 374.79 25 403 25" fill="none" fill-opacity="1" stroke="#009ef7" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskpyxwss0v)" pathTo="M 0 112.5C 28.209999999999997 112.5 52.39 87.5 80.6 87.5C 108.80999999999999 87.5 132.98999999999998 112.5 161.2 112.5C 189.41 112.5 213.58999999999997 50 241.79999999999998 50C 270.01 50 294.19 100 322.4 100C 350.60999999999996 100 374.79 25 403 25" pathFrom="M -1 150L -1 150L 80.6 150L 161.2 150L 241.79999999999998 150L 322.4 150L 403 150"></path><g id="SvgjsG1369" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1403" r="0" cx="0" cy="0" class="apexcharts-marker wz6jku0mc no-pointer-events" stroke="#009ef7" fill="#f1faff" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1370" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1398" x1="0" y1="0" x2="403" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1399" x1="0" y1="0" x2="403" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1400" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1401" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1402" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1381" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1363" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 75px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(241, 250, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: inherit; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                    <!--end::Chart-->
                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 404px; height: 258px;"></div></div><div class="contract-trigger"></div></div></div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 7-->
            <!--begin::Mixed Widget 10-->
            <div class="card card-xl-stretch-50 mb-5 mb-xl-8">
                <!--begin::Body-->
                <div class="card-body p-0 d-flex justify-content-between flex-column overflow-hidden" style="position: relative;">
                    <!--begin::Hidden-->
                    <div class="d-flex flex-stack flex-wrap flex-grow-1 px-9 pt-9 pb-3">
                        <div class="me-2">
                            <span class="fw-bolder text-gray-800 d-block fs-3">Sales</span>
                            <span class="text-gray-400 fw-bold">Oct 8 - Oct 26 21</span>
                        </div>
                        <div class="fw-bolder fs-3 text-primary">$15,300</div>
                    </div>
                    <!--end::Hidden-->
                    <!--begin::Chart-->
                    <div class="mixed-widget-10-chart" data-kt-color="primary" style="height: 175px; min-height: 183px;"><div id="apexchartsex3ilt4d" class="apexcharts-canvas apexchartsex3ilt4d apexcharts-theme-light" style="width: 403px; height: 168px;"><svg id="SvgjsSvg1404" width="403" height="168" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent none repeat scroll 0% 0%;"><g id="SvgjsG1406" class="apexcharts-inner apexcharts-graphical" transform="translate(43.633331298828125, 40)"><defs id="SvgjsDefs1405"><linearGradient id="SvgjsLinearGradient1410" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1411" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop><stop id="SvgjsStop1412" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop><stop id="SvgjsStop1413" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop></linearGradient><clipPath id="gridRectMaskex3ilt4d"><rect id="SvgjsRect1415" width="355.3666687011719" height="86.685" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskex3ilt4d"></clipPath><clipPath id="nonForecastMaskex3ilt4d"></clipPath><clipPath id="gridRectMarkerMaskex3ilt4d"><rect id="SvgjsRect1416" width="353.3666687011719" height="88.685" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><rect id="SvgjsRect1414" width="10.917708396911621" height="84.685" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient1410)" class="apexcharts-xcrosshairs" y2="84.685" filter="none" fill-opacity="0.9"></rect><g id="SvgjsG1456" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1457" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1459" font-family="inherit" x="21.835416793823242" y="113.685" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1460">Feb</tspan><title>Feb</title></text><text id="SvgjsText1462" font-family="inherit" x="65.50625038146973" y="113.685" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1463">Mar</tspan><title>Mar</title></text><text id="SvgjsText1465" font-family="inherit" x="109.17708396911621" y="113.685" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1466">Apr</tspan><title>Apr</title></text><text id="SvgjsText1468" font-family="inherit" x="152.8479175567627" y="113.685" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1469">May</tspan><title>May</title></text><text id="SvgjsText1471" font-family="inherit" x="196.51875114440918" y="113.685" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1472">Jun</tspan><title>Jun</title></text><text id="SvgjsText1474" font-family="inherit" x="240.18958473205566" y="113.685" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1475">Jul</tspan><title>Jul</title></text><text id="SvgjsText1477" font-family="inherit" x="283.86041831970215" y="113.685" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1478">Aug</tspan><title>Aug</title></text><text id="SvgjsText1480" font-family="inherit" x="327.53125190734863" y="113.685" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1481">Sep</tspan><title>Sep</title></text></g></g><g id="SvgjsG1494" class="apexcharts-grid"><g id="SvgjsG1495" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine1497" x1="0" y1="0" x2="349.3666687011719" y2="0" stroke="#eff2f5" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1498" x1="0" y1="21.17125" x2="349.3666687011719" y2="21.17125" stroke="#eff2f5" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1499" x1="0" y1="42.3425" x2="349.3666687011719" y2="42.3425" stroke="#eff2f5" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1500" x1="0" y1="63.51375" x2="349.3666687011719" y2="63.51375" stroke="#eff2f5" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1501" x1="0" y1="84.685" x2="349.3666687011719" y2="84.685" stroke="#eff2f5" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1496" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1503" x1="0" y1="84.685" x2="349.3666687011719" y2="84.685" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1502" x1="0" y1="1" x2="0" y2="84.685" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1417" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG1418" class="apexcharts-series" rel="1" seriesName="NetxProfit" data:realIndex="0"><path id="SvgjsPath1422" d="M 10.917708396911621 84.685L 10.917708396911621 35.756875Q 10.917708396911621 31.756875 14.917708396911621 31.756875L 15.835416793823242 31.756875Q 19.835416793823242 31.756875 19.835416793823242 35.756875L 19.835416793823242 35.756875L 19.835416793823242 84.685L 19.835416793823242 84.685z" fill="rgba(0,158,247,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskex3ilt4d)" pathTo="M 10.917708396911621 84.685L 10.917708396911621 35.756875Q 10.917708396911621 31.756875 14.917708396911621 31.756875L 15.835416793823242 31.756875Q 19.835416793823242 31.756875 19.835416793823242 35.756875L 19.835416793823242 35.756875L 19.835416793823242 84.685L 19.835416793823242 84.685z" pathFrom="M 10.917708396911621 84.685L 10.917708396911621 84.685L 19.835416793823242 84.685L 19.835416793823242 84.685L 19.835416793823242 84.685L 19.835416793823242 84.685L 19.835416793823242 84.685L 10.917708396911621 84.685" cy="31.756875" cx="53.588541984558105" j="0" val="50" barHeight="52.928125" barWidth="10.917708396911621"></path><path id="SvgjsPath1424" d="M 54.588541984558105 84.685L 54.588541984558105 25.17125Q 54.588541984558105 21.17125 58.588541984558105 21.17125L 59.50625038146973 21.17125Q 63.50625038146973 21.17125 63.50625038146973 25.17125L 63.50625038146973 25.17125L 63.50625038146973 84.685L 63.50625038146973 84.685z" fill="rgba(0,158,247,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskex3ilt4d)" pathTo="M 54.588541984558105 84.685L 54.588541984558105 25.17125Q 54.588541984558105 21.17125 58.588541984558105 21.17125L 59.50625038146973 21.17125Q 63.50625038146973 21.17125 63.50625038146973 25.17125L 63.50625038146973 25.17125L 63.50625038146973 84.685L 63.50625038146973 84.685z" pathFrom="M 54.588541984558105 84.685L 54.588541984558105 84.685L 63.50625038146973 84.685L 63.50625038146973 84.685L 63.50625038146973 84.685L 63.50625038146973 84.685L 63.50625038146973 84.685L 54.588541984558105 84.685" cy="21.17125" cx="97.25937557220459" j="1" val="60" barHeight="63.51375" barWidth="10.917708396911621"></path><path id="SvgjsPath1426" d="M 98.25937557220459 84.685L 98.25937557220459 14.585624999999993Q 98.25937557220459 10.585624999999993 102.25937557220459 10.585624999999993L 103.17708396911621 10.585624999999993Q 107.17708396911621 10.585624999999993 107.17708396911621 14.585624999999993L 107.17708396911621 14.585624999999993L 107.17708396911621 84.685L 107.17708396911621 84.685z" fill="rgba(0,158,247,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskex3ilt4d)" pathTo="M 98.25937557220459 84.685L 98.25937557220459 14.585624999999993Q 98.25937557220459 10.585624999999993 102.25937557220459 10.585624999999993L 103.17708396911621 10.585624999999993Q 107.17708396911621 10.585624999999993 107.17708396911621 14.585624999999993L 107.17708396911621 14.585624999999993L 107.17708396911621 84.685L 107.17708396911621 84.685z" pathFrom="M 98.25937557220459 84.685L 98.25937557220459 84.685L 107.17708396911621 84.685L 107.17708396911621 84.685L 107.17708396911621 84.685L 107.17708396911621 84.685L 107.17708396911621 84.685L 98.25937557220459 84.685" cy="10.585624999999993" cx="140.93020915985107" j="2" val="70" barHeight="74.09937500000001" barWidth="10.917708396911621"></path><path id="SvgjsPath1428" d="M 141.93020915985107 84.685L 141.93020915985107 4Q 141.93020915985107 0 145.93020915985107 0L 146.8479175567627 0Q 150.8479175567627 0 150.8479175567627 4L 150.8479175567627 4L 150.8479175567627 84.685L 150.8479175567627 84.685z" fill="rgba(0,158,247,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskex3ilt4d)" pathTo="M 141.93020915985107 84.685L 141.93020915985107 4Q 141.93020915985107 0 145.93020915985107 0L 146.8479175567627 0Q 150.8479175567627 0 150.8479175567627 4L 150.8479175567627 4L 150.8479175567627 84.685L 150.8479175567627 84.685z" pathFrom="M 141.93020915985107 84.685L 141.93020915985107 84.685L 150.8479175567627 84.685L 150.8479175567627 84.685L 150.8479175567627 84.685L 150.8479175567627 84.685L 150.8479175567627 84.685L 141.93020915985107 84.685" cy="0" cx="184.60104274749756" j="3" val="80" barHeight="84.685" barWidth="10.917708396911621"></path><path id="SvgjsPath1430" d="M 185.60104274749756 84.685L 185.60104274749756 25.17125Q 185.60104274749756 21.17125 189.60104274749756 21.17125L 190.51875114440918 21.17125Q 194.51875114440918 21.17125 194.51875114440918 25.17125L 194.51875114440918 25.17125L 194.51875114440918 84.685L 194.51875114440918 84.685z" fill="rgba(0,158,247,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskex3ilt4d)" pathTo="M 185.60104274749756 84.685L 185.60104274749756 25.17125Q 185.60104274749756 21.17125 189.60104274749756 21.17125L 190.51875114440918 21.17125Q 194.51875114440918 21.17125 194.51875114440918 25.17125L 194.51875114440918 25.17125L 194.51875114440918 84.685L 194.51875114440918 84.685z" pathFrom="M 185.60104274749756 84.685L 185.60104274749756 84.685L 194.51875114440918 84.685L 194.51875114440918 84.685L 194.51875114440918 84.685L 194.51875114440918 84.685L 194.51875114440918 84.685L 185.60104274749756 84.685" cy="21.17125" cx="228.27187633514404" j="4" val="60" barHeight="63.51375" barWidth="10.917708396911621"></path><path id="SvgjsPath1432" d="M 229.27187633514404 84.685L 229.27187633514404 35.756875Q 229.27187633514404 31.756875 233.27187633514404 31.756875L 234.18958473205566 31.756875Q 238.18958473205566 31.756875 238.18958473205566 35.756875L 238.18958473205566 35.756875L 238.18958473205566 84.685L 238.18958473205566 84.685z" fill="rgba(0,158,247,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskex3ilt4d)" pathTo="M 229.27187633514404 84.685L 229.27187633514404 35.756875Q 229.27187633514404 31.756875 233.27187633514404 31.756875L 234.18958473205566 31.756875Q 238.18958473205566 31.756875 238.18958473205566 35.756875L 238.18958473205566 35.756875L 238.18958473205566 84.685L 238.18958473205566 84.685z" pathFrom="M 229.27187633514404 84.685L 229.27187633514404 84.685L 238.18958473205566 84.685L 238.18958473205566 84.685L 238.18958473205566 84.685L 238.18958473205566 84.685L 238.18958473205566 84.685L 229.27187633514404 84.685" cy="31.756875" cx="271.9427099227905" j="5" val="50" barHeight="52.928125" barWidth="10.917708396911621"></path><path id="SvgjsPath1434" d="M 272.9427099227905 84.685L 272.9427099227905 14.585624999999993Q 272.9427099227905 10.585624999999993 276.9427099227905 10.585624999999993L 277.86041831970215 10.585624999999993Q 281.86041831970215 10.585624999999993 281.86041831970215 14.585624999999993L 281.86041831970215 14.585624999999993L 281.86041831970215 84.685L 281.86041831970215 84.685z" fill="rgba(0,158,247,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskex3ilt4d)" pathTo="M 272.9427099227905 84.685L 272.9427099227905 14.585624999999993Q 272.9427099227905 10.585624999999993 276.9427099227905 10.585624999999993L 277.86041831970215 10.585624999999993Q 281.86041831970215 10.585624999999993 281.86041831970215 14.585624999999993L 281.86041831970215 14.585624999999993L 281.86041831970215 84.685L 281.86041831970215 84.685z" pathFrom="M 272.9427099227905 84.685L 272.9427099227905 84.685L 281.86041831970215 84.685L 281.86041831970215 84.685L 281.86041831970215 84.685L 281.86041831970215 84.685L 281.86041831970215 84.685L 272.9427099227905 84.685" cy="10.585624999999993" cx="315.613543510437" j="6" val="70" barHeight="74.09937500000001" barWidth="10.917708396911621"></path><path id="SvgjsPath1436" d="M 316.613543510437 84.685L 316.613543510437 25.17125Q 316.613543510437 21.17125 320.613543510437 21.17125L 321.53125190734863 21.17125Q 325.53125190734863 21.17125 325.53125190734863 25.17125L 325.53125190734863 25.17125L 325.53125190734863 84.685L 325.53125190734863 84.685z" fill="rgba(0,158,247,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskex3ilt4d)" pathTo="M 316.613543510437 84.685L 316.613543510437 25.17125Q 316.613543510437 21.17125 320.613543510437 21.17125L 321.53125190734863 21.17125Q 325.53125190734863 21.17125 325.53125190734863 25.17125L 325.53125190734863 25.17125L 325.53125190734863 84.685L 325.53125190734863 84.685z" pathFrom="M 316.613543510437 84.685L 316.613543510437 84.685L 325.53125190734863 84.685L 325.53125190734863 84.685L 325.53125190734863 84.685L 325.53125190734863 84.685L 325.53125190734863 84.685L 316.613543510437 84.685" cy="21.17125" cx="359.2843770980835" j="7" val="60" barHeight="63.51375" barWidth="10.917708396911621"></path><g id="SvgjsG1420" class="apexcharts-bar-goals-markers" style="pointer-events: none"><g id="SvgjsG1421" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1423" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1425" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1427" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1429" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1431" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1433" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1435" className="apexcharts-bar-goals-groups"></g></g></g><g id="SvgjsG1437" class="apexcharts-series" rel="2" seriesName="Revenue" data:realIndex="1"><path id="SvgjsPath1441" d="M 21.835416793823242 84.685L 21.835416793823242 35.756875Q 21.835416793823242 31.756875 25.835416793823242 31.756875L 26.753125190734863 31.756875Q 30.753125190734863 31.756875 30.753125190734863 35.756875L 30.753125190734863 35.756875L 30.753125190734863 84.685L 30.753125190734863 84.685z" fill="rgba(228,230,239,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskex3ilt4d)" pathTo="M 21.835416793823242 84.685L 21.835416793823242 35.756875Q 21.835416793823242 31.756875 25.835416793823242 31.756875L 26.753125190734863 31.756875Q 30.753125190734863 31.756875 30.753125190734863 35.756875L 30.753125190734863 35.756875L 30.753125190734863 84.685L 30.753125190734863 84.685z" pathFrom="M 21.835416793823242 84.685L 21.835416793823242 84.685L 30.753125190734863 84.685L 30.753125190734863 84.685L 30.753125190734863 84.685L 30.753125190734863 84.685L 30.753125190734863 84.685L 21.835416793823242 84.685" cy="31.756875" cx="64.50625038146973" j="0" val="50" barHeight="52.928125" barWidth="10.917708396911621"></path><path id="SvgjsPath1443" d="M 65.50625038146973 84.685L 65.50625038146973 25.17125Q 65.50625038146973 21.17125 69.50625038146973 21.17125L 70.42395877838135 21.17125Q 74.42395877838135 21.17125 74.42395877838135 25.17125L 74.42395877838135 25.17125L 74.42395877838135 84.685L 74.42395877838135 84.685z" fill="rgba(228,230,239,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskex3ilt4d)" pathTo="M 65.50625038146973 84.685L 65.50625038146973 25.17125Q 65.50625038146973 21.17125 69.50625038146973 21.17125L 70.42395877838135 21.17125Q 74.42395877838135 21.17125 74.42395877838135 25.17125L 74.42395877838135 25.17125L 74.42395877838135 84.685L 74.42395877838135 84.685z" pathFrom="M 65.50625038146973 84.685L 65.50625038146973 84.685L 74.42395877838135 84.685L 74.42395877838135 84.685L 74.42395877838135 84.685L 74.42395877838135 84.685L 74.42395877838135 84.685L 65.50625038146973 84.685" cy="21.17125" cx="108.17708396911621" j="1" val="60" barHeight="63.51375" barWidth="10.917708396911621"></path><path id="SvgjsPath1445" d="M 109.17708396911621 84.685L 109.17708396911621 14.585624999999993Q 109.17708396911621 10.585624999999993 113.17708396911621 10.585624999999993L 114.09479236602783 10.585624999999993Q 118.09479236602783 10.585624999999993 118.09479236602783 14.585624999999993L 118.09479236602783 14.585624999999993L 118.09479236602783 84.685L 118.09479236602783 84.685z" fill="rgba(228,230,239,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskex3ilt4d)" pathTo="M 109.17708396911621 84.685L 109.17708396911621 14.585624999999993Q 109.17708396911621 10.585624999999993 113.17708396911621 10.585624999999993L 114.09479236602783 10.585624999999993Q 118.09479236602783 10.585624999999993 118.09479236602783 14.585624999999993L 118.09479236602783 14.585624999999993L 118.09479236602783 84.685L 118.09479236602783 84.685z" pathFrom="M 109.17708396911621 84.685L 109.17708396911621 84.685L 118.09479236602783 84.685L 118.09479236602783 84.685L 118.09479236602783 84.685L 118.09479236602783 84.685L 118.09479236602783 84.685L 109.17708396911621 84.685" cy="10.585624999999993" cx="151.8479175567627" j="2" val="70" barHeight="74.09937500000001" barWidth="10.917708396911621"></path><path id="SvgjsPath1447" d="M 152.8479175567627 84.685L 152.8479175567627 4Q 152.8479175567627 0 156.8479175567627 0L 157.76562595367432 0Q 161.76562595367432 0 161.76562595367432 4L 161.76562595367432 4L 161.76562595367432 84.685L 161.76562595367432 84.685z" fill="rgba(228,230,239,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskex3ilt4d)" pathTo="M 152.8479175567627 84.685L 152.8479175567627 4Q 152.8479175567627 0 156.8479175567627 0L 157.76562595367432 0Q 161.76562595367432 0 161.76562595367432 4L 161.76562595367432 4L 161.76562595367432 84.685L 161.76562595367432 84.685z" pathFrom="M 152.8479175567627 84.685L 152.8479175567627 84.685L 161.76562595367432 84.685L 161.76562595367432 84.685L 161.76562595367432 84.685L 161.76562595367432 84.685L 161.76562595367432 84.685L 152.8479175567627 84.685" cy="0" cx="195.51875114440918" j="3" val="80" barHeight="84.685" barWidth="10.917708396911621"></path><path id="SvgjsPath1449" d="M 196.51875114440918 84.685L 196.51875114440918 25.17125Q 196.51875114440918 21.17125 200.51875114440918 21.17125L 201.4364595413208 21.17125Q 205.4364595413208 21.17125 205.4364595413208 25.17125L 205.4364595413208 25.17125L 205.4364595413208 84.685L 205.4364595413208 84.685z" fill="rgba(228,230,239,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskex3ilt4d)" pathTo="M 196.51875114440918 84.685L 196.51875114440918 25.17125Q 196.51875114440918 21.17125 200.51875114440918 21.17125L 201.4364595413208 21.17125Q 205.4364595413208 21.17125 205.4364595413208 25.17125L 205.4364595413208 25.17125L 205.4364595413208 84.685L 205.4364595413208 84.685z" pathFrom="M 196.51875114440918 84.685L 196.51875114440918 84.685L 205.4364595413208 84.685L 205.4364595413208 84.685L 205.4364595413208 84.685L 205.4364595413208 84.685L 205.4364595413208 84.685L 196.51875114440918 84.685" cy="21.17125" cx="239.18958473205566" j="4" val="60" barHeight="63.51375" barWidth="10.917708396911621"></path><path id="SvgjsPath1451" d="M 240.18958473205566 84.685L 240.18958473205566 35.756875Q 240.18958473205566 31.756875 244.18958473205566 31.756875L 245.10729312896729 31.756875Q 249.10729312896729 31.756875 249.10729312896729 35.756875L 249.10729312896729 35.756875L 249.10729312896729 84.685L 249.10729312896729 84.685z" fill="rgba(228,230,239,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskex3ilt4d)" pathTo="M 240.18958473205566 84.685L 240.18958473205566 35.756875Q 240.18958473205566 31.756875 244.18958473205566 31.756875L 245.10729312896729 31.756875Q 249.10729312896729 31.756875 249.10729312896729 35.756875L 249.10729312896729 35.756875L 249.10729312896729 84.685L 249.10729312896729 84.685z" pathFrom="M 240.18958473205566 84.685L 240.18958473205566 84.685L 249.10729312896729 84.685L 249.10729312896729 84.685L 249.10729312896729 84.685L 249.10729312896729 84.685L 249.10729312896729 84.685L 240.18958473205566 84.685" cy="31.756875" cx="282.86041831970215" j="5" val="50" barHeight="52.928125" barWidth="10.917708396911621"></path><path id="SvgjsPath1453" d="M 283.86041831970215 84.685L 283.86041831970215 14.585624999999993Q 283.86041831970215 10.585624999999993 287.86041831970215 10.585624999999993L 288.77812671661377 10.585624999999993Q 292.77812671661377 10.585624999999993 292.77812671661377 14.585624999999993L 292.77812671661377 14.585624999999993L 292.77812671661377 84.685L 292.77812671661377 84.685z" fill="rgba(228,230,239,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskex3ilt4d)" pathTo="M 283.86041831970215 84.685L 283.86041831970215 14.585624999999993Q 283.86041831970215 10.585624999999993 287.86041831970215 10.585624999999993L 288.77812671661377 10.585624999999993Q 292.77812671661377 10.585624999999993 292.77812671661377 14.585624999999993L 292.77812671661377 14.585624999999993L 292.77812671661377 84.685L 292.77812671661377 84.685z" pathFrom="M 283.86041831970215 84.685L 283.86041831970215 84.685L 292.77812671661377 84.685L 292.77812671661377 84.685L 292.77812671661377 84.685L 292.77812671661377 84.685L 292.77812671661377 84.685L 283.86041831970215 84.685" cy="10.585624999999993" cx="326.53125190734863" j="6" val="70" barHeight="74.09937500000001" barWidth="10.917708396911621"></path><path id="SvgjsPath1455" d="M 327.53125190734863 84.685L 327.53125190734863 25.17125Q 327.53125190734863 21.17125 331.53125190734863 21.17125L 332.44896030426025 21.17125Q 336.44896030426025 21.17125 336.44896030426025 25.17125L 336.44896030426025 25.17125L 336.44896030426025 84.685L 336.44896030426025 84.685z" fill="rgba(228,230,239,0.85)" fill-opacity="1" stroke="transparent" stroke-opacity="1" stroke-linecap="round" stroke-width="2" stroke-dasharray="0" class="apexcharts-bar-area" index="1" clip-path="url(#gridRectMaskex3ilt4d)" pathTo="M 327.53125190734863 84.685L 327.53125190734863 25.17125Q 327.53125190734863 21.17125 331.53125190734863 21.17125L 332.44896030426025 21.17125Q 336.44896030426025 21.17125 336.44896030426025 25.17125L 336.44896030426025 25.17125L 336.44896030426025 84.685L 336.44896030426025 84.685z" pathFrom="M 327.53125190734863 84.685L 327.53125190734863 84.685L 336.44896030426025 84.685L 336.44896030426025 84.685L 336.44896030426025 84.685L 336.44896030426025 84.685L 336.44896030426025 84.685L 327.53125190734863 84.685" cy="21.17125" cx="370.2020854949951" j="7" val="60" barHeight="63.51375" barWidth="10.917708396911621"></path><g id="SvgjsG1439" class="apexcharts-bar-goals-markers" style="pointer-events: none"><g id="SvgjsG1440" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1442" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1444" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1446" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1448" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1450" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1452" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1454" className="apexcharts-bar-goals-groups"></g></g></g><g id="SvgjsG1419" class="apexcharts-datalabels" data:realIndex="0"></g><g id="SvgjsG1438" class="apexcharts-datalabels" data:realIndex="1"></g></g><line id="SvgjsLine1504" x1="0" y1="0" x2="349.3666687011719" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1505" x1="0" y1="0" x2="349.3666687011719" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1506" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1507" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1508" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1482" class="apexcharts-yaxis" rel="0" transform="translate(13.633331298828125, 0)"><g id="SvgjsG1483" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1484" font-family="inherit" x="20" y="41.4" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1485">80</tspan><title>80</title></text><text id="SvgjsText1486" font-family="inherit" x="20" y="62.57125" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1487">60</tspan><title>60</title></text><text id="SvgjsText1488" font-family="inherit" x="20" y="83.7425" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1489">40</tspan><title>40</title></text><text id="SvgjsText1490" font-family="inherit" x="20" y="104.91375000000001" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1491">20</tspan><title>20</title></text><text id="SvgjsText1492" font-family="inherit" x="20" y="126.08500000000001" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1493">0</tspan><title>0</title></text></g></g><g id="SvgjsG1407" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 84px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 158, 247);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(228, 230, 239);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                    <!--end::Chart-->
                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 404px; height: 258px;"></div></div><div class="contract-trigger"></div></div></div>
            </div>
            <!--end::Mixed Widget 10-->
        </div>
        <!--end::Col-->
    </div>

@endsection
