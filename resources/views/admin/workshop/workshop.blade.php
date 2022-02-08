@extends('layout.admin')

@section('title', 'Цеха')

@section('content')

    <div class="modal fade" id="kt_modal_add_workshop" tabindex="-1" aria-hidden="true" bis_skin_checked="1">
        <div class="modal-dialog modal-dialog-centered mw-650px" bis_skin_checked="1">
            <div class="modal-content" bis_skin_checked="1">
                <div class="modal-header" id="kt_modal_add_workshop_header" bis_skin_checked="1">
                    <h2 class="fw-bolder">Редактировать</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary btnCloseModal" data-kt-workshop-modal-action="close" data-bs-dismiss="modal" bis_skin_checked="1">
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                                        </svg>
                                    </span>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7" bis_skin_checked="1">
                    <form id="kt_modal_add_workshop_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('admin.saveWorkshop') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_workshop_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_workshop_header" data-kt-scroll-wrappers="#kt_modal_add_workshop_scroll" data-kt-scroll-offset="300px" bis_skin_checked="1" style="max-height: 520px;">
                            <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                <label class="fw-bold fs-6 mb-2">Название</label>
                                <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Название" value="" required>
                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                            </div>
                            <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                <label class="fw-bold fs-6 mb-2">Проект</label>
                                <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                    <select name="project_id" aria-label="Проект" data-control="select2" data-placeholder="Выберите проект" data-kt-select2="true" data-dropdown-parent="#kt_modal_add_workshop_form" class="form-select form-select-solid form-select-lg fw-bold" required>
                                        <?php if (isset($projects)){ ?>
                                            @foreach($projects as $key => $value)
                                                <option value="{{ $projects[$key]->project_id }}">{{ $projects[$key]->project_name }}</option>
                                            @endforeach
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                            </div>
                            <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                <label class="fw-bold fs-6 mb-2">Объект</label>
                                <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                    <select name="object_id" aria-label="Объект" data-control="select2" data-placeholder="Выберите объект" data-kt-select2="true" data-dropdown-parent="#kt_modal_add_workshop_form" class="form-select form-select-solid form-select-lg fw-bold" required>

                                    </select>
                                </div>
                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                            </div>
                        </div>
                        <input type="hidden" name="workshop_id" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="">
                        <div class="text-center pt-15" bis_skin_checked="1">
                            <button type="reset" class="btn btn-light me-3" data-kt-workshop-modal-action="cancel">Сбросить</button>
                            <button id="submitWorkshop" type="submit" class="btn btn-primary" data-kt-workshop-modal-action="submit">
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
                    <form method="GET" action="{{route('admin.workshopSearch')}}">
                        <div class="mb-10" bis_skin_checked="1">
                            <label class="form-label fs-6 fw-bold">Email:</label>
                            <input type="text" class="form-control  fw-bolder " data-placeholder="Введите Email" name="email" value="{{ isset($_GET['email']) ? $_GET['email'] : '' }}"/>
                        </div>
                        <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                            <label class="fw-bold fs-6 mb-2">Проект</label>
                            <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                <select name="projectSearchId" aria-label="Проект" data-control="select2" data-placeholder="Выберите проект" data-kt-select2="true" data-dropdown-parent="#kt_menu_1" class="form-select form-select-lg fw-bold" required>
                                    <?php if (isset($projects)){ ?>
                                    @foreach($projects as $key => $value)
                                        <option value="{{ $projects[$key]->project_id }}">{{ $projects[$key]->project_name }}</option>
                                    @endforeach
                                    <?php } ?>
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
                                <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Специалист</th>
                                <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Проект</th>
                                <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Объект</th>
                                <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >ID Цеха</th>
                                <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Наименование цеха</th>
                                <th rowspan="1" colspan="1" aria-label="Actions" >Инструменты</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                        @foreach ($allWorkshops as $workshop)
                            <tr class="even">
                                <td class="d-flex align-items-center">
                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3" bis_skin_checked="1">
                                        <a href="/metronic8/demo1/../demo1/apps/user-management/users/view.html"></a>
                                    </div>
                                    <div class="d-flex flex-column" bis_skin_checked="1">
                                        <a href="/admin/users/{{$workshop->user_id}}" class="text-gray-800 text-hover-primary mb-1">{{ $workshop->last_name }} {{ $workshop->first_name }}</a>
                                        <span>{{ $workshop->email }}</span>
                                    </div>
                                </td>
                                <td >{{ $workshop->project_name }}</td>
                                <td >{{ $workshop->object_name }}</td>
                                <td >{{ $workshop->workshop_id }}</td>
                                <td >{{ $workshop->name }}</td>
                                <td>
                                    <button class="btn btn-primary editWorkshop"
                                            data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_add_workshop"
                                            workshop_id="{{$workshop->workshop_id}}"
                                            short_name="{{$workshop->name}}"
                                            user_id="{{$workshop->user_id}}"
                                            project_id="{{$workshop->project_id}}"
                                            object_id="{{$workshop->object_id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                        </svg>
                                    </button>
                                    <button class="btn btn-danger preDeleteWorkshop"  data-bs-toggle="modal" workshop_id="{{ $workshop->workshop_id }}" data-bs-target="#kt_modal_1" title="Удалить объект">
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
                            {{ $allWorkshops->links('vendor.pagination.bootstrap-4') }}
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
                    <p>Вы уверены, что хотите удалить цех?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light notDeleteWorkshop" data-bs-dismiss="modal">Нет</button>
                    <button type="button" class="btn btn-primary deleteWorkshop">Да</button>
                </div>
            </div>
        </div>
    </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    var deleteWorkshopId = 0;
    $(document).on('click','.preDeleteWorkshop',function (){
        deleteWorkshopId = Number($(this).attr('workshop_id'));
    });
    $(document).on('click','.notDeleteWorkshop',function (){
        deleteWorkshopId = 0;
    });
    $(document).on('click','.deleteWorkshop',function (){
        if(deleteWorkshopId != 0){
            $.ajax({
                url: "/admin/deleteWorkshop",
                async: false,
                type: 'GET',
                data: {
                    deleteWorkshopId: deleteWorkshopId,
                },
                success: function(data) {
                    location.reload();
                },
                error: function(err) {}
            });
        }
    });
    $(document).on('ready', function () {
        var projectSearchIdFilter = '<?php echo isset($_GET['projectSearchId']) ? $_GET['projectSearchId'] : ''; ?>';
        $('[name="projectSearchId"]').val(projectSearchIdFilter);

        $('.editWorkshop').on('click', function (){
            if ($(this).attr('workshop_id') != "") {
                $('#kt_modal_add_workshop_header h2').text('Редактировать');
                $('#kt_modal_add_workshop_form button span').text('Редактировать');
                $("input[name='workshop_id']").val($(this).attr('workshop_id'));
                $("input[name='name']").val($(this).attr('short_name'));
                $("[name='project_id']").val($(this).attr('project_id'));
                let projectId = $(this).attr('project_id');
                if(projectId > 0){
                    $.ajax({
                        url: "/admin/getProjectObject",
                        async: false,
                        type: 'GET',
                        data: {
                            projectId: projectId,
                        },
                        success: function(data) {
                            $('[name="object_id"]').empty();

                            let html = '';
                            for (let i = 0; i < data.length; i++) {
                                html += '<option value="' + data[i].object_id + '">' + data[i].object_name + '</option>';
                            }

                            $('[name="object_id"]').append(html);
                        },
                        error: function(err) {}
                    });
                }
                $("[name='object_id']").val($(this).attr('object_id'));
            }
        });

        $('[name="project_id"]').on('change', function(){
            let projectId = $(this).val();
            if(projectId > 0){
                $.ajax({
                    url: "/admin/getProjectObject",
                    async: false,
                    type: 'GET',
                    data: {
                        projectId: projectId,
                    },
                    success: function(data) {
                        $('[name="object_id"]').empty();

                        let html = '';
                        for (let i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].object_id + '">' + data[i].object_name + '</option>';
                        }

                        $('[name="object_id"]').append(html);
                        $('[name="object_id"]').val('');
                    },
                    error: function(err) {}
                });
            }
        });
    });
</script>
