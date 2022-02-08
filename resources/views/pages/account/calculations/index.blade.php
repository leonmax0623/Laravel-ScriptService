<title>{{ __('Расчеты') }}</title>
@section('PageName', 'Модули расчета')
@section('breadcrumbs')
    <li class="breadcrumb-item text-gray-600">
        <a href="/" class="text-muted text-hover-primary">
            Рабочая панель
        </a>
    </li>
    <li class="breadcrumb-item text-gray-500">Модули расчета</li>
@endsection
<?php
    $discount = 0;
    if (isset(auth()->user()->discount)){
        $discount = auth()->user()->discount;
    }
?>
<x-base-layout>
    @if(count($activeModules) > 0)
    <div class="page-title d-flex flex-column mb-5">
        <h1 class="d-flex text-dark fw-bolder my-1 fs-3">Активные модули</h1>
    </div>
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Row-->
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
            @foreach($activeModules as $module)
                <div class="col-md-4">
                <!--begin::Card-->
                <div class="card card-flush h-md-100">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2><a class="card-title" href="/account/modulePage/{{$module->module_id}}">{{$module->module_name}}</a></h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-1">
                        <!--begin::Users-->
                        @if(strlen($module->module_description) > 40)
                            <div class="fw-bolder text-gray-600 mb-5"><a class="fw-bolder text-gray-600" href="/account/modulePage/{{$module->module_id}}">{{mb_substr($module->module_description,0,40)}}...</a></div>
                        @else
                            <div class="fw-bolder text-gray-600 mb-5"><a class="fw-bolder text-gray-600" href="/account/modulePage/{{$module->module_id}}">{{$module->module_description}}</a></div>
                        @endif
                        <!--begin::Permissions-->
                        <div class="d-flex flex-column text-gray-600">
                            @if($module->input_1 != "")
                            <div class="d-flex align-items-center py-2">
                                <span class="bullet bg-primary me-3"></span>{{$module->input_1}}</div>
                            @endif
                            @if($module->input_2 != "")
                                <div class="d-flex align-items-center py-2">
                                    <span class="bullet bg-primary me-3"></span>{{$module->input_2}}</div>
                            @endif
                            @if($module->input_3 != "")
                                <div class="d-flex align-items-center py-2">
                                    <span class="bullet bg-primary me-3"></span>{{$module->input_3}}</div>
                            @endif
                            @if($module->input_4 != "")
                                <div class="d-flex align-items-center py-2">
                                    <span class="bullet bg-primary me-3"></span>{{$module->input_4}}</div>
                            @endif
                            @if($module->input_5 != "")
                                <div class="d-flex align-items-center py-2">
                                    <span class="bullet bg-primary me-3"></span>{{$module->input_5}}</div>
                            @endif
                        </div>
                        <!--end::Permissions-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer flex-wrap pt-0">
                        <div class="row">
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-4 px-4 me-7 mb-1 col-md-6">
                                @if($discount  > 0)
                                <div style="font-size: 12px;text-decoration: line-through;text-decoration-color: #b5b5c3;">
                                    <span class="fw-bold text-gray-400">{{$module->module_price}} руб. в месяц</span>
                                </div>
                                <div>
                                    <span class="text-gray-800 fw-bolder">{{$module->module_price - ($module->module_price / (100 / $discount))}} руб. в месяц</span>
                                </div>
                                @else
                                    <div>
                                        <span class="text-gray-800 fw-bolder">{{$module->module_price}} руб. в месяц</span>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4 min-w-125px mb-1">
                                <button type="button" class="btn btn-light  my-1 disconnectModule " data-bs-toggle="modal" module_name="{{$module->module_name}}" module_id="{{$module->module_id}}" module_price="{{$module->module_price}}" data-bs-target="#kt_modal_delete_module">Отключить</button>
                            </div>
                        </div>
                    </div>
                    <!--end::Card footer-->
                </div>
                <!--end::Card-->
            </div>
            @endforeach
        </div>

        <div class="modal fade" id="kt_modal_delete_module" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-400px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Отключение модуля</h2>
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
                    <div class="modal-body scroll-y">
                        <!--begin::Form-->
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_delete_module_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_delete_module_header" data-kt-scroll-wrappers="#kt_modal_delete_module_scroll" data-kt-scroll-offset="300px" style="max-height: 691px;">
                                <p class="moduleDisconnectMessage"></p>
                            </div>
                            <!--end::Scroll-->
                            <!--begin::Actions-->
                            <div class="text-center pt-5">
                                <button type="reset " class="btn btn-light me-3" data-bs-dismiss="modal" bis_skin_checked="1" >Отмена</button>
                                <button type="submit" class="btn btn-primary disconnect" data-kt-roles-modal-action="submit">
                                    <span class="indicator-label">Да</span>
                                </button>
                            </div>
                            <!--end::Actions-->
                            <div></div>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
    </div>
    @endif
    @if(count($notActiveModules) > 0)
    <div class="page-title d-flex flex-column mb-5">
        <h1 class="d-flex text-dark fw-bolder my-1 fs-3">Неактивные модули</h1>
    </div>
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Row-->
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
            @foreach($notActiveModules as $module)
                <div class="col-md-4">
                    <!--begin::Card-->
                    <div class="card card-flush h-md-100">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2><a class="card-title" href="/account/modulePage/{{$module->module_id}}">{{$module->module_name}}</a></h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-1">
                            <!--begin::Users-->
                            @if(strlen($module->module_description) > 40)
                                <div class="fw-bolder text-gray-600 mb-5"><a class="fw-bolder text-gray-600" href="/account/modulePage/{{$module->module_id}}">{{mb_substr($module->module_description,0,40)}}...</a></div>
                            @else
                                <div class="fw-bolder text-gray-600 mb-5"><a class="fw-bolder text-gray-600" href="/account/modulePage/{{$module->module_id}}">{{$module->module_description}}</a></div>
                            @endif
                            <!--end::Users-->
                            <!--begin::Permissions-->
                            <div class="d-flex flex-column text-gray-600">
                                @if($module->input_1 != "")
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span>{{$module->input_1}}</div>
                                @endif
                                @if($module->input_2 != "")
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span>{{$module->input_2}}</div>
                                @endif
                                @if($module->input_3 != "")
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span>{{$module->input_3}}</div>
                                @endif
                                @if($module->input_4 != "")
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span>{{$module->input_4}}</div>
                                @endif
                                @if($module->input_5 != "")
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span>{{$module->input_5}}</div>
                                @endif
                            </div>
                            <!--end::Permissions-->
                        </div>
                        <!--end::Card body-->
                        <!--begin::Card footer-->
                        <div class="card-footer flex-wrap pt-0">
                            <div class="row">
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-4 px-4 me-7 mb-1 col-md-6">
                                    @if($discount  > 0)
                                        <div style="font-size: 12px;text-decoration: line-through;text-decoration-color: #b5b5c3;">
                                            <span class="fw-bold text-gray-400">{{$module->module_price}} руб. в месяц</span>
                                        </div>
                                        <div>
                                            <span class="text-gray-800 fw-bolder">{{$module->module_price - ($module->module_price / (100 / $discount))}} руб. в месяц</span>
                                        </div>
                                    @else
                                        <div>
                                            <span class="text-gray-800 fw-bolder">{{$module->module_price}} руб. в месяц</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 min-w-125px mb-1">
                                    <button type="button" class="btn btn-light btn-success my-1 connectModule " data-bs-toggle="modal" module_name="{{$module->module_name}}" module_id="{{$module->module_id}}" module_price="{{$module->module_price}}" data-bs-target="#kt_modal_update_module">Подключить</button>
                                </div>
                            </div>
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card-->
                </div>
            @endforeach
        </div>

        <div class="modal fade" id="kt_modal_update_module" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-400px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Подключения модуля</h2>
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
                    <div class="modal-body scroll-y">
                        <!--begin::Form-->
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_module_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_module_header" data-kt-scroll-wrappers="#kt_modal_update_module_scroll" data-kt-scroll-offset="300px" style="max-height: 691px;">
                            <p class="moduleMessage"></p>
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-5">
                            <button type="reset " class="btn btn-light me-3" data-bs-dismiss="modal" bis_skin_checked="1" >Отмена</button>
                            <button type="submit" class="btn btn-primary connectNewModule" data-kt-roles-modal-action="submit">
                                <span class="indicator-label">Да</span>
                            </button>
                        </div>
                        <!--end::Actions-->
                        <div></div>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
    </div>
    @endif

    {{--@section('script')--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        var userBalance = {{isset(auth()->user()->balance) ? auth()->user()->balance : 0 }};
        var discount = {{isset(auth()->user()->discount) ? auth()->user()->discount : 0 }};
        var userId = {{isset(auth()->user()->id) ? auth()->user()->id : 0 }};
        $('.disconnectModule').on('click', function (){
            var module_name = $(this).attr('module_name');
            var module_id = $(this).attr('module_id');
            $('.moduleDisconnectMessage').text('Отключить модуль '+module_name+' ?');
            $('.disconnect').attr('module_id',module_id);
        });
        $('.disconnect').on('click', function (){
            var module_id = $(this).attr('module_id');
            console.log('module_id',module_id);
            $.ajax({
                url: "/account/disconnectModule",
                async: false,
                type: 'GET',
                data: {
                    module_id:module_id,
                    user_id:userId,
                },
                success: function(data) {
                    location.reload();
                },
                error: function(err) {}
            });
        });
        $('.connectModule').on('click', function (){
            var module_name = $(this).attr('module_name');
            var module_id = $(this).attr('module_id');
            var module_price = Number($(this).attr('module_price'));
            var countCurrentDay = new Date().getDate();
            var now = new Date();
            var dayInMonth = new Date(now.getFullYear(), now.getMonth()+1, 0).getDate();
            var priceInDay =  module_price / dayInMonth;
            var useDay = dayInMonth - countCurrentDay + 1;
            var price = useDay * priceInDay;
            if (discount > 0){
                price  = price - (price / (100 / discount));
            }

            if(userBalance >= price){
                $('#kt_modal_update_module .modal-header h2').text('Подключения модуля');
                $('.moduleMessage').text('Подключить модуль '+module_name+' ?');
                $('.connectNewModule').attr('module_id',module_id);
                $('.connectNewModule').attr('price',price);
                $('.connectNewModule').attr('user_id',userId);
                $('.connectNewModule').show();
            }else{
                $('#kt_modal_update_module .modal-header h2').text('Недостаточно средств ');
                $('.moduleMessage').text('На счету недостаточно средств для подключения модуля '+module_name);
                $('.connectNewModule').hide();
            }
        });
        $('.connectNewModule').on('click', function (){
            var module_id = $(this).attr('module_id');
            var price = Number($(this).attr('price'));
            var user_id = Number($(this).attr('user_id'));
            $.ajax({
                url: "/account/connectModule",
                async: false,
                type: 'GET',
                data: {
                    module_id:module_id,
                    price:-price,
                    user_id:user_id,
                },
                success: function(data) {
                    location.reload();
                },
                error: function(err) {}
            });
        });
    </script>
</x-base-layout>
