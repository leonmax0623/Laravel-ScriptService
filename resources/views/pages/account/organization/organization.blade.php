<title>{{ __('Мои организации') }}</title>
@section('PageName', 'Организации')
@section('breadcrumbs')
    <li class="breadcrumb-item text-gray-600">
        <a href="/" class="text-muted text-hover-primary">
            Рабочая панель
        </a>
    </li>
    <li class="breadcrumb-item text-gray-500">Организации</li>
@endsection
<x-base-layout>
    <div class="card" bis_skin_checked="1">
        <div class="card-header border-0 pt-6" bis_skin_checked="1">
            <form method="GET" action="{{route('organization.organizationSearch')}}" style="margin: 0 !important;">
                <div class="card-title" bis_skin_checked="1">
                    <div class="d-flex align-items-center position-relative my-1" bis_skin_checked="1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                            </svg>
                        </span>
                        <input type="text" name="organizationName" class="form-control form-control-sm form-control-solid w-250px ps-14" placeholder="Название организации" value="<?= (isset($_GET['organizationName']) && $_GET['organizationName']) ? $_GET['organizationName'] : '' ?>">
                        <button type="submit" class="btn btn-primary ms-5 btn-sm">Поиск</button>
                    </div>
                </div>
            </form>
            <div class="card-toolbar" bis_skin_checked="1">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base" bis_skin_checked="1">
                    <button id="addOrganizationButton" type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_add_organization">
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
                                <div class="btn btn-icon btn-sm btn-active-icon-primary btnCloseModal" data-kt-organization-modal-action="close" data-bs-dismiss="modal" bis_skin_checked="1">
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15" bis_skin_checked="1">
                                <form id="kt_modal_add_organization_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('organization.organization') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7 mt-13" id="kt_modal_add_organization_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_organization_header" data-kt-scroll-wrappers="#kt_modal_add_organization_scroll" data-kt-scroll-offset="300px" bis_skin_checked="1" style="max-height: 520px;">
                                        <div class="row g-9">
                                            <div class="col-lg-6 fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                                <label class="fw-bold fs-6 mb-2">ИНН</label>
                                                <input type="number" name="inn" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="ИНН" value="" required>
                                                <div class="issetInn" data-field="password" data-validator="callback"></div>
                                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                            </div>
                                            <div class="col-lg-6 fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                                <label class="fw-bold fs-6 mb-2">Название</label>
                                                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Название" value="" required>
                                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="full_name" class="form-control form-control-solid mb-3 mb-lg-0" value="">
                                        <input type="hidden" name="type" class="form-control form-control-solid mb-3 mb-lg-0" value="">
                                        <div class="row g-9">
                                            <div class="col-lg-6 fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                                <label class="fw-bold fs-6 mb-2">ОГРН</label>
                                                <input type="number" name="ogrn" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="ОГРН" value="" required>
                                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                            </div>
                                            <div class="col-lg-6 fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                                <label class="fw-bold fs-6 mb-2">КПП</label>
                                                <input type="number" name="kpp" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="КПП" value="" required>
                                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                            </div>
                                        </div>
                                        <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                            <label class="fw-bold fs-6 mb-2">Юридический адрес</label>
                                            <input type="text" name="legal_address" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Юридический адрес" value="" required>
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                        </div>
                                        <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                            <label class="fw-bold fs-6 mb-2">Фактический  адрес</label>
                                            <input type="text" name="actual_address" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Фактический адрес" value="" required>
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
                                        <button id="submitOrganization" type="submit" class="btn btn-primary" data-kt-organization-modal-action="submit">
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
                            <th tabindex="0" aria-controls="kt_table_organizations" rowspan="1" colspan="1" >Участвует в проектах</th>
                            <th class="float-end" rowspan="1" colspan="1" aria-label="Actions" >Инструменты</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                        @foreach ($organizations as $organization)
                            <tr class="even">
                                <td style="max-width: 200px;">{{ $organization->name }}</td>
                                <td>{{ $organization->inn }}</td>
                                <td style="max-width: 200px;">
                                    @foreach($organization->projects as $key => $value)
                                        <a href="/account/project/{{ $key }}"><span>{{ $value }}</span></a>
                                    @endforeach
                                </td>
                                <td class="float-end">
                                    <button class="btn btn-primary editOrganization btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_add_organization"
                                            organizationId="{{$organization->organization_id}}"
                                            inn="{{$organization->inn}}"
                                            short_name="{{$organization->name}}"
                                            full_name="{{$organization->full_name}}"
                                            ogrn="{{$organization->ogrn}}"
                                            kpp="{{$organization->kpp}}"
                                            legal_address="{{$organization->legal_address}}"
                                            actual_address="{{$organization->actual_address}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                        </svg>
                                    </button>
                                    <a href="/account/deleteOrganization/{{$organization->organization_id}}" class="btn btn-danger btn-sm">
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
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_table_organizations_paginate" bis_skin_checked="1">
                            {{ $organizations->appends(['organizationName' => request()->organizationName])->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--@section('script')--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        var oldInn = '';
        $(document).ready(function () {
            $('[data-bs-target="#kt_modal_add_organization"]').on('click', function (){
                $("input[name='inn']").val('');
                $('.issetInn').text('');
                oldInn = '';
                $("input[name='name']").val('');
                $("input[name='kpp']").val('');
                $("input[name='ogrn']").val('');
                $("input[name='actual_address']").val('');
                $("input[name='legal_address']").val('');
                $("input[name='full_name']").val('');
                $("input[name='type']").val('add');
            });

            $('#addOrganizationButton').on('click', function (){
                $('#kt_modal_add_organization_header h2').text('Добавить организацию');
                $('#kt_modal_add_organization_form button span').text('Добавить');

            });

            $('.editOrganization').on('click', function (){
                $('#kt_modal_add_organization_header h2').text('Редактировать организацию');
                $('#kt_modal_add_organization_form button span').text('Редактировать');
                if ($(this).attr('inn') != "") {
                    $("input[name='inn']").val($(this).attr('inn'));
                    oldInn = $(this).attr('inn');
                    $("input[name='name']").val($(this).attr('short_name'));
                    $("input[name='kpp']").val($(this).attr('kpp'));
                    $("input[name='ogrn']").val($(this).attr('ogrn'));
                    $("input[name='actual_address']").val($(this).attr('actual_address'));
                    $("input[name='legal_address']").val($(this).attr('legal_address'));
                    $("input[name='full_name']").val($(this).attr('full_name'));
                    $("input[name='type']").val('edit');
                }
            });

            $('input[name="legalAddressFlag"]').change(function () {
                if ($(this).is(":checked")) {
                    $("input[name='actual_address']").val($("input[name='legal_address']").val());
                } else {
                    $("input[name='actual_address']").val('');
                }
            });

            $('input[name="inn"]').on('keydown', function(e){
                $('.issetInn').hide();
                $('#submitOrganization').removeAttr("disabled");

                var _this = this;
                setTimeout(function (){
                    var inn = $(_this).val().trim();
                    var type = $("input[name='type']").val();
                    if (inn.trim() == '' || type == 'edit' && oldInn == inn){
                        return false;
                    }
                    $.ajax({
                        url: "/api/issetUserOrganization",
                        async: false,
                        type: 'GET',
                        data: {
                            inn: inn,
                            user_id: <?= auth()->user()->id ?>,
                        },
                        success: function (data) {
                            var k = JSON.parse(data);
                            if (k.error) {
                                $('.issetInn').css('font-size', '0.925rem').css('color', '#F1416C');
                                $('.issetInn').text('Организация уже существует');
                                $('.issetInn').show();
                                $('#submitOrganization').prop('disabled', true);
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
                }, 500);
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

</x-base-layout>
