<title>{{ __('Город') }}</title>
@section('PageName', 'Город')
@section('breadcrumbs')
    <li class="breadcrumb-item text-gray-600">
        <a href="/" class="text-muted text-hover-primary">
            Рабочая панель
        </a>
    </li>
    <li class="breadcrumb-item text-gray-500">Справочники</li>
    <li class="breadcrumb-item text-gray-600">
        <a href="/account/directory/cities" class="text-muted text-hover-primary">
            Города
        </a>
    </li>
    <li class="breadcrumb-item text-gray-500">{{ isset($cityData) && isset($cityData->name) ? $cityData->name : 'Город' }}</li>
@endsection
<x-base-layout>
    <?php if (isset($cityData) && $cityData){
    $step = 0.01; ?>
    <div class="card mb-5 mb-xl-10">
        <div class="card-header">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0"><?=$cityData->name?></h3>
            </div>
        </div>
        <div class="card-body p-9">
            <form class="form" method="POST" action="{{ route('directory.saveCityTemperature') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="city_id" value="{{ $cityData->city_id }}">
                <?php if (isset($cityData->user_city_id)) { ?>
                <input type="hidden" name="user_city_id" value="{{ $cityData->user_city_id }}">
                <?php } ?>
                <div class="row mb-15">
                    <label class="col-lg-3 fw-bold text-muted">Средняя скорость ветра м/с, за период со средней суточной температурой</label>
                    <div class="col-lg-1">
                        <input type="number" name="average_wind_speed_AVD" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_wind_speed_AVD}}">
                    </div>
                    <label class="col-lg-3 fw-bold text-muted">Средняя максимальная температура воздуха наиболее теплого месяца, С</label>
                    <div class="col-lg-1 fv-row">
                        <input type="number" name="average_maximum_air_temperature_WM" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_maximum_air_temperature_WM}}">
                    </div>
                </div>
{{--                <div class="row mb-15">--}}
{{--                    <label class="col-lg-4 fw-bold text-muted">Средняя максимальная температура воздуха наиболее теплого месяца, С</label>--}}
{{--                    <div class="col-lg-8 fv-row">--}}
{{--                        <input type="number" name="average_maximum_air_temperature_WM" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_maximum_air_temperature_WM}}">--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="row mb-7">
                    <label class="text-gray-400 fw-bolder fs-7 text-uppercase">Средняя температура</label>
                </div>

