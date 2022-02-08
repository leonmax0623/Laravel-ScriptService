<title>{{ $objectInfo->object_name }}</title>
@section('PageName',$objectInfo->object_name)
@section('breadcrumbs')
    <li class="breadcrumb-item text-gray-600">
        <a href="/" class="text-muted text-hover-primary">
            Рабочая панель
        </a>
    </li>
    <li class="breadcrumb-item text-gray-600">
        <a href="/account/project" class="text-muted text-hover-primary">
            Мои проекты
        </a>
    </li>
    <?php if (isset($project_info)) { ?>
        <li class="breadcrumb-item text-gray-600">
            <a href="/account/project/{{ $project_info->project_id }}" class="text-muted text-hover-primary">
                {{ $project_info->project_name }}
            </a>
        </li>
    <?php } ?>
    <li class="breadcrumb-item text-gray-500">{{ $objectInfo->object_name }}</li>
@endsection
<?php
$flagTitle = 0;
$flagContent = 0;
$flagIsa = 0;
$classActive = 'active';
?>
<style>
    .activeTr{
        background: #eff2f5;
    }
    table.dataTable > thead > tr > td:not(.sorting_disabled), table.dataTable > thead > tr > th:not(.sorting_disabled){
        padding-right: 0px !important;
    }
</style>
<x-base-layout>
    <div>
        <div class="d-flex flex-column flex-md-row rounded border">
            <ul class="nav nav-tabs nav-pills border-0 flex-row flex-md-column me-5">
                @if(count($objectWorkshop) > 0)
                    @foreach($objectWorkshop as $workshop)
                        @if($flagTitle == 0)
                            <?php $flagTitle++; $classActive = 'active'?>
                        @else
                            <?php  $classActive = ''?>
                        @endif
                            <li class="nav-item w-md-200px me-0 workshopClick">
                                <a class="nav-link {{$classActive}}" data-bs-toggle="tab" href="#kt_vtab_pane_{{$workshop->workshop_id}}">{{$workshop->name}}</a>
                            </li>
                    @endforeach
                        <li class="nav-item w-md-200px me-0">
                            <a class="nav-link addNewWorkshop" data-bs-toggle="modal" data-bs-target="#kt_modal_create_workshop" style="cursor: pointer">+ Добавить</a>
                        </li>
                @else
                    <li class="nav-item w-md-200px me-0">
                        <a class="nav-link active addNewWorkshop" data-bs-toggle="modal" data-bs-target="#kt_modal_create_workshop" style="cursor: pointer">+ Добавить</a>
                    </li>
                @endif
            </ul>
            @if(count($objectWorkshop) > 0)
                <div class="tab-content" id="nav-tabContent">
                @foreach($objectWorkshop as $workshop)
                        @if($flagContent == 0)
                            <?php $flagContent++; $classActive = 'active'?>
                        @else
                            <?php $classActive = ''?>
                        @endif
                            <div class="tab-pane fade show  {{$classActive}}" id="kt_vtab_pane_{{$workshop->workshop_id}}" role="tabpanel">
                                <div class="row mb-5" style="overflow: hidden !important;">
                                    <div class="col-lg-7">
                                        <div class="card card-flush" style="width: 103%;">

                                        <div class="card-header mt-5" bis_skin_checked="1">
                                            <!--begin::Card title-->
                                            <div class="card-title flex-column" bis_skin_checked="1">
                                                <h3 class="fw-bolder mb-1">Источники загрязнения (ИЗА) </h3>
                                            </div>
                                            <!--begin::Card title-->
                                            <!--begin::Card toolbar-->
                                            <div class="card-toolbar my-1" bis_skin_checked="1">
                                                <!--begin::Select-->
                                                <!--end::Select-->
                                                <!--begin::Select-->
                                                <!--end::Select-->
                                                <!--begin::Search-->
                                                <div class="d-flex align-items-center position-relative my-1" bis_skin_checked="1">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                    <a class="btn btn-primary btn-sm addIza" workshop_id="{{$workshop->workshop_id}}" data-bs-toggle="modal" data-bs-target="#kt_modal_create_iza">Добавить ИЗА</a>
                                                </div>
                                                <!--end::Search-->
                                            </div>
                                            <!--begin::Card toolbar-->
                                        </div>

                                        <div class="card-body pt-0" bis_skin_checked="1">
                                            <!--begin::Table container-->
                                            <div class="table-responsive" bis_skin_checked="1" style="overflow:hidden !important;">
                                                <!--begin::Table-->
                                                <div id="kt_profile_overview_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" bis_skin_checked="1"  ><div class="table-responsive" bis_skin_checked="1" style="overflow:hidden !important;">
                                                        <table id="kt_profile_overview_table" class="table_isa table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                                                            <!--begin::Head-->
                                                            <thead class="fs-7 text-gray-500  text-uppercase">
                                                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                                <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">Номер</th>
                                                                <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1"  >Наименование</th>
                                                                <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" style="width: 50px" >Тип</th>
                                                                <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Инструменты</th>
                                                            </tr>
                                                            </thead>
                                                            <!--end::Head-->
                                                            <!--begin::Body-->
                                                            <tbody class="text-gray-500 fw-bold">
                                                            @foreach($objectIsa as $isa)
                                                                @if($isa->workshop_id == $workshop->workshop_id)
                                                                    <tr style="cursor: pointer" class="even showIvBlock" isa_id = "{{$isa->isa_id}}">
                                                                        <td style="padding: 5px !important;">{{$isa->isa_number}}</td>
                                                                        <td>{{$isa->isa_name}}</td>
                                                                        <td>{{$isa->name}}</td>
                                                                        <td>
                                                                            <a title="Копировать ИЗА" href="/account/project/{{$project_id}}/object/{{$objectInfo->object_id}}/copyIsa/{{$isa->isa_id}}"  class="btn btn-sm btn-warning ">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                                                                                    <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
                                                                                </svg>
                                                                            </a>
                                                                            <button data-bs-toggle="modal" data-bs-target="#kt_modal_create_iza" isa_id = "{{$isa->isa_id}}"  class="btn btn-sm btn-primary editIsa">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                                                                </svg>
                                                                            </button>
                                                                            <a href="/account/project/{{$project_id}}/object/{{$objectInfo->object_id}}/deleteIsa/{{$isa->isa_id}}"  class="btn btn-sm btn-danger ">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                                </svg>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                            <!--end::Body-->
                                                        </table>
                                                    </div>
                                                </div>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Table container-->
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div id="ivBlock" class=" card card-flush " bis_skin_checked="1" style="width: 103%;margin-left: 4px;">

                                            <div class="card-header mt-5" bis_skin_checked="1">
                                                <!--begin::Card title-->
                                                <div class="card-title flex-column" bis_skin_checked="1">
                                                    <h3 class="fw-bolder mb-1">Источники выделения</h3>
                                                </div>
                                                <!--begin::Card title-->
                                                <!--begin::Card toolbar-->
                                                <div class="card-toolbar my-1" bis_skin_checked="1">
                                                    <!--begin::Select-->
                                                    <!--end::Select-->
                                                    <!--begin::Select-->
                                                    <!--end::Select-->
                                                    <!--begin::Search-->
                                                    <div class="d-flex align-items-center position-relative my-1" bis_skin_checked="1">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                        <a style="display:none;" class="btn btn-primary btn-sm addIv" isa_id="" data-bs-toggle="modal" data-bs-target="#kt_modal_create_iv">Добавить</a>
                                                    </div>
                                                    <!--end::Search-->
                                                </div>
                                                <!--begin::Card toolbar-->
                                            </div>

                                            <div class="card-body pt-0" bis_skin_checked="1">
                                                <!--begin::Table container-->
                                                <div class="table-responsive" bis_skin_checked="1" >
                                                    <!--begin::Table-->
                                                    <div id="kt_profile_overview_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" bis_skin_checked="1"><div class="table-responsive" bis_skin_checked="1" style="overflow: hidden !important;">
                                                            <table id="kt_profile_overview_table" class="iv_table table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                                                                <!--begin::Head-->
                                                                <thead class="fs-7 text-gray-500  text-uppercase">
                                                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                                    <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Номер</th>
                                                                    <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" style="width: 80px;" >Название</th>
                                                                    <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" style="float: right;">Инструменты</th>
                                                                </tr>
                                                                </thead>
                                                                <!--end::Head-->
                                                                <!--begin::Body-->
                                                                <tbody class="text-gray-500 fw-bold">
                                                                </tbody>
                                                                <!--end::Body-->
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!--end::Table-->
                                                </div>
                                                <!--end::Table container-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-xxl-12" style="overflow: hidden !important;">
                                    <div class="col-lg-12">
                                        <div class="card card-flush  " bis_skin_checked="1">
                                            <div class="d-flex justify-content-end mt-5 mb-5" style="margin-right: 1%;">
                                                <button data-bs-toggle="modal" data-bs-target="#kt_modal_create_workshop"  workshop_id = "{{$workshop->workshop_id}}" workshop_name = "{{$workshop->name}}" class="btn btn-sm btn-primary editWorkshop" style="margin-right: 1%;">
                                                    Редактировать цех
                                                </button>
                                                <a href="/account/project/{{$project_id}}/object/{{$objectInfo->object_id}}/deleteWorkshop/{{$workshop->workshop_id}}" class="btn btn-sm btn-danger ">
                                                    Удалить цех
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <div class="modal fade" id="kt_modal_create_workshop" tabindex="-1" bis_skin_checked="1" style="display: none;" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px" bis_skin_checked="1">
            <!--begin::Modal content-->
            <div class="modal-content rounded" bis_skin_checked="1">
                <!--begin::Modal header-->
                <div class="modal-header" bis_skin_checked="1">
                    <h2>Добавить цех</h2>
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5" bis_skin_checked="1">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-links d-flex flex-column" id="kt_modal_create_workshop_stepper" data-kt-stepper="true" bis_skin_checked="1">
                        <!--begin::Container-->
                        <div class="container" bis_skin_checked="1">
                            <form class="mx-auto w-100 mw-800px  fv-plugins-bootstrap5 fv-plugins-framework needs-validation" novalidate id="kt_modal_create_workshop_form" method="POST" action="/account/createWorkshop">
                                @csrf
                                @method('PUT')
                                <input type="hidden" required name="project_id" class="form-control form-control-lg form-control-solid" value="{{$project_id}}" >
                                <input type="hidden" required name="object_id" class="form-control form-control-lg form-control-solid" value="{{$objectInfo->object_id}}" >
                                <input type="hidden" required name="workshop_id" class="form-control form-control-lg form-control-solid" value="" >
                                <div class="row mb-6" bis_skin_checked="1">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Название цеха</label>
                                    <div class="col-lg-8 fv-row" bis_skin_checked="1">
                                        <input type="text"  name="workshop_name" class="form-control form-control-lg form-control-solid" value="" placeholder="Название цеха" required/>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" bis_skin_checked="1">
                                    <button type="submit" class="btn btn-primary addWorkshop" id="SaveWorkshop">
                                        <span class="indicator-label">Сохранить</span>
                                    </button>
                                </div>
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
    <div class="modal fade" id="kt_modal_create_iv"  bis_skin_checked="1" style="display: none;" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-800px" bis_skin_checked="1">
            <!--begin::Modal content-->
            <div class="modal-content rounded" bis_skin_checked="1">
                <!--begin::Modal header-->
                <div class="modal-header" bis_skin_checked="1">
                    <h2>Добавить источники выделения</h2>
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
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5" bis_skin_checked="1">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-links d-flex flex-column" id="kt_modal_create_iv_stepper" data-kt-stepper="true" bis_skin_checked="1">
                        <!--begin::Container-->
                        <div class="container" bis_skin_checked="1">
                            <form class="mx-auto w-100 mw-800px  fv-plugins-bootstrap5 fv-plugins-framework needs-validation" id="kt_modal_create_iv_form" method="POST" action="/account/createEmissionSources">
                                @csrf
                                @method('PUT')
                                <input type="hidden" required name="project_id" class="form-control form-control-lg form-control-solid" value="{{$project_id}}" >
                                <input type="hidden" required name="object_id" class="form-control form-control-lg form-control-solid" value="{{$objectInfo->object_id}}" >
                                <input type="hidden" required name="isa_id" class="form-control form-control-lg form-control-solid" value="" >
                                <input type="hidden" required name="iv_id" class="form-control form-control-lg form-control-solid" value="" >
                                <div class="row mb-6" bis_skin_checked="1">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">ИВ</label>
                                    <div class="col-lg-8 fv-row" bis_skin_checked="1">
                                        <select name="iv_number" id="iv_number" required data-placeholder="Выберите ИВ" class="form-select form-select-solid form-select-lg fw-bold" style="display: none">
                                            <option value="">Выберите ИВ</option>
                                            <?php if (isset($allSanPin)){ ?>
                                            @foreach($allSanPin as $sanpin)
                                                <option sinpin_name = "{{$sanpin->name}}" value="{{ $sanpin->code }}">{{$sanpin->code}} - {{ $sanpin->name }}</option>
                                            @endforeach
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-6" bis_skin_checked="1" style="display: none;">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Название ИВ</label>
                                    <div class="col-lg-8 fv-row" bis_skin_checked="1">
                                        <input type="text"  name="iv_name" class="form-control form-control-lg form-control-solid" value="" placeholder="Название источника выделения" required/>
                                    </div>
                                </div>
{{--                                <div class="row mb-6" bis_skin_checked="1">--}}
{{--                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Выделение г/c</label>--}}
{{--                                    <div class="col-lg-8 fv-row" bis_skin_checked="1">--}}
{{--                                        <input type="number"  name="iv_highlighting" class="form-control form-control-lg form-control-solid" value="" placeholder="Выделение г/c" required/>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row mb-6" bis_skin_checked="1">--}}
{{--                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Валовое выделение т/год</label>--}}
{{--                                    <div class="col-lg-8 fv-row" bis_skin_checked="1">--}}
{{--                                        <input type="number"  name="iv_gross_allocation" class="form-control form-control-lg form-control-solid" value="" placeholder="Валовое выделение т/год" required/>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="row mb-6" bis_skin_checked="1">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Время работы в день, ч/день</label>
                                    <div class="col-lg-8 fv-row" bis_skin_checked="1">
                                        <input type="number"  name="iv_working_days" class="form-control form-control-lg form-control-solid" value="" placeholder="Время работы в день, ч/день" required/>
                                    </div>
                                </div>
                                <div class="row mb-6" bis_skin_checked="1">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Время работы в год, ч/год</label>
                                    <div class="col-lg-8 fv-row" bis_skin_checked="1">
                                        <input type="number"  name="iv_working_hours" class="form-control form-control-lg form-control-solid" value="" placeholder="Время работы в год, ч/год" required/>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" bis_skin_checked="1">
                                    <button type="submit" class="btn btn-primary addNewIv" id="SaveWorkshop">
                                        <span class="indicator-label">Добавить</span>
                                    </button>
                                </div>
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
    <div class="modal fade" id="kt_modal_create_iza" tabindex="-1" bis_skin_checked="1" style="display: none;" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-1000px" bis_skin_checked="1">
            <!--begin::Modal content-->
            <div class="modal-content rounded" bis_skin_checked="1">
                <!--begin::Modal header-->
                <div class="modal-header" bis_skin_checked="1">
                    <h2>Добавление ИЗА</h2>
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
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5" bis_skin_checked="1">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-links d-flex flex-column" id="kt_modal_create_iza_stepper" data-kt-stepper="true" bis_skin_checked="1">
                        <!--begin::Container-->
                        <div class="container" bis_skin_checked="1">
{{--                            <form action="/account/editObject" class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework" method="post" id="kt_contact_form">--}}

                            <form class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework" id="kt_modal_create_iza_form" method="POST" action="/account/createIsa">
                                @csrf
                                @method('PUT')
                                <input type="hidden" required name="project_id" class="form-control form-control-lg form-control-solid" value="{{$project_id}}" >
                                <input type="hidden" required name="object_id" class="form-control form-control-lg form-control-solid" value="{{$objectInfo->object_id}}" >
                                <input type="hidden" required name="workshop_id" class="form-control form-control-lg form-control-solid" value="{{isset($workshop->workshop_id) ? $workshop->workshop_id : 0}}" >
                                <input type="hidden"  name="isa_id" class="form-control form-control-lg form-control-solid" value="" >
                                <div class="row mb-5">
                                    <div class="col-lg-6" bis_skin_checked="1">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Название ИЗА</label>
                                        <div class="col-lg-12 fv-row" bis_skin_checked="1">
                                            <input type="text" required  name="isa_name" class="form-control form-control-lg form-control-solid" value="" placeholder="Название ИЗА "/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" bis_skin_checked="1">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Номер ИЗА</label>
                                        <div class="col-lg-12 fv-row" bis_skin_checked="1">
                                            <input type="number"  name="isa_number" class="form-control form-control-lg form-control-solid" value="" placeholder="Номер ИЗА " required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" bis_skin_checked="1">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Тип источника ИЗА</label>
                                        <div class="col-lg-12 fv-row" bis_skin_checked="1">
                                            <select name="isa_type" required data-placeholder="Тип источника ИЗА" class="form-select form-select-solid">
                                                <option selected value="">Выберите тип источника ИЗА</option>
                                                @foreach($allSourcesOfAirPollutionType as $type)
                                                <option  value="{{$type->source_id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" bis_skin_checked="1">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Источник ИЗА</label>
                                        <div class="col-lg-12 fv-row" bis_skin_checked="1">
                                            <input type="text"  name="isa_source" class="form-control form-control-lg form-control-solid" value="" placeholder="Источник ИЗА"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" bis_skin_checked="1">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Высота, м</label>
                                        <div class="col-lg-12 fv-row" bis_skin_checked="1">
                                            <input type="number"  name="isa_height" class="form-control form-control-lg form-control-solid" value="" placeholder="Высота, м"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 isOrganized" bis_skin_checked="1">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Диаметр ИЗА, м</label>
                                        <div class="col-lg-12 fv-row " bis_skin_checked="1">
                                            <input type="number"  name="isa_diameter" class="form-control form-control-lg form-control-solid" value="" placeholder="Диаметр ИЗА, м" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6" bis_skin_checked="1">
                                        <label class="col-lg-12 col-form-label fw-bold fs-6">Координаты источника в ЛСК, м</label>
                                        <div class="row">
                                            <div class="col-lg-3" bis_skin_checked="1">
                                                <input type="number"  name="isa_x1" class="form-control form-control-lg form-control-solid" value="" placeholder="X1" />
                                            </div>
                                            <div class="col-lg-3" bis_skin_checked="1">
                                                <input type="number"  name="isa_y1" class="form-control form-control-lg form-control-solid" value="" placeholder="Y1" />
                                            </div>
                                            <div class="col-lg-3 notOrganized" bis_skin_checked="1">
                                                <input type="number"  name="isa_x2" class="form-control form-control-lg form-control-solid" value="" placeholder="X2" />
                                            </div>
                                            <div class="col-lg-3 notOrganized" bis_skin_checked="1">
                                                <input type="number"  name="isa_y2" class="form-control form-control-lg form-control-solid" value="" placeholder="Y2" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 notOrganized" bis_skin_checked="1">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Ширина ИЗА, м</label>
                                        <div class="col-lg-12 fv-row" bis_skin_checked="1">
                                            <input type="number"  name="isa_width" class="form-control form-control-lg form-control-solid" value="" placeholder="Ширина ИЗА, м" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 isOrganized" bis_skin_checked="1">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Скорость ГВС, м/с</label>
                                        <div class="col-lg-12 fv-row" bis_skin_checked="1">
                                            <input type="number"  name="isa_speed" class="form-control form-control-lg form-control-solid" value="" placeholder="Скорость ГВС, м/с" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 isOrganized" bis_skin_checked="1">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Объем ГВС, м3/с</label>
                                        <div class="col-lg-12 fv-row" bis_skin_checked="1">
                                            <input type="number"  name="isa_volume" class="form-control form-control-lg form-control-solid" value="" placeholder="Объем ГВС, м3/с" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 isOrganized" bis_skin_checked="1">
                                        <label class="col-lg-12 col-form-label fw-bold fs-6">Температура, ͒С</label>
                                        <div class="col-lg-12 fv-row" bis_skin_checked="1">
                                            <input type="number"  name="isa_temperature" class="form-control form-control-lg form-control-solid" value="" placeholder="Температура, ͒С" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 isOrganized" bis_skin_checked="1">
                                        <label class="col-lg-12 col-form-label fw-bold fs-6">Плотность кг/м3</label>
                                        <div class="col-lg-12 fv-row" bis_skin_checked="1">
                                            <input type="number"  name="isa_density" class="form-control form-control-lg form-control-solid" value="1,29" placeholder="Плотность кг/м3" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6" bis_skin_checked="1">
                                        <label class="col-lg-12 col-form-label fw-bold fs-6">Коэффициент поправки на рельеф</label>
                                        <div class="col-lg-12 fv-row" bis_skin_checked="1">
                                            <input type="number"  name="isa_terrain_correction_factor" class="form-control form-control-lg form-control-solid" value="1" placeholder="Коэффициент поправки на рельеф" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex justify-content-end" bis_skin_checked="1">
                                        <button type="submit" class="btn btn-primary addIsa" id="SaveWorkshop">
                                            <span class="indicator-label">Добавить</span>
                                        </button>
                                    </div>
                                </div>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#iv_number").select2({
                dropdownParent: $("#kt_modal_create_iv")
            });
            $('#iv_number').on('change', function (e) {
                var code_id = $(this).select2('val');
                var code_data = $(this).select2('data')[0].element.attributes;
                if(code_data.length > 0){
                    for(var i = 0; i < code_data.length; i++){
                        if(code_data[i].name == "sinpin_name"){
                            $("#kt_modal_create_iv input[name='iv_name']").val(code_data[i].value);
                        }
                    }
                }
            });
            // $("#iv_number").select2();
            var firstTrIsaBlockId = $(".tab-pane.active .table_isa tbody tr:first").attr('isa_id');
            if(typeof firstTrIsaBlockId !== "undefined"){
                $('#kt_profile_overview_table_wrapper tr[isa_id="'+firstTrIsaBlockId+'"]').addClass('activeTr');
                $('.addIv').show();
                $('.addIv').attr('isa_id',firstTrIsaBlockId);
                openIvBlock(firstTrIsaBlockId);
            }else{
                $('.addIv').hide();
            }
            $('.addIv').on('click', function (){
                $('#kt_modal_create_iv h2').text('Добавить источники выделения');
                $('#kt_modal_create_iv .addNewIv').text('Добавить');
                $("#kt_modal_create_iv input[name='iv_number']").val('');
                $("#kt_modal_create_iv input[name='iv_name']").val('');
                // $("#kt_modal_create_iv input[name='iv_highlighting']").val('');
                // $("#kt_modal_create_iv input[name='iv_gross_allocation']").val('');
                $("#kt_modal_create_iv input[name='iv_working_days']").val('');
                $("#kt_modal_create_iv input[name='iv_working_hours']").val('');
                $("#kt_modal_create_iv input[name='iv_id']").val('');
                $("#kt_modal_create_iv input[name='isa_id']").val($(this).attr('isa_id'));
            });
            $('.showIvBlock').on('click', function (){
                $('.addIv').attr('isa_id',$(this).attr('isa_id'));
                $('table tr').removeClass('activeTr');
                $(this).addClass('activeTr');
                openIvBlock($(this).attr('isa_id'));
            });
            $('.workshopClick').on('click', function (){
                setTimeout(function (){
                    $('.iv_table tbody').empty();
                    var firstTrIsaBlockId = $(".tab-pane.active .table_isa tbody tr:first").attr('isa_id');
                    $('table tr').removeClass('activeTr');
                    if(typeof firstTrIsaBlockId !== "undefined"){
                        $('#kt_profile_overview_table_wrapper tr[isa_id="'+firstTrIsaBlockId+'"]').addClass('activeTr');
                        openIvBlock(firstTrIsaBlockId);
                        $('.addIv').show();
                        $('.addIv').attr('isa_id',firstTrIsaBlockId);
                    }else{
                        $('.addIv').hide();
                    }
                },200);
            });
            $(document).on('click','.addNewWorkshop', function (){
                $('.nav.nav-tabs a').removeClass('active');
                $(this).addClass('active');
                $('#kt_modal_create_workshop h2').text('Добавить цех');
                $('#kt_modal_create_workshop .addWorkshop').text('Сохранить');
                $("#kt_modal_create_workshop input[name='workshop_name']").val('');
                $("#kt_modal_create_workshop input[name='workshop_id']").val('');
            });
            $(document).on('click','.editWorkshop', function (){
                $('#kt_modal_create_workshop h2').text('Редактировать цех');
                $('#kt_modal_create_workshop .addWorkshop').text('Редактировать');
                $("#kt_modal_create_workshop input[name='workshop_name']").val($(this).attr('workshop_name'));
                $("#kt_modal_create_workshop input[name='workshop_id']").val($(this).attr('workshop_id'));
            });
            $(document).on('click','.editIv', function (){
                if(typeof ivObj.data !== "undefined"){
                    if(ivObj.data.length > 0) {
                        for(var i = 0; i < ivObj.data.length; i++) {
                            if(ivObj.data[i].emission_sources_id == $(this).attr('iv_id')) {
                                $('#kt_modal_create_iv h2').text('Редактировать источники выделения');
                                $('#kt_modal_create_iv .addNewIv').text('Сохранить');
                                $("#kt_modal_create_iv input[name='iv_number']").val(ivObj.data[i].emission_sources_number);
                                $("#kt_modal_create_iv input[name='iv_name']").val(ivObj.data[i].emission_sources_name);
                                // $("#kt_modal_create_iv input[name='iv_highlighting']").val(ivObj.data[i].emission_sources_highlighting);
                                // $("#kt_modal_create_iv input[name='iv_gross_allocation']").val(ivObj.data[i].emission_sources_gross_allocation);
                                $("#kt_modal_create_iv input[name='iv_working_days']").val(ivObj.data[i].emission_sources_working_days);
                                $("#kt_modal_create_iv input[name='iv_working_hours']").val(ivObj.data[i].emission_sources_working_hours);
                                $("#kt_modal_create_iv input[name='iv_id']").val(ivObj.data[i].emission_sources_id);
                                $("#kt_modal_create_iv input[name='isa_id']").val(ivObj.data[i].isa_id);
                            }
                        }
                    }
                }
            })
            $('.addIza').on('click', function (){
                $('#kt_modal_create_iza h2').text('Добавление ИЗА');
                $('#kt_modal_create_iza .addIsa').text('Добавить');
                $("#kt_modal_create_iza input[name='workshop_id']").val($(this).attr('workshop_id'));
                $("#kt_modal_create_iza select[name='isa_type']").val('');
                $("#kt_modal_create_iza select[name='isa_type']").change();
                $("#kt_modal_create_iza input[name='isa_density']").val('');
                $("#kt_modal_create_iza input[name='isa_diameter']").val('');
                $("#kt_modal_create_iza input[name='isa_height']").val('');
                $("#kt_modal_create_iza input[name='isa_name']").val('');
                $("#kt_modal_create_iza input[name='isa_number']").val('');
                $("#kt_modal_create_iza input[name='isa_source']").val('');
                $("#kt_modal_create_iza input[name='isa_speed']").val('');
                $("#kt_modal_create_iza input[name='isa_temperature']").val('');
                $("#kt_modal_create_iza input[name='isa_terrain_correction_factor']").val('1');
                $("#kt_modal_create_iza input[name='isa_volume']").val('');
                $("#kt_modal_create_iza input[name='isa_x1']").val('');
                $("#kt_modal_create_iza input[name='isa_x2']").val('');
                $("#kt_modal_create_iza input[name='isa_y1']").val('');
                $("#kt_modal_create_iza input[name='isa_y2']").val('');
                $("#kt_modal_create_iza input[name='isa_width']").val('');
                $("#kt_modal_create_iza input[name='isa_id']").val('');
            });
            $('.editIsa').on('click', function (){
                $('#kt_modal_create_iza h2').text('Редактирование ИЗА');
                $('#kt_modal_create_iza .addIsa').text('Сохранить');
                $.ajax({
                    url: "/api/getIsaObject",
                    async: false,
                    type: 'GET',
                    data: {
                        isa_id: $(this).attr('isa_id'),
                    },
                    success: function (data) {
                        var k = JSON.parse(data);
                        $("#kt_modal_create_iza select[name='isa_type']").val(k.data.isa_type);
                        $("#kt_modal_create_iza select[name='isa_type']").change();
                        $("#kt_modal_create_iza input[name='isa_density']").val(k.data.isa_density);
                        $("#kt_modal_create_iza input[name='isa_diameter']").val(k.data.isa_diameter);
                        $("#kt_modal_create_iza input[name='isa_height']").val(k.data.isa_height);
                        $("#kt_modal_create_iza input[name='isa_name']").val(k.data.isa_name);
                        $("#kt_modal_create_iza input[name='isa_number']").val(k.data.isa_number);
                        $("#kt_modal_create_iza input[name='isa_source']").val(k.data.isa_source);
                        $("#kt_modal_create_iza input[name='isa_speed']").val(k.data.isa_speed);
                        $("#kt_modal_create_iza input[name='isa_temperature']").val(k.data.isa_temperature);
                        $("#kt_modal_create_iza input[name='isa_terrain_correction_factor']").val(k.data.isa_terrain_correction_factor);
                        $("#kt_modal_create_iza input[name='isa_volume']").val(k.data.isa_volume);
                        $("#kt_modal_create_iza input[name='isa_x1']").val(k.data.isa_x1);
                        $("#kt_modal_create_iza input[name='isa_x2']").val(k.data.isa_x2);
                        $("#kt_modal_create_iza input[name='isa_y1']").val(k.data.isa_y1);
                        $("#kt_modal_create_iza input[name='isa_y2']").val(k.data.isa_y2);
                        $("#kt_modal_create_iza input[name='isa_width']").val(k.data.isa_width);
                        $("#kt_modal_create_iza input[name='isa_id']").val(k.data.isa_id);
                        $("#kt_modal_create_iza input[name='workshop_id']").val(k.data.workshop_id);


                        var k = JSON.parse(data)
                        console.log('k',k);
                    },
                    error: function (err) {
                    }
                });
            });
            $(document).change('[name="isa_type"]', function(e){
                if($('[name="isa_type"]').val() == 1){
                    $('.isOrganized').show();
                    $('.notOrganized').hide();

                }else if($('[name="isa_type"]').val() == ''){
                    $('.isOrganized').show();
                    $('.notOrganized').show();
                }else{
                    $('.isOrganized').hide();
                    $('.notOrganized').show();
                }
            });
        });
        var ivObj = {};
        function openIvBlock(isa_id){
            $('.iv_table tbody').empty();
            $.ajax({
                url: "/api/getEmissionSources",
                async: false,
                type: 'GET',
                data: {
                    isa_id: isa_id,
                },
                success: function (data) {
                    var k = JSON.parse(data);
                    ivObj = k;
                    if (k.error) {
                        $('.addIv').attr('isa_id',isa_id);
                    }else{
                        var html = '';
                        if(k.data.length > 0) {
                            for(var i = 0; i < k.data.length; i++) {
                                html += '<tr class="even">' +
                                    '<td>' + k.data[i].emission_sources_number + '</td>' +
                                    '<td>' + k.data[i].emission_sources_name + '</td>' +
                                    '<td style="float: right;">' +
                                    '<button data-bs-toggle="modal" data-bs-target="#kt_modal_create_iv" iv_id = "' + k.data[i].emission_sources_id + '" class="btn btn-sm btn-primary editIv" style="margin-right:3px;">' +
                                    '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">' +
                                    ' <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>' +
                                    '</svg>' +
                                    '</button>' +
                                    '<a href="/account/deleteEmissionSources/{{$project_id}}/{{$objectInfo->object_id}}/' + k.data[i].emission_sources_id + '"  class="btn btn-sm btn-danger ">' +
                                    '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">' +
                                    '<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>' +
                                    '</svg>' +
                                    '</a>' +
                                    '</td>' +
                                    '</tr>';
                            }
                        }
                        $('.iv_table tbody').append(html);
                    }
                },
                error: function (err) {
                    $('.addIv').attr('isa_id',firstTrIsaBlockId);

                }
            });

        }
    </script>
</x-base-layout>
