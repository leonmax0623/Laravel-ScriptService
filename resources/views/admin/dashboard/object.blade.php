@extends('layout.admin')

@section('title', 'Объекты')

@section('content')
    <!--begin::Card-->
    <div class="card" bis_skin_checked="1">
        <div class="card-body pt-0" bis_skin_checked="1">
            <!--begin::Table-->
            <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" bis_skin_checked="1"><div class="table-responsive" bis_skin_checked="1">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Специалист</th>
                            <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" style="width: 30px;" >Организация</th>
                            <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1"  >Проект</th>
                            <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >ID Объекта</th>
                            <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" >Наименование объекта</th>
                            <th rowspan="1" colspan="1" aria-label="Actions" >Инструменты</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-bold">
                        @foreach ($allObject as $object)
                            <tr class="even">
                                <!--begin::Checkbox-->
                                <!--end::Checkbox-->
                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3" bis_skin_checked="1">
                                        <a href="/metronic8/demo1/../demo1/apps/user-management/users/view.html">
                                        </a>
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex flex-column" bis_skin_checked="1">
                                        <a href="/admin/users/{{$object->user_id}}" class="text-gray-800 text-hover-primary mb-1">{{ $object->last_name }} {{ $object->first_name }}</a>
                                        <span>{{ $object->email }}</span>
                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <td >{{ $object->name == null ? 'Не добавлена' : $object->name }}</td>
                                <td >{{ $object->project_name }}</td>
                                <td >{{ $object->object_id }}</td>
                                <td >{{ $object->object_name }}</td>
                                <td>
                                    <a href="/admin/editObject/{{$object->object_id}}"  class="btn btn-sm btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                        </svg>
                                    </a>
                                    <button class="btn btn-danger btn-sm deleteObject"  data-bs-toggle="modal" objectId = "{{$object->object_id}}"data-bs-target="#kt_modal_1" title="Удалить объект">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>




                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="row" bis_skin_checked="1">
                    <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start" bis_skin_checked="1"></div>
                    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end" bis_skin_checked="1">
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate" bis_skin_checked="1">
                            {{ $allObject->links('vendor.pagination.bootstrap-4') }}


                            {{--                            <ul class="pagination">--}}
                            {{--                                <li class="paginate_button page-item previous disabled" id="kt_table_users_previous">--}}
                            {{--                                    <a href="#" aria-controls="kt_table_users" data-dt-idx="0" tabindex="0" class="page-link">--}}
                            {{--                                        <i class="previous"></i></a></li>--}}
                            {{--                                <li class="paginate_button page-item active">--}}
                            {{--                                    <a href="#" aria-controls="kt_table_users" data-dt-idx="1" tabindex="0" class="page-link">{{$allUsers->links()}}</a>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="paginate_button page-item ">--}}
                            {{--                                    <a href="#" aria-controls="kt_table_users" data-dt-idx="2" tabindex="0" class="page-link">2</a>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="paginate_button page-item ">--}}
                            {{--                                    <a href="#" aria-controls="kt_table_users" data-dt-idx="3" tabindex="0" class="page-link">3</a>--}}
                            {{--                                </li><li class="paginate_button page-item next" id="kt_table_users_next">--}}
                            {{--                                    <a href="#" aria-controls="kt_table_users" data-dt-idx="4" tabindex="0" class="page-link">--}}
                            {{--                                        <i class="next">--}}
                            {{--                                        </i>--}}
                            {{--                                    </a>--}}
                            {{--                                </li>--}}
                            {{--                            </ul>--}}
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>    <!--end::Card-->
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Подтвердите удаление</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <p>Вы уверены, что хотите удалить объект?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light notDeletedObject" data-bs-dismiss="modal">Нет</button>
                    <button type="button" class="btn btn-primary deletedObject">Да</button>
                </div>
            </div>
        </div>
    </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    var deleteObjectId = 0;
    $(document).on('click','.deleteObject',function (){
        deleteObjectId = Number($(this).attr('objectId'));
    });
    $(document).on('click','.notDeletedObject',function (){
        deleteObjectId = 0;
    });
    $(document).on('click','.deletedObject',function (){
        if(deleteObjectId != 0){
            $.ajax({
                url: "/admin/deletedObject",
                async: false,
                type: 'GET',
                data: {
                    deleteObjectId:deleteObjectId,
                },
                success: function(data) {
                    location.reload();
                },
                error: function(err) {}
            });
        }
    });
</script>
