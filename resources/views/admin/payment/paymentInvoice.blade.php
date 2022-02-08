@extends('layout.admin')

@section('title', 'Счета на оплату')

@section('content')
    <div class="card" bis_skin_checked="1">
        <div class="d-flex justify-content-end mt-5" data-kt-user-table-toolbar="base" bis_skin_checked="1">
            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black"></path>
                    </svg>
                </span>
                Фильтр</button>
            <div id="kt_menu_1" class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" bis_skin_checked="1">
                <div class="px-7 py-5" bis_skin_checked="1">
                    <div class="fs-5 text-dark fw-bolder" bis_skin_checked="1">Фильтр поиска</div>
                </div>
                <div class="separator border-gray-200" bis_skin_checked="1"></div>
                <div class="px-7 py-5" data-kt-user-table-filter="form" bis_skin_checked="1">
                    <form method="GET" action="">
                        <div class="mb-10" bis_skin_checked="1">
                            <label class="form-label fs-6 fw-bold">Название компании:</label>
                            <input type="text" class="form-control" data-placeholder="Название компании" name="company_name" value="{{ isset($_GET['company_name']) ? $_GET['company_name'] : '' }}"/>
                        </div>
                        <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                            <label class="fw-bold fs-6 mb-2">Статус</label>
                            <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                <select name="status" aria-label="Статус" data-placeholder="Выберите статус" class="form-select form-select-lg fw-bold">
                                    <option value="">Выберите статус</option>
                                    <option value="0">В ожидании</option>
                                    <option value="1">Оплачено</option>
                                </select>
                            </div>
                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                        </div>
                        <div class="d-flex justify-content-end" bis_skin_checked="1">
                            <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Поиск</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body pt-0" bis_skin_checked="1">
            <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" bis_skin_checked="1"><div class="table-responsive" bis_skin_checked="1">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Номер счета</th>
                                <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Компания</th>
                                <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >ИНН</th>
                                <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Тариф</th>
                                <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Сумма</th>
                                <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Статус</th>
                                <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Дата счета</th>
                                <th rowspan="1" colspan="1" aria-label="Actions" class="float-end">Инструменты</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                        @foreach ($allPayments as $payment)
                            <tr class="even">
                                <td>{{ $payment->payment_id }}</td>
                                <td>{{ $payment->name }}</td>
                                <td>{{ $payment->inn }}</td>
                                <td>Базовый</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->status == 0 ? 'В ожидании' : 'Оплачено' }}</td>
                                <td>{{ $payment->created_at }}</td>
                                <td class="float-end">
                                    <?php if ($payment->status == 0){ ?>
                                        <button class="btn btn-success btn-sm confirmPayment" payment_id="{{ $payment->payment_id }}">
                                            Оплачено
                                            <span class="svg-icon svg-icon-muted svg-icon-1hx">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.5" d="M9.63433 11.4343L5.45001 7.25C5.0358 6.83579 5.0358 6.16421 5.45001 5.75C5.86423 5.33579 6.5358 5.33579 6.95001 5.75L12.4929 11.2929C12.8834 11.6834 12.8834 12.3166 12.4929 12.7071L6.95001 18.25C6.5358 18.6642 5.86423 18.6642 5.45001 18.25C5.0358 17.8358 5.0358 17.1642 5.45001 16.75L9.63433 12.5657C9.94675 12.2533 9.94675 11.7467 9.63433 11.4343Z" fill="black"/>
                                                    <path d="M15.6343 11.4343L11.45 7.25C11.0358 6.83579 11.0358 6.16421 11.45 5.75C11.8642 5.33579 12.5358 5.33579 12.95 5.75L18.4929 11.2929C18.8834 11.6834 18.8834 12.3166 18.4929 12.7071L12.95 18.25C12.5358 18.6642 11.8642 18.6642 11.45 18.25C11.0358 17.8358 11.0358 17.1642 11.45 16.75L15.6343 12.5657C15.9467 12.2533 15.9467 11.7467 15.6343 11.4343Z" fill="black"/>
                                                </svg>
                                            </span>
                                        </button>
                                    <?php } ?>
                                    <button class="btn btn-danger preDeletePayment"  data-bs-toggle="modal" payment_id="{{ $payment->payment_id }}" data-bs-target="#kt_modal_1" title="Удалить">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                        </svg>
                                    </button>
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
                            {{ $allPayments->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Подтвердите удаление</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                </div>

                <div class="modal-body">
                    <p>Вы уверены, что хотите удалить запись?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light notDeletePayment" data-bs-dismiss="modal">Нет</button>
                    <button type="button" class="btn btn-primary deletePayment">Да</button>
                </div>
            </div>
        </div>
    </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    var deletePaymentId = 0;
    $(document).on('click','.preDeletePayment',function (){
        deletePaymentId = Number($(this).attr('payment_id'));
    });
    $(document).on('click','.notDeletePayment',function (){
        deletePaymentId = 0;
    });
    $(document).on('click','.deletePayment',function (){
        if(deletePaymentId != 0){
            $.ajax({
                url: "/admin/deletePayment",
                async: false,
                type: 'GET',
                data: {
                    deletePaymentId: deletePaymentId,
                },
                success: function(data) {
                    location.reload();
                },
                error: function(err) {}
            });
        }
    });

    $(document).on('click','.confirmPayment',function (){
        let paymentId = $(this).attr('payment_id');
        if(paymentId.trim() != ''){
            $.ajax({
                url: "/admin/confirmPayment",
                async: false,
                type: 'GET',
                data: {
                    paymentId: paymentId,
                },
                success: function(data) {
                    location.reload();
                },
                error: function(err) {}
            });
        }
    });
</script>