{{--                <!--begin::Table-->--}}
{{--                <div class="dataTables_wrapper dt-bootstrap4 no-footer">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">--}}
{{--                            <thead>--}}
{{--                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">--}}
{{--                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в январе">Январь</th>--}}
{{--                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в феврале">Февраль</th>--}}
{{--                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в марте">Март</th>--}}
{{--                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в апреле">Апрель</th>--}}
{{--                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в мае">Май</th>--}}
{{--                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в июне">Июнь</th>--}}
{{--                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в июле">Июль</th>--}}
{{--                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в августе">Август</th>--}}
{{--                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в сентябре">Сентябрь</th>--}}
{{--                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в октябре">Октябрь</th>--}}
{{--                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в ноябре">Ноябрь</th>--}}
{{--                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в декабре">Декабрь</th>--}}
{{--                            </thead>--}}
{{--                            <tbody class="fw-bold text-gray-600">--}}
{{--                            <tr class="odd">--}}
{{--                                <td><input type="number" name="average_temperature_january" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_january}}"></td>--}}
{{--                                <td><input type="number" name="average_temperature_february" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_february}}"></td>--}}
{{--                                <td><input type="number" name="average_temperature_march" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_march}}"></td>--}}
{{--                                <td><input type="number" name="average_temperature_april" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_april}}"></td>--}}
{{--                                <td><input type="number" name="average_temperature_may" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_may}}"></td>--}}
{{--                                <td><input type="number" name="average_temperature_june" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_june}}"></td>--}}
{{--                                <td><input type="number" name="average_temperature_july" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_july}}"></td>--}}
{{--                                <td><input type="number" name="average_temperature_august" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_august}}"></td>--}}
{{--                                <td><input type="number" name="average_temperature_september" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_september}}"></td>--}}
{{--                                <td><input type="number" name="average_temperature_october" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_october}}"></td>--}}
{{--                                <td><input type="number" name="average_temperature_november" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_november}}"></td>--}}
{{--                                <td><input type="number" name="average_temperature_december" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_december}}"></td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--end::Table-->--}}
                <!--begin::Table-->
                <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                            <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в январе">Январь</th>
                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в феврале">Февраль</th>
                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в марте">Март</th>
                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в апреле">Апрель</th>
                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в мае">Май</th>
                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в июне">Июнь</th>
                            </thead>
                            <tbody class="fw-bold text-gray-600">
                            <tr class="odd">
                                <td><input type="number" name="average_temperature_january" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_january}}"></td>
                                <td><input type="number" name="average_temperature_february" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_february}}"></td>
                                <td><input type="number" name="average_temperature_march" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_march}}"></td>
                                <td><input type="number" name="average_temperature_april" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_april}}"></td>
                                <td><input type="number" name="average_temperature_may" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_may}}"></td>
                                <td><input type="number" name="average_temperature_june" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_june}}"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end::Table-->
                <!--begin::Table-->
                <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                            <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в июле">Июль</th>
                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в августе">Август</th>
                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в сентябре">Сентябрь</th>
                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в октябре">Октябрь</th>
                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в ноябре">Ноябрь</th>
                                <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Средняя температура в декабре">Декабрь</th>
                            </thead>
                            <tbody class="fw-bold text-gray-600">
                            <tr class="odd">
                                <td><input type="number" name="average_temperature_july" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_july}}"></td>
                                <td><input type="number" name="average_temperature_august" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_august}}"></td>
                                <td><input type="number" name="average_temperature_september" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_september}}"></td>
                                <td><input type="number" name="average_temperature_october" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_october}}"></td>
                                <td><input type="number" name="average_temperature_november" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_november}}"></td>
                                <td><input type="number" name="average_temperature_december" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="0" step="{{ $step }}" value="{{$cityData->average_temperature_december}}"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end::Table-->
                <div class="card-footer d-flex justify-content-end p-0 pt-3">
                    <button type="submit" class="btn btn-primary btn-sm">
                        Сохранить
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{ __('Направление ветра') }}</h3>
            </div>
        </div>
        <div class="collapse show">
            <form class="form" method="POST" action="{{ route('directory.saveCityWindDirections') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="city_id" value="{{ $cityData->city_id }}">
                <?php if (isset($cityData->user_city_id)) { ?>
                    <input type="hidden" name="user_city_id" value="{{ $cityData->user_city_id }}">
                <?php } ?>
                <div class="row container-fluid">
                    <div class="column col-lg-6 container-fluid">
                        <div class="card-header border-0">
                            <div class="card-title m-0">
                                <h4 class="fw-bolder m-0">{{ __('Зима') }}</h4>
                            </div>
                        </div>
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Север</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_winter_N" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_winter_N?>">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Северо-восток</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_winter_NE" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_winter_NE?>">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Восток</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_winter_E" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_winter_E?>">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Юго-восток</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_winter_SE" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_winter_SE?>">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Юг</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_winter_S" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_winter_S?>">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Юго-запад</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_winter_SW" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_winter_SW?>">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Запад</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_winter_W" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_winter_W?>">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Северо запад</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_winter_NW" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_winter_NW?>">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Штиль</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_winter_calm" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_winter_calm?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column col-lg-6 container-fluid">
                        <div class="card-header border-0">
                            <div class="card-title m-0">
                                <h4 class="fw-bolder m-0">{{ __('Лето') }}</h4>
                            </div>
                        </div>
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Север</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_summer_N" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_summer_N?>">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Северо-восток</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_summer_NE" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_summer_NE?>">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Восток</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_summer_E" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_summer_E?>">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Юго-восток</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_summer_SE" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_summer_SE?>">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Юг</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_summer_S" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_winter_S?>">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Юго-запад</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_summer_SW" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_summer_SW?>">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Запад</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_summer_W" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_summer_W?>">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Северо запад</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_summer_NW" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_summer_NW?>">
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Штиль</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <input type="number" name="wind_direction_summer_calm" class="form-control form-control-sm form-control-solid" placeholder="0" step="{{ $step }}" value="<?=$cityData->wind_direction_summer_calm?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary btn-sm">
                        Сохранить
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!--end::details View-->
    <?php } ?>
</x-base-layout>
