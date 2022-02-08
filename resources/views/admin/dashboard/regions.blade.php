@extends('layout.admin')

@section('title', 'Регионы')

@section('content')

    <div class="card" bis_skin_checked="1">
        <div class="card-header border-0 pt-6" bis_skin_checked="1">
            <form method="GET" action="{{route('admin.regionSearch')}}" style="margin: 0 !important;">
                <div class="card-title" bis_skin_checked="1">
                    <div class="d-flex align-items-center position-relative my-1" bis_skin_checked="1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                            </svg>
                        </span>
                        <input type="text" name="regionName" class="form-control form-control-solid w-250px ps-14" placeholder="Название региона" value="<?= (isset($_GET['regionName']) && $_GET['regionName']) ? $_GET['regionName'] : '' ?>">
                        <button type="submit" class="btn btn-primary ms-5">Поиск</button>
                    </div>
                </div>
            </form>
            <div class="card-toolbar" bis_skin_checked="1">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base" bis_skin_checked="1">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_organization">
                        Добавить регион</button>
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
                                <h2 class="fw-bolder">Добавить регион</h2>
                                <div class="btn btn-icon btn-sm btn-active-icon-primary btnCloseModal" data-kt-organization-modal-action="close" data-bs-dismiss="modal" bis_skin_checked="1">
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7" bis_skin_checked="1">
                                <form id="kt_modal_add_organization_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('admin.getRegions') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_organization_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_organization_header" data-kt-scroll-wrappers="#kt_modal_add_organization_scroll" data-kt-scroll-offset="300px" bis_skin_checked="1" style="max-height: 520px;">
                                        <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                            <label class="fw-bold fs-6 mb-2">Название региона</label>
                                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Название региона" value="" required>
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_organization_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_organization_header" data-kt-scroll-wrappers="#kt_modal_add_organization_scroll" data-kt-scroll-offset="300px" bis_skin_checked="1" style="max-height: 520px;">
                                        <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                            <label class="fw-bold fs-6 mb-2">КФ стратификации</label>
                                            <input type="number" name="temperature_stratification" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="КФ стратификации" value="" required>
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="city_id" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="">
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
                            <th tabindex="0" aria-controls="kt_table_organizations" rowspan="1" colspan="1">Регион, Край, Область</th>
                            <th tabindex="0" aria-controls="kt_table_organizations" rowspan="1" colspan="1">КФ стратификации</th>
                            <th class="float-end" rowspan="1" colspan="1" aria-label="Actions" >Инструменты</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                        @foreach ($regions as $region)
                            <tr class="even">
                                <td style="max-width: 200px;">{{ $region->name }}</td>
                                <td>{{ $region->temperature_stratification }}</td>
                                <td class="float-end">
                                    <button class="btn btn-primary editOrganization"
                                            data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_add_organization"
                                            city_id="{{$region->city_id}}"
                                            temperature_stratification="{{$region->temperature_stratification}}"
                                            short_name="{{$region->name}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                        </svg>
                                    </button>
                                    <a href="/admin/directory/deleteRegionData/{{$region->city_id}}" class="btn btn-danger">
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
                            {{ $regions->appends(['regionName' => request()->name])->links('vendor.pagination.bootstrap-4') }}
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
        $('[data-bs-target="#kt_modal_add_organization"]').on('click', function (){
            $("input[name='name']").val('');
            $("input[name='temperature_stratification']").val('');
            $("input[name='city_id']").val('');
            $('#kt_modal_add_organization_header h2').text('Добавить регион');
            $('#kt_modal_add_organization_form button span').text('Добавить');
        });

        $('.editOrganization').on('click', function (){
            if ($(this).attr('city_id') != "") {
                $("input[name='name']").val($(this).attr('short_name'));
                $("input[name='city_id']").val($(this).attr('city_id'));
                $("input[name='temperature_stratification']").val($(this).attr('temperature_stratification'));
                $('#kt_modal_add_organization_header h2').text('Редактировать регион');
                $('#kt_modal_add_organization_form button span').text('Редактировать');
            }
        });
    });

</script>
