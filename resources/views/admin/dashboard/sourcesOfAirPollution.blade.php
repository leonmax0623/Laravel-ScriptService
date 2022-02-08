@extends('layout.admin')

@section('title', 'ИЗА')

@section('content')
    <div class="modal fade" tabindex="-1" id="kt_modal_delete_source">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Подтвердите удаление</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                </div>
                <div class="modal-body">
                    <p>Вы уверены, что хотите удалить ИЗА?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light notDeleteSource" data-bs-dismiss="modal">Нет</button>
                    <a type="button" class="btn btn-primary deleteSource">Да</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card" bis_skin_checked="1">
        <div class="card-header border-0 pt-6" bis_skin_checked="1">
{{--            <form method="GET" action="{{route('admin.regionSearch')}}" style="margin: 0 !important;">--}}
                <div class="card-title" bis_skin_checked="1">
{{--                    <div class="d-flex align-items-center position-relative my-1" bis_skin_checked="1">--}}
{{--                        <span class="svg-icon svg-icon-1 position-absolute ms-6">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">--}}
{{--                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>--}}
{{--                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>--}}
{{--                            </svg>--}}
{{--                        </span>--}}
{{--                        <input type="text" name="regionName" class="form-control form-control-solid w-250px ps-14" placeholder="Название региона" value="<?= (isset($_GET['organizationName']) && $_GET['organizationName']) ? $_GET['organizationName'] : '' ?>">--}}
{{--                        <button type="submit" class="btn btn-primary ms-5">Поиск</button>--}}
{{--                    </div>--}}
                </div>
{{--            </form>--}}
            <div class="card-toolbar" bis_skin_checked="1">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base" bis_skin_checked="1">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_source">
                        Добавить ИЗА</button>
                </div>
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected" bis_skin_checked="1">
                    <div class="fw-bolder me-5" bis_skin_checked="1">
                        <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                    <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                </div>
                <div class="modal fade" id="kt_modal_add_source" tabindex="-1" aria-hidden="true" bis_skin_checked="1">
                    <div class="modal-dialog modal-dialog-centered mw-650px" bis_skin_checked="1">
                        <div class="modal-content" bis_skin_checked="1">
                            <div class="modal-header" id="kt_modal_add_source_header" bis_skin_checked="1">
                                <h2 class="fw-bolder">Добавить ИЗА</h2>
                                <div class="btn btn-icon btn-sm btn-active-icon-primary btnCloseModal" data-kt-source-modal-action="close" bis_skin_checked="1">
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7" bis_skin_checked="1">
                                <form id="kt_modal_add_source_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('admin.getSOAP') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_source_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_source_header" data-kt-scroll-wrappers="#kt_modal_add_source_scroll" data-kt-scroll-offset="300px" bis_skin_checked="1" style="max-height: 520px;">
                                        <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                            <label class="fw-bold fs-6 mb-2">Тип ИЗА</label>
                                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Тип ИЗА" value="" required>
                                            <div class="issetName" data-field="password" data-validator="callback"></div>
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="source_id" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="">
                                    <input type="hidden" name="type" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="">
                                    <div class="text-center pt-15" bis_skin_checked="1">
                                        <button type="reset" class="btn btn-light me-3" data-kt-source-modal-action="cancel">Сбросить</button>
                                        <button id="submitSOAP" type="submit" class="btn btn-primary" data-kt-source-modal-action="submit">
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
            <div id="kt_table_sources_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" bis_skin_checked="1"><div class="table-responsive" bis_skin_checked="1">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_sources">
                        <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th tabindex="0" aria-controls="kt_table_sources" rowspan="1" colspan="1">Тип ИЗА</th>
                            <th class="float-end" rowspan="1" colspan="1" aria-label="Actions" >Инструменты</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                        @foreach ($sources as $source)
                            <tr class="even">
                                <td style="max-width: 200px;">{{ $source->name }}</td>
                                <td class="float-end">
                                    <button class="btn btn-primary editSource"
                                            data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_add_source"
                                            source_id="{{$source->source_id}}"
                                            short_name="{{$source->name}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                            </svg>
                                    </button>
                                    <a href="/admin/directory/deleteSOAP/{{$source->source_id}}" class="btn btn-danger deleteSourceContent" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_source">
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
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_table_sources_paginate" bis_skin_checked="1">
                            {{ $sources->appends(['sourceName' => request()->name])->links('vendor.pagination.bootstrap-4') }}
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
    var oldName = '';
    var queryTimeout = false;
    $(document).ready(function () {
        $('.deleteSourceContent').on('click', function () {
            $('.deleteSource').attr('href', $(this).attr('href'));
        });

        $('[data-bs-target="#kt_modal_add_source"]').on('click', function (){
            $('.issetName').text('');
            $("input[name='type']").val('add');
            $("input[name='name']").val('');
            $("input[name='source_id']").val('');
            oldName = '';
            $('#kt_modal_add_source_header h2').text('Добавить ИЗА');
            $('#kt_modal_add_source_form button span').text('Добавить');
        });

        $('.editSource').on('click', function (){
            if ($(this).attr('source_id') != "") {
                $("input[name='type']").val('edit');
                $("input[name='name']").val($(this).attr('short_name'));
                oldName = $(this).attr('short_name');
                $("input[name='source_id']").val($(this).attr('source_id'));
                $('#kt_modal_add_source_header h2').text('Редактировать ИЗА');
                $('#kt_modal_add_source_form button span').text('Редактировать');
            }
        });

        $('.btnCloseModal').on('click', function (){
            $('#kt_modal_add_source').css('display', 'none');
            $('#kt_modal_add_source').removeClass('show');
            $('#kt_modal_add_source').removeAttr('role');
            $('.modal-backdrop').remove();
            $('body').removeClass('modal-open');
        });

        $('input[name="name"]').on('keydown', function(e){
            $('.issetName').hide();
            $('#submitSOAP').removeAttr("disabled");

            var _this = this;

            if (queryTimeout){
                clearTimeout(queryTimeout);
                queryTimeout = false;
            }

            queryTimeout = setTimeout(function (){
                var name = $(_this).val().trim();
                var type = $("input[name='type']").val();
                if (name.trim() == '' || type == 'edit' && oldName == name){
                    return false;
                }
                $.ajax({
                    url: "/api/issetSOAPName",
                    async: false,
                    type: 'GET',
                    data: {
                        name: name,
                    },
                    success: function (data) {
                        var k = JSON.parse(data);
                        if (k.error) {
                            $('.issetName').css('font-size', '0.925rem').css('color', '#F1416C');
                            $('.issetName').text('Тип уже существует');
                            $('.issetName').show();
                            $('#submitSOAP').prop('disabled', true);
                        } else {
                            // $('.issetName').css('font-size', '0.925rem').css('color', '#F1416C');
                            // $('.issetName').text('Название можно использовать');
                            // $('.issetName').show();
                            // $('#submitTTS').removeAttr("disabled");
                        }
                    },
                    error: function (err) {
                    }
                });
            }, 1000);
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
            if (type != 'error') {
                Swal.fire({
                    text: text,
                    icon: type,
                    buttonsStyling: false,
                    confirmButtonText: "Закрыть",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
        });
    </script>
<?php } ?>
