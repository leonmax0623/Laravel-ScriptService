<!--begin::Basic info-->
<?php
    $price = 0;
    foreach ($activeModule as $module){
        $price+= $module->module_price;
    }
    $discount = 0;
    if (isset(auth()->user()->discount)){
        $discount = auth()->user()->discount;
    }
?>
<div>
    <div class="row gy-10 gx-xl-10">
        <!--begin::Col-->
        <div class="col-xl-8">
            <!--begin::Earnings-->
            <div class="card card-xxl-stretch mb-5 mb-xxl-10">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">
                        <h3>Баланс счета</h3>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pb-0">
                    <span class="fs-5 fw-bold text-gray-600 pb-5 d-block">Вы являетесь пользователем системы с {{date('Y-m-d',strtotime($dateCreate))}}</span>
                    <!--begin::Left Section-->
                    <div class="d-flex flex-wrap justify-content-between pb-6">
                        <!--begin::Row-->
                        <div class="d-flex flex-wrap">
                            <!--begin::Col-->
                            <div class="border border-dashed border-gray-300 w-200px rounded my-3 p-4 me-6">
															<span class="fs-2x fw-bolder text-gray-800 lh-1">
																<span data-kt-countup="true" data-kt-countup-prefix="$" class="counted">{{isset(auth()->user()->balance) ? floor(auth()->user()->balance) : 0}} руб.</span>
															</span>
                                <span class="fs-6 fw-bold text-gray-400 d-block lh-1 pt-2">Текущий баланс</span>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="border border-dashed border-gray-300 w-250px rounded my-3 p-4 me-6">
                                <span class="fs-2x fw-bolder text-gray-800 lh-1">
                                @if($discount > 0)
                                    <span class="counted" data-kt-countup="true" data-kt-countup-value="80"></span>{{($userTariff+$price) - (($userTariff+$price) / (100 / $discount))}} руб./мес.</span>
                                @else
                                    <span class="counted" data-kt-countup="true" data-kt-countup-value="80"></span>{{$userTariff+$price}} руб./мес.</span>
                                @endif
                                <span class="fs-6 fw-bold text-gray-400 d-block lh-1 pt-2">Стоимость тарифа</span>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="border border-dashed border-gray-300 w-200px rounded my-3 p-4 me-6">
															<span class="fs-2x fw-bolder text-gray-800 lh-1">
																<span data-kt-countup="true" data-kt-countup-value="1,240" data-kt-countup-prefix="$" class="counted">{{$useTariffDay}}</span>
															</span>
                                <span class="fs-6 fw-bold text-gray-400 d-block lh-1 pt-2">Дней осталось</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Left Section-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Earnings-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::Invoices-->
            <div class="card card-xxl-stretch mb-5 mb-xxl-10">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="text-gray-800">Пополнение счета в системе</h3>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <form class="form" method="POST" action="{{ route('finance.makePaymentInvoice') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="flex-grow-6 mb-2 p-2">
                                <input type="number" class="form-control" name="amount" placeholder="Сумма пополнения, руб." step="0.01" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-11" style="padding-left: calc(var(--bs-gutter-x) * .3) !important;">
                                    <select class="form-select" name="payType" required>
                                        <option value="1">Оплата картой</option>
                                        <option value="2">Сформировать счет для юр. лица</option>
                                    </select>
                                </div>
                                <div class="col-lg-1 p-0">
                                    <button type="submit" class="btn btn-primary btn-icon flex-shrink-0">
                                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"/>
                                            <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"/>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Left Section-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Invoices-->
        </div>
        <!--end::Col-->
    </div>
    <div class="row g-xxl-9" style="overflow: hidden !important;">
        <div class="col-xxl-6">
            <div class="card">
                <!--begin::Header-->
                <div class="card-header card-header-stretch">
                    <!--begin::Title-->
                    <div class="card-title">
                        <h3 class="m-0 text-gray-800">История движения средств</h3>
                    </div>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar m-0">
                        <!--begin::Tab nav-->
                        <form>
                        <ul class="nav nav-stretch fs-5 fw-bold nav-line-tabs border-transparent" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a  onchange="this.form.submit()"  id="kt_referrals_year_tab" class="nav-link text-active-gray-800 active" data-bs-toggle="tab" role="tab" href="#kt_referrals_1">Все</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a id="kt_referrals_2019_tab" class="nav-link text-active-gray-800 me-4" data-bs-toggle="tab" role="tab" href="#kt_referrals_2">Пополнения</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a id="kt_referrals_2018_tab" class="nav-link text-active-gray-800 me-4" data-bs-toggle="tab" role="tab" href="#kt_referrals_3">Списания</a>
                            </li>
                        </ul>
                        </form>
                        <!--end::Tab nav-->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Tab Content-->
                <div id="kt_referred_users_tab_content" class="tab-content">
                    <!--begin::Tab panel-->
                    <div id="kt_referrals_1" class="card-body p-0 tab-pane fade show active" role="tabpanel">
                        <div class="table-responsive" style="overflow: hidden;">
                            <!--begin::Table-->
                            <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                <!--begin::Thead-->
                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">
                                <tr>
                                    <th class="min-w-175px ps-9">Дата</th>
                                    <th class="min-w-150px px-0">Детали</th>
                                    <th class="min-w-125px">Сумма</th>
                                    <th class="min-w-125px">Баланс после транзакции</th>
                                </tr>
                                </thead>
                                <!--end::Thead-->
                                <!--begin::Tbody-->
                                <tbody class="fs-6 fw-bold text-gray-600">
                                @foreach($financeActivity as $finance)
                                    <tr>
                                        <td class="ps-9">{{$finance->date_create}}</td>
                                        @if($finance->module_id != null)
                                            <td class="ps-0">Использование модуля {{$finance->module_name}}</td>
                                        @elseif($finance->title != null)
                                            <td class="ps-0">{{$finance->title}}</td>
                                        @elseif($finance->tariff_id != null)
                                            <td class="ps-0">Списание за тариф "{{$finance->name}}"</td>
                                        @endif
                                        <td class="{{$finance->sum > 0 ? 'text-success' : 'text-danger'}}">{{number_format((float)$finance->sum, 2, '.', '')}} руб.</td>
                                        <td>{{number_format((float)$finance->user_balance, 2, '.', '')}} руб.</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <!--end::Tbody-->
                            </table>
                            <div class="dataTables_paginate paging_simple_numbers p-5"  bis_skin_checked="1" style="overflow:hidden;">
                                {{ $financeActivity->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                    <div id="kt_referrals_2" class="card-body p-0 tab-pane fade " role="tabpanel">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                <!--begin::Thead-->
                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">
                                <tr>
                                    <th class="min-w-175px ps-9">Дата</th>
                                    <th class="min-w-150px px-0">Детали</th>
                                    <th class="min-w-125px">Сумма</th>
                                    <th class="min-w-125px">Баланс после транзакции</th>
                                </tr>
                                </thead>
                                <!--end::Thead-->
                                <!--begin::Tbody-->
                                <tbody class="fs-6 fw-bold text-gray-600">
                                @foreach($allFinanceActivity as $finance)
                                    @if($finance->sum > 0)
                                        <tr>
                                            <td class="ps-9">{{$finance->date_create}}</td>
                                            @if($finance->module_id != null)
                                                <td class="ps-0">Использование модуля {{$finance->module_name}}</td>
                                            @elseif($finance->title != null)
                                                <td class="ps-0">{{$finance->title}}</td>
                                            @elseif($finance->tariff_id != null)
                                                <td class="ps-0">Списание за тариф "{{$finance->name}}"</td>
                                            @endif
                                            <td class="{{$finance->sum > 0 ? 'text-success' : 'text-danger'}}">{{number_format((float)$finance->sum, 2, '.', '')}} руб.</td>
                                            <td>{{number_format((float)$finance->user_balance, 2, '.', '')}} руб.</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                                <!--end::Tbody-->
                            </table>
                        </div>
                    </div>
                    <div id="kt_referrals_3" class="card-body p-0 tab-pane fade" role="tabpanel">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                <!--begin::Thead-->
                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">
                                <tr>
                                    <th class="min-w-175px ps-9">Дата</th>
                                    <th class="min-w-150px px-0">Детали</th>
                                    <th class="min-w-125px">Сумма</th>
                                    <th class="min-w-125px">Баланс после транзакции</th>
                                </tr>
                                </thead>
                                <!--end::Thead-->
                                <!--begin::Tbody-->
                                <tbody class="fs-6 fw-bold text-gray-600">
                                @foreach($allFinanceActivity as $finance)
                                    @if($finance->sum < 0)
                                    <tr>
                                        <td class="ps-9">{{$finance->date_create}}</td>
                                        @if($finance->module_id != null)
                                            <td class="ps-0">Использование модуля {{$finance->module_name}}</td>
                                        @elseif($finance->title != null)
                                            <td class="ps-0">{{$finance->title}}</td>
                                        @elseif($finance->tariff_id != null)
                                            <td class="ps-0">Списание за тариф "{{$finance->name}}"</td>
                                        @endif
                                        <td class="{{$finance->sum > 0 ? 'text-success' : 'text-danger'}}">{{number_format((float)$finance->sum, 2, '.', '')}} руб.</td>
                                        <td>{{number_format((float)$finance->user_balance, 2, '.', '')}} руб.</td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                                <!--end::Tbody-->
                            </table>
                        </div>
                    </div>

                </div>
                <!--end::Tab Content-->
            </div>
        </div>
        <div class="col-xxl-6">
            <div class="card">
                <!--begin::Header-->
                <div class="card-header card-header-stretch">
                    <!--begin::Title-->
                    <div class="card-title">
                        <h3 class="m-0 text-gray-800">Список подключенных модулей</h3>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Tab Content-->
                <div id="kt_referred_users_tab_content" class="tab-content">
                    <!--begin::Tab panel-->
                    <div id="kt_referrals_1" class="card-body p-0 tab-pane fade show active" role="tabpanel">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                <!--begin::Thead-->
                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">
                                <tr>
                                    <th class="min-w-175px ps-9">Название модуля</th>
                                    <th class="min-w-150px px-0">Дата подключения</th>
                                    <th class="min-w-125px">Стоимость в месяц</th>
                                </tr>
                                </thead>
                                <!--end::Thead-->
                                <!--begin::Tbody-->
                                <tbody class="fs-6 fw-bold text-gray-600">
                                @foreach($activeModule as $module)
                                    <tr>
                                        <td>{{$module->module_name}}</td>
                                        <td>{{$module->dateConnect}}</td>
                                        <td>{{number_format((float)$module->module_price, 2, '.', '')}} руб.</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <!--end::Tbody-->
                            </table>
                                <div class="col">
                                    <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                                        <span class="fs-4 fw-bold text-primary pb-1 px-2">Стоимость по всем модулям</span>
                                        <span class="fs-lg-2tx fw-bolder d-flex justify-content-center">
                                        @if($discount > 0)
                                            <span data-kt-countup="true" data-kt-countup-value="783&quot;" class="counted">{{$price - ($price / (100 / $discount))}} руб./мес.</span></span>
                                        @else
                                            <span data-kt-countup="true" data-kt-countup-value="783&quot;" class="counted">{{$price}} руб./мес.</span></span>
                                        @endif
                                    </div>
                                </div>
                            <!--end::Table-->
                        </div>
                    </div>
                </div>
                <!--end::Tab Content-->
            </div>
        </div>
    </div>

</div>
<!--end::Basic info-->

<?php if (isset($_GET['needToAddCompany'])) { ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        baseUrl = window.location.href.split("?")[0];
        window.history.pushState('name', '', baseUrl);
        let text = 'Добавьте реквизиты своей компании, чтобы выставлять счета автоматически';
        let type = 'info';
        $(document).ready(function () {
            Swal.fire({
                title: '<span class="svg-icon svg-icon-success svg-icon-5hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">' +
                        '<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"/>' +
                    '<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"/>' +
                    '<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"/>' +
                    '</svg></span>',
                text: text,
                buttonsStyling: false,
                confirmButtonText: "<a href='/account/settings/company' style='text-decoration: none; color: white;'>Перейти</a>",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        });
    </script>
<?php } ?>
