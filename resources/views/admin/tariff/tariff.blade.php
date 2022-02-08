@extends('layout.admin')

@section('title', 'Тарифы')

@section('content')

    <div class="card" bis_skin_checked="1">
        <div class="card-toolbar mt-5" bis_skin_checked="1">
            <div class="modal fade" id="kt_modal_add_tariff" tabindex="-1" aria-hidden="true" bis_skin_checked="1">
                <div class="modal-dialog modal-dialog-centered mw-650px" bis_skin_checked="1">
                    <div class="modal-content" bis_skin_checked="1">
                        <div class="modal-header" id="kt_modal_add_tariff_header" bis_skin_checked="1">
                            <h2 class="fw-bolder">Добавить город</h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary btnCloseModal" data-kt-tariff-modal-action="close" data-bs-dismiss="modal" bis_skin_checked="1">
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7" bis_skin_checked="1">
                            <form id="kt_modal_add_tariff_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('admin.saveTariff') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_tariff_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_tariff_header" data-kt-scroll-wrappers="#kt_modal_add_tariff_scroll" data-kt-scroll-offset="300px" bis_skin_checked="1" style="max-height: 520px;">
                                    <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                        <label class="fw-bold fs-6 mb-2">Название тарифа</label>
                                        <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Название тарифа" value="" required>
                                        <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                        <label class="fw-bold fs-6 mb-2">Стоимость руб./сутки</label>
                                        <input type="number" name="price" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Стоимость руб./сутки" value="" required>
                                        <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                    </div>
                                </div>
                                <input type="hidden" name="tariff_id" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="">
                                <div class="text-center pt-15" bis_skin_checked="1">
                                    <button type="reset" class="btn btn-light me-3" data-kt-tariff-modal-action="cancel">Сбросить</button>
                                    <button id="submitTariff" type="submit" class="btn btn-primary" data-kt-tariff-modal-action="submit">
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
        <div class="card-body pt-0" bis_skin_checked="1">
            <div id="kt_table_tariff_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" bis_skin_checked="1"><div class="table-responsive" bis_skin_checked="1">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_tariff">
                        <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th tabindex="0" aria-controls="kt_table_tariff" rowspan="1" colspan="1">Название тарифа</th>
                            <th tabindex="0" aria-controls="kt_table_tariff" rowspan="1" colspan="1">Стоимость</th>
                            <th tabindex="0" aria-controls="kt_table_tariff" rowspan="1" colspan="1">Активен</th>
                            <th class="float-end" rowspan="1" colspan="1" aria-label="Actions" >Инструменты</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                        <?php foreach ($allTariffs as $tariff){ ?>
                        <tr class="even">
                            <td>{{ $tariff->name }}</td>
                            <td>{{ $tariff->price }} руб./сутки</td>
                            <td>{{ $tariff->is_active == 1 ? 'Да' : 'Нет' }}</td>
                            <td class="float-end">
                                <button class="btn btn-primary editTariff"
                                        data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_add_tariff"
                                        tariff_id="{{$tariff->tariff_id}}"
                                        short_name="{{$tariff->name}}"
                                        price="{{$tariff->price}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="row" bis_skin_checked="1">
                    <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start" bis_skin_checked="1"></div>
                    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end" bis_skin_checked="1">
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_table_tariff_paginate" bis_skin_checked="1">
                            {{ $allTariffs->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--@section('script')--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.editTariff').on('click', function (){
            if ($(this).attr('tariff_id') != "") {
                $('#kt_modal_add_tariff_header h2').text('Редактировать');
                $('#kt_modal_add_tariff_form button span').text('Редактировать');
                $("input[name='name']").val($(this).attr('short_name'));
                $("input[name='price']").val($(this).attr('price'));
                $("input[name='tariff_id']").val($(this).attr('tariff_id'));
            }
        });
    });

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php if (isset($message) && $message != "") { ?>
<script>
    let text = '<?php echo $message['text']; ?>';
    let type = '<?php echo $message['type']; ?>';
    $(document).ready(function () {
        Swal.fire({
            text: text,
            icon: type,
            buttonsStyling: false,
            confirmButtonText: "Закрыть",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
    });
</script>
<?php } ?>
