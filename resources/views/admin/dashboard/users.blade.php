<?php
    use App\Models\User;
?>
@extends('layout.admin')

@section('title', 'Список пользователей')

@section('breadcrumbs')
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <li class="breadcrumb-item text-muted">
            <a href="/admin" class="text-muted text-hover-primary">
                Главная
            </a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            Список пользователей
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
    </ul>
@endsection

@section('content')
    <!--begin::Card-->
    <div class="card" bis_skin_checked="1">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6" bis_skin_checked="1">
            <!--begin::Card title-->
            <div class="card-title" bis_skin_checked="1">
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar" bis_skin_checked="1">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base" bis_skin_checked="1">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">Добавить пользователя</button>
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected" bis_skin_checked="1">
                    <div class="fw-bolder me-5" bis_skin_checked="1">
                        <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                    <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                </div>
                <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true" bis_skin_checked="1">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px" bis_skin_checked="1">
                        <!--begin::Modal content-->
                        <div class="modal-content" bis_skin_checked="1">
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_user_header" bis_skin_checked="1">
                                <!--begin::Modal title-->

                                <h2 class="fw-bolder">Добавления пользователя</h2>

                                <!--end::Modal title-->
                                <!--begin::Close-->
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
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7" bis_skin_checked="1">
                                <!--begin::Form-->
                                <form id="kt_modal_add_user_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('admin.createUser')}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <!--begin::Scroll-->
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px" bis_skin_checked="1" style="max-height: 520px;">
                                        <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                            <!--begin::Label-->
                                            <label class=" fw-bold fs-6 mb-2">Имя</label>
                                            <input type="text" name="first_name" required class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Имя" >
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                        </div>

                                        <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                            <!--begin::Label-->
                                            <label class=" fw-bold fs-6 mb-2">Фамилыыыыыыыия</label>
                                            <input type="text" name="last_name" required class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Фамилия" >
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                        </div>

                                        <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                            <!--begin::Label-->
                                            <label class=" fw-bold fs-6 mb-2">Город</label>
                                            <select class="form-control form-control-lg form-control-solid form-select " name="userCity" >
                                                @foreach ($cities as $city)
                                                    <option value="{{$city->city_id}}" selected>{{ $city->city_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                            <!--begin::Label-->
                                            <label class=" fw-bold fs-6 mb-2">Email</label>
                                            <input type="email" name="email" required class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Email" >
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                        </div>


                                        <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                            <!--begin::Label-->
                                            <label class=" fw-bold fs-6 mb-2">Роль</label>
                                            <select class="form-control form-control-lg form-control-solid form-select " name="userRole" >
                                                    <option value="0" selected>Специалист</option>
                                                    <option value="1">Администратор</option>
                                            </select>
                                        </div>

                                        <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                            <!--begin::Label-->
                                            <label class="fw-bold fs-6 mb-2">Пароль</label>
                                            <input type="text" name="password" required class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Пароль" >
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Scroll-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end" bis_skin_checked="1">
                                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                            <span class="indicator-label">Добавить</span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                    <div bis_skin_checked="1"></div>
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - Add task-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0" bis_skin_checked="1">
            <!--begin::Table-->

        <div
            id="kt_table_users_wrapper"
            class="dataTables_wrapper dt-bootstrap4 no-footer"
            bis_skin_checked="1">
            <div class="table-responsive" bis_skin_checked="1">
                <table
                    class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                    id="filter">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">Фамилия Имя<br>
                                <br>
                                <div class="position-relative w-md-120px me-md-2">
                                    <input
                                        type="text"
                                        class="form-control form-control-solid"
                                        id="filter0"
                                        placeholder="Фамилия Имя"/>
                                </div>
                            </th>
                            <th tabindex="1" aria-controls="kt_table_users" rowspan="1" colspan="1">Email<br>
                                <br>
                                <div class="position-relative w-md-120px me-md-2">
                                    <input
                                        type="text"
                                        class="form-control form-control-solid"
                                        id="filter1"
                                        placeholder="Email"/>
                                </div>
                            </th>
                            <th tabindex="2" aria-controls="kt_table_users" rowspan="1" colspan="1">Город<br>
                                <br>
                                <div class="position-relative w-md-120px me-md-2">
                                    <select
                                        name="user_city"
                                        class="form-control form-control-lg form-control-solid form-select"
                                        id="filter2"><option value="">Все</option>
                                        <?php $cityById[null]='Город не указан';?>
                                        @foreach ($usecities as $city)
                                            <?php $cityById[$city->city_id]=$city->city_name;?>
                                            <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </th>
                            <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">Статус<br>
                                <br>
                                <div class="position-relative w-md-120px me-md-2">
                                    <select
                                        name="user_status"
                                        class="form-control form-control-lg form-control-solid form-select"
                                        id="filter3">
                                        <option value="">Все</option>
                                        <option value="Активен">Активен</option>
                                        <option value="Заблокирован">Заблокирован</option>
                                    </select>
                                </div>
                            </th>
                            <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">Роль<br>
                                <br>
                                <div class="position-relative w-md-120px me-md-2">
                                    <select
                                        name="user_status"
                                        class="form-control form-control-lg form-control-solid form-select"
                                        id="filter4">
                                        <option value="">Все</option>
                                        <option value="Администратор">Администратор</option>
                                        <option value="Специалист">Специалист</option>
                                    </select></div>
                            </th>
                            <th tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">Время создания<br>
                                <br>
                                <div class="position-relative w-md-120px me-md-2">
                                    <input
                                        type="text"
                                        class="form-control form-control-solid"
                                        disabled="disabled"
                                        style="visibility:hidden"/>
                                </div>
                            </th>
                            <th rowspan="1" colspan="1" aria-label="Actions">Инструменты<br>
                                <br>
                                <div class="position-relative w-md-120px me-md-2">
                                    <input
                                        type="text"
                                        class="form-control form-control-solid"
                                        disabled="disabled"
                                        style="visibility:hidden"/>
                                </div>
                            </th>

                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold">
                        @foreach ($allUsers as $user)
                        <tr class="even">
                            <!--begin::Checkbox-->
                            <!--end::Checkbox-->
                            <!--begin::User=-->
                            <td data-order="2021-12-06T21:50:19+02:00">
                                <!--begin:: Avatar -->
                                {{-- <div class="symbol symbol-circle symbol-50px overflow-hidden me-3" bis_skin_checked="1">
                                    <a href="/metronic8/demo1/../demo1/apps/user-management/users/view.html"></a>
                                </div> --}}
                                <!--end::Avatar-->
                                <!--begin::User details-->
                                <div bis_skin_checked="1">
                                    <a href="/admin/users/{{$user->id}}" class="text-gray-800 text-hover-primary mb-1">{{ $user->last_name }} {{ $user->first_name }}</a>
                                </div>
                                <!--begin::User details-->
                            </td>
                            <td data-order="2021-12-06T21:50:19+02:00">
                                {{ $user->email }}
                            </td>

                            <td data-order="2021-12-06T21:50:19+02:00">
                                {{ $cityById[$user->city] }}
                            </td>
                            <td data-order="2021-12-06T21:50:19+02:00">
                                <div
                                    class="badge {{ $user->status == 1 ? 'badge-success' : 'badge-danger' }} fw-bolder"
                                    bis_skin_checked="1">{{ $user->status == 1 ? 'Активен' : 'Заблокирован' }}</div>
                            </td>
                            <?php
                                $user = User::where('id', $user->id)->first();
                            ?>

                            <td data-order="2021-12-06T21:50:19+02:00">
                                {{ $user->hasRole('admin')  ?  'Администратор' : 'Специалист' }}
                            </td>
                            <!--end::Two step=-->
                            <!--begin::Joined-->
                            <td >{{ $user->created_at }}</td>
                            <td class="text-center">
                                <a href="/admin/deleteUser/{{$user->id}}" class="btn btn-danger">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-trash-fill"
                                        viewbox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!--end::Table-->
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="/core/js/TableFilter.js"></script>
        <!--end::Card body-->
    </div>    <!--end::Card-->
@endsection
{{--@section('scripts')--}}
    {{--   begin  AG GRID таблица Клиенты   --}}



    {{--   end  AG GRID таблица Клиенты   --}}

    {{--   begin модальное окно Новый клиент--}}
{{--    <script>--}}
{{--        $(document).on('click', '#createItem', function(){--}}
{{--            $("#exampleModalLabel").html('<h5 class="modal-title" id="exampleModalLabel">НОВАЯ ЗАПИСЬ</h5>');--}}
{{--            sendRequest('/getModalView', 'GET', {} , getModalViewCallback);--}}
{{--        });--}}


{{--        $(document).on('click', '.deleteItem', function(){--}}
{{--            let index = getIndex(this);--}}
{{--            console.log('index', index);--}}
{{--            sendRequest('/getModalView', 'GET', {itemId:index} , getModalViewCallback);--}}
{{--            $("#exampleModalLabel").html('<h5 class="modal-title" id="exampleModalLabel">ИЗМЕНИТЬ ЗАПИСЬ</h5>');--}}
{{--            $('[name="itemId"]').val(index);--}}
{{--        });--}}


{{--        function getIndex(child){--}}
{{--            let parent = $(child).closest('a');--}}
{{--            return parent.attr('index');--}}
{{--        }--}}

{{--        function sendRequest(url, type = 'GET', data = {}, callback, beforeCallback){--}}
{{--            $.ajax({--}}
{{--                url: url,--}}
{{--                type: type,--}}
{{--                data: data,--}}
{{--                // beforeSend: beforeCallback,--}}
{{--                // complete: hideLoader,--}}
{{--                success: function(response){--}}
{{--                    setTimeout(callback, 400, response);--}}
{{--                }});--}}
{{--        }--}}

{{--        function getModalViewCallback(response){--}}
{{--            console.log('response', response);--}}
{{--            $('#modalContent').html(response);--}}
{{--        };--}}


{{--        $.ajaxSetup({--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--            }--}}
{{--        });--}}

{{--        $('#formCreate').submit(function(e) {--}}
{{--            e.preventDefault();--}}
{{--            var result = true;--}}
{{--            var client_name = $("#client_name").val();--}}
{{--            var client_type = $("#kt_select2_3").val();--}}
{{--            var request = $.ajax({--}}
{{--                url: "/clients/add_client",--}}
{{--                async: false,--}}
{{--                type: 'POST',--}}
{{--                data: {--}}
{{--                    _token: $('meta[name="csrf-token"]').attr('content'),--}}
{{--                    client_name: client_name,--}}
{{--                    client_type: client_type,--}}
{{--                    client_mail:$('#client_mail').val(),--}}
{{--                    client_status:$('#client_status').val(),--}}
{{--                    client_id:$('#client_id').val(),--}}
{{--                },--}}
{{--                success: function(data) {--}}
{{--                    if($.isEmptyObject(data.error)){--}}
{{--                        document.location.reload();--}}
{{--                    }else{--}}
{{--                        printErrorMsg(data.error);--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function(err) {}--}}
{{--            });--}}

{{--            function printErrorMsg (msg) {--}}
{{--                $.each( msg, function( key, value ) {--}}
{{--                    $('#'+key+'_err').text(value);--}}
{{--                });--}}
{{--                result = false;--}}
{{--            }--}}
{{--            return result;--}}
{{--        });--}}
{{--    </script>--}}
    {{--   end модальное окно Новый клиент--}}
{{--@endsection--}}
