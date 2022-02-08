<title>{{ __('Города') }}</title>
@section('PageName', 'Города')
@section('breadcrumbs')
    <li class="breadcrumb-item text-gray-600">
        <a href="/" class="text-muted text-hover-primary">
            Рабочая панель
        </a>
    </li>
    <li class="breadcrumb-item text-gray-500">Справочники</li>
    <li class="breadcrumb-item text-gray-500">Города</li>
@endsection
<x-base-layout>
    <div class="modal fade" tabindex="-1" id="kt_modal_delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Подтвердите сброс</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                </div>
                <div class="modal-body">
                    <p>Вы уверены, что хотите сбросить все значения на "по умолчанию"?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light notDelete" data-bs-dismiss="modal">Нет</button>
                    <a id="resetUserData" type="button" class="btn btn-primary delete">Да</a>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-dismissible bg-light-success border border-success border-dashed d-flex flex-column flex-sm-row w-100 p-5 mb-10" bis_skin_checked="1">
        <span class="svg-icon svg-icon-2hx svg-icon-success me-4 mb-5 mb-sm-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="black"></path>
                <path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="black"></path>
            </svg>
        </span>
        <div class="d-flex flex-column pe-0 pe-sm-10" bis_skin_checked="1">
            <h5 class="mb-1 mt-3">Внести или изменить нормативные значения можно на странице города</h5>
{{--            <span>The alert component can be used to highlight certain parts of your page for higher content visibility.</span>--}}
        </div>
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <i class="bi bi-x fs-1 text-success"></i>
        </button>
    </div>
    <div class="card" bis_skin_checked="1">
        <div class="card-header border-0 pt-6" bis_skin_checked="1">
            <form method="GET" action="{{route('directory.citySearch')}}" style="margin: 0 !important;">
                <div class="card-title" bis_skin_checked="1">
                    <div class="d-flex align-items-center position-relative my-1" bis_skin_checked="1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
                            </svg>
                        </span>
                        <input type="text" name="cityName" class="form-control form-control-sm form-control-solid w-250px ps-14" placeholder="Название города" value="<?= (isset($_GET['cityName']) && $_GET['cityName']) ? $_GET['cityName'] : '' ?>">
                        <button type="submit" class="btn btn-primary ms-3 btn-sm">Поиск</button>
                    </div>
                </div>
            </form>
            <div class="card-toolbar" bis_skin_checked="1">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base" bis_skin_checked="1">
                    <button type="button" class="btn btn-light-primary me-3 btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
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
                            <form method="GET" action="{{route('directory.filterSearch')}}">
                                <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                    <label class="fw-bold fs-6 mb-2">Регион</label>
                                    <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                        <select name="filterRegionId" aria-label="Проект" data-control="select2" data-placeholder="Выберите регион" data-kt-select2="true" data-dropdown-parent="#kt_menu_1" class="form-select form-select-sm fw-bold" required>
                                            <option value="">Выберите регион</option>
                                            <?php if (isset($regions)){ ?>
                                            @foreach($regions as $key => $value)
                                                <option value="{{ $regions[$key]->city_id }}">{{ $regions[$key]->name }}</option>
                                            @endforeach
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                </div>
                                <div class="d-flex justify-content-end" bis_skin_checked="1">
                                    <button type="submit" class="btn btn-primary btn-sm fw-bold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Поиск</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end me-3" data-kt-user-table-toolbar="base" bis_skin_checked="1">
                    <button id="resetValues" type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete">
                        Сбросить значения
                    </button>
                </div>
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base" bis_skin_checked="1">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_add_city">
                        Добавить город
                    </button>
                </div>
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected" bis_skin_checked="1">
                    <div class="fw-bolder me-5" bis_skin_checked="1">
                        <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                    <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                </div>
                <div class="modal fade" id="kt_modal_add_city" tabindex="-1" aria-hidden="true" bis_skin_checked="1">
                    <div class="modal-dialog modal-dialog-centered mw-650px" bis_skin_checked="1">
                        <div class="modal-content" bis_skin_checked="1">
                            <div class="modal-header" id="kt_modal_add_city_header" bis_skin_checked="1">
                                <h2 class="fw-bolder">Добавить город</h2>
                                <div class="btn btn-icon btn-sm btn-active-icon-primary btnCloseModal" data-kt-city-modal-action="close" data-bs-dismiss="modal" bis_skin_checked="1">
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7" bis_skin_checked="1">
                                <form id="kt_modal_add_city_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{ route('directory.getCities') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                        <label class="fw-bold fs-6 mb-2">Регион</label>
                                        <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                            <select name="region_id" aria-label="Выберите пользователя" data-placeholder="Выберите регион" data-dropdown-parent="#kt_modal_add_city_form" class="form-select form-select-solid fw-bold" required>
                                                <option value="">Выберите регион</option>
                                                <?php if (isset($regions)){ ?>
                                                    @foreach($regions as $key => $value)
                                                        <option value="{{ $key }}">{{ $regions[$key]->name }}</option>
                                                    @endforeach
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                    </div>
                                    <div class="d-flex flex-column scroll-y me-n7 pe-6" id="kt_modal_add_city_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_city_header" data-kt-scroll-wrappers="#kt_modal_add_city_scroll" data-kt-scroll-offset="300px" bis_skin_checked="1" style="max-height: 520px;">
                                        <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                            <label class="fw-bold fs-6 mb-2">Название города</label>
                                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Название города" value="" required>
                                            <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="user_city_id" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="">
                                    <input type="hidden" name="city_id" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="">
                                    <div class="text-center pt-15" bis_skin_checked="1">
                                        <button type="reset" class="btn btn-light me-3" data-kt-city-modal-action="cancel">Сбросить</button>
                                        <button type="submit" class="btn btn-primary" data-kt-city-modal-action="submit">
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
            <div id="kt_table_city_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" bis_skin_checked="1"><div class="table-responsive" bis_skin_checked="1">
                    <table class="table align-middle table-row-dashed fs-6 gy-3 dataTable no-footer" id="kt_table_city">
                        <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th tabindex="0" aria-controls="kt_table_city" rowspan="1" colspan="1">Город</th>
                            <th tabindex="0" aria-controls="kt_table_city" rowspan="1" colspan="1">Регион, Край, Область</th>
                            <th class="float-end" rowspan="1" colspan="1" aria-label="Actions" >Инструменты</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                        @foreach ($cities as $city)
                            <tr class="even">
                                <td class="text-gray-800" style="max-width: 200px;"><a href="/account/directory/city/{{ $city->user_city_id == 0 ? $city->city_id : $city->user_city_id }}">{{ $city->name }}</a></td>
                                <td class="text-gray-800">{{ $regions[$city->region_id]->name }}</td>
                                <td class="float-end">
                                    <button class="btn btn-primary btn-sm editCity"
                                            data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_add_city"
                                            user_city_id="{{isset($city->user_city_id) ? $city->user_city_id : 0}}"
                                            city_id="{{$city->city_id}}"
                                            region_id="{{$city->region_id}}"
                                            short_name="{{$city->name}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                        </svg>
                                    </button>
                                    <?php if (isset($city->user_city_id) && $city->user_city_id && isset($city->city_id) && $city->city_id == 0) {?>
                                    <a href="/account/directory/deleteCityData/{{$city->user_city_id}}" class="btn btn-danger btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                        </svg>
                                    </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row" bis_skin_checked="1">
                    <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start" bis_skin_checked="1"></div>
                    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end" bis_skin_checked="1">
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_table_city_paginate" bis_skin_checked="1">
                            {{ $cities->appends(['cityName' => request()->name])->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('[name="region_id"]').select2();
            $('[data-bs-target="#kt_modal_add_city"]').on('click', function (){
                $("[name='region_id']").val('');
                $('[name="region_id"]').trigger('change');
                $("input[name='name']").val('');
                $("input[name='city_id']").val('');
                $("input[name='user_city_id']").val('');
                $('#kt_modal_add_city_header h2').text('Добавить город');
                $('#kt_modal_add_city_form button span').text('Добавить');
            });

            $('.editCity').on('click', function (){
                if ($(this).attr('city_id') != "") {
                    $("input[name='name']").val($(this).attr('short_name'));
                    $("input[name='city_id']").val($(this).attr('city_id'));
                    $("[name='region_id']").val($(this).attr('region_id'));
                    $('[name="region_id"]').trigger('change');
                    $("input[name='user_city_id']").val($(this).attr('user_city_id'));
                    $("input[name='temperature_stratification']").val($(this).attr('temperature_stratification'));
                    $('#kt_modal_add_city_header h2').text('Редактировать город');
                    $('#kt_modal_add_city_form button span').text('Редактировать');
                }
            });

            $('#resetUserData').on('click', function (){
                $.ajax({
                    type: "GET",
                    url: 'resetUserCitiesData',
                    success: function() {
                        location.reload();
                    },
                    error: function(response) {
                        console.log('Error', response);
                    }
                });
            });
        });
    </script>
</x-base-layout>
