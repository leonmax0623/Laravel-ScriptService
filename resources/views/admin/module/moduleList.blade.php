@extends('layout.admin')

@section('title', 'Модули')

@section('content')

    <div class="card" bis_skin_checked="1">
        <div class="card-toolbar mt-5" bis_skin_checked="1">
            <div class="modal fade" id="kt_modal_add_module" tabindex="-1" aria-hidden="true" bis_skin_checked="1">
                <div class="modal-dialog modal-dialog-centered mw-850px" bis_skin_checked="1">
                    <div class="modal-content" bis_skin_checked="1">
                        <div class="modal-header" id="kt_modal_add_module_header" bis_skin_checked="1">
                            <h2 class="fw-bolder"></h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary btnCloseModal" data-kt-tariff-modal-action="close" bis_skin_checked="1">
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7" bis_skin_checked="1">
                            <form id="kt_modal_add_module_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{route('admin.updateModule')}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-12 mb-7">
                                        <div class="notice d-flex bg-light-muted rounded border-muted border border-dashed p-6">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
													<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"></rect>
													<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"></rect>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-stack flex-grow-1">
                                                <!--begin::Content-->
                                                <div class="fw-bold">
                                                    <h4 class="text-gray-900 fw-bolder oldPrice"></h4>
                                                    <div class="fs-6 text-gray-700 lastDateUpdate"></div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_module_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_module_header" data-kt-scroll-wrappers="#kt_modal_add_module_scroll" data-kt-scroll-offset="300px" bis_skin_checked="1" style="max-height: 520px;">
                                            <input type="hidden" name="module_id" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Название модуля" value="">
                                            <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                                <label class="fw-bold fs-6 mb-2">Название модуля</label>
                                                <input type="text" name="module_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Название модуля" value="" required>
                                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                            </div>
                                            <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                                <label class="fw-bold fs-6 mb-2">Стоимость руб./месяц</label>
                                                <input type="number" name="module_price" class="form-control form-control-solid mb-3 mb-lg-0" step="0.1" placeholder="Стоимость руб./месяц" value="" required>
                                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                            </div>
                                            <div class="fv-row mb-7 fv-plugins-icon-container" bis_skin_checked="1">
                                                <label class="fw-bold fs-6 mb-2">Описание</label>
                                                <textarea class="form-control form-control-solid mb-3 mb-lg-0" name="module_description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="repeater_val">
                                            <!--begin::Form group-->
                                            <div class="form-group">
                                                <div data-repeater-list="repeater_val">
                                                    <div data-repeater-item>
                                                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_module_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_module_header" data-kt-scroll-wrappers="#kt_modal_add_module_scroll" data-kt-scroll-offset="300px" bis_skin_checked="1" style="max-height: 520px;">
                                                            <div class="row">
                                                            <div class="fv-row mb-7 fv-plugins-icon-container col-lg-9" bis_skin_checked="1">
                                                                <label class="fw-bold fs-6 mb-2">Поле</label>
                                                                <input type="text" name="module_input" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Введите поле" value="" >
                                                                <div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>
                                                            </div>
                                                                <div class="fv-row mb-7 fv-plugins-icon-container col-lg-3" bis_skin_checked="1">
                                                                    <label class="fw-bold fs-6 mb-2"></label>
                                                                    <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Form group-->

                                            <!--begin::Form group-->
                                            <div class="form-group mt-5">
                                                <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                                                    <i class="la la-plus"></i>Добавть поле
                                                </a>
                                            </div>
                                            <!--end::Form group-->
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pt-15" bis_skin_checked="1">
                                    <button type="reset" class="btn btn-light me-3" data-kt-tariff-modal-action="cancel">Сбросить</button>
                                    <button id="submitTariff" type="submit" class="btn btn-primary" data-kt-tariff-modal-action="submit">
                                        <span class="indicator-label">Сохранить</span>
                                    </button>
                                </div>
                                <div bis_skin_checked="1"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body pt-0" bis_skin_checked="1">
            <div id="kt_table_tariff_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer" bis_skin_checked="1"><div class="table-responsive" bis_skin_checked="1">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_tariff">
                        <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th tabindex="0" aria-controls="kt_table_tariff" rowspan="1" colspan="1">Название модуля</th>
                            <th tabindex="0" aria-controls="kt_table_tariff" rowspan="1" colspan="1">Стоимость</th>
                            <th tabindex="0" aria-controls="kt_table_tariff" rowspan="1" colspan="1">Описание</th>
                            <th class="float-end" rowspan="1" colspan="1" aria-label="Actions" >Инструменты</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                        @foreach($allModule as $module)
                        <tr class="even" module_id = "{{$module->module_id}}" >
                            <td module_name = "{{$module->module_name}}">{{ $module->module_name }}</td>
                            <td module_price = "{{ $module->module_price }}" >{{ $module->module_price }} руб./месяц</td>
                            <td module_description = "{{ $module->module_description }}">{{ $module->module_description }}</td>
                            <td style="display: none" input_1 = "{{ $module->input_1}}">{{ $module->input_1 }} </td>
                            <td style="display: none" input_2 = "{{ $module->input_2}}">{{ $module->input_2 }} </td>
                            <td style="display: none" input_3 = "{{ $module->input_3}}">{{ $module->input_3 }} </td>
                            <td style="display: none" input_4 = "{{ $module->input_4}}">{{ $module->input_4 }} </td>
                            <td style="display: none" input_5 = "{{ $module->input_5}}">{{ $module->input_5 }} </td>
                            <td style="display: none" date_update = "{{ $module->date_update}}">{{ $module->date_update }} </td>
                            <td class="float-end">
                                <button class="btn btn-primary editModule"
                                        data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_add_module"
                                        module_id="{{$module->module_id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
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
<script src="/core/js/custom/prismjs/prismjs.bundle.js"></script>
<script src="/core/js/custom/formrepeater/formrepeater.bundle.js"></script>
<script src="/core/js/global/plugins.bundle.js"></script>
<script>
    $(document).ready(function () {
        $('#repeater_val').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                if($('div[data-repeater-item]').length <= 5){
                    $(this).find('.col-lg-9 label').text('Поле '+$('div[data-repeater-item]').length);
                    $(this).slideDown();
                }else{
                    $('#repeater_val a[data-repeater-create]').hide();
                }
            },

            hide: function (deleteElement) {
                if($('div[data-repeater-item]').length <= 5){
                    $('#repeater_val a[data-repeater-create]').show();
                }
                $(this).slideUp(deleteElement);
            }
        });
        $('.editModule').on('click', function (){
            if ($(this).attr('module_id') != "") {
                $('div[data-repeater-item]').remove();
                var module_id = $(this).attr('module_id');
                var module_name = $('table tr[module_id="'+module_id+'"] td').eq(0).attr('module_name');
                var module_price = $('table tr[module_id="'+module_id+'"] td').eq(1).attr('module_price');
                var module_description = $('table tr[module_id="'+module_id+'"] td').eq(2).attr('module_description');
                var input1 = $('table tr[module_id="'+module_id+'"] td').eq(3).attr('input_1');
                var input2 = $('table tr[module_id="'+module_id+'"] td').eq(4).attr('input_2');
                var input3 = $('table tr[module_id="'+module_id+'"] td').eq(5).attr('input_3');
                var input4 = $('table tr[module_id="'+module_id+'"] td').eq(6).attr('input_4');
                var input5 = $('table tr[module_id="'+module_id+'"] td').eq(7).attr('input_5');
                var date_update = $('table tr[module_id="'+module_id+'"] td').eq(8).attr('date_update');

                var data = [];
                data['input_1'] = input1;
                data['input_2'] = input2;
                data['input_3'] = input3;
                data['input_4'] = input4;
                data['input_5'] = input5;
                var htmlFlag = false;
                var html = "";
                for (key in data){
                    if(data[key] != ""){
                        htmlFlag = true;
                        html += '<div data-repeater-item="" style="">'+
                            '<div id="kt_modal_add_module_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_module_header" data-kt-scroll-wrappers="#kt_modal_add_module_scroll" data-kt-scroll-offset="300px" bis_skin_checked="1" class="d-flex flex-column scroll-y me-n7 pe-7 page_speed_196737743" style="max-height: 423px;">'+
                            '<div class="row">'+
                            '<div class="fv-row mb-7 fv-plugins-icon-container col-lg-9" bis_skin_checked="1">'+
                            '<label class="fw-bold fs-6 mb-2">Поле '+Number(key.replace(/[^0-9\.]/g, ''))+'</label>'+
                        '<input type="text" name="repeater_val['+Number(key.replace(/[^0-9\.]/g, ''))+'][module_input]" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Введите поле" value="'+data[key]+'" >'+
                            '<div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>'+
                        '</div>'+
                        '<div class="fv-row mb-7 fv-plugins-icon-container col-lg-3" bis_skin_checked="1">'+
                            '<label class="fw-bold fs-6 mb-2"></label>'+
                            '<a href="javascript:;" data-repeater-delete="" class="btn btn-sm btn-light-danger mt-3 mt-md-8">'+
                                '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">'+
                                    '<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>'+
                                '</svg>'+
                            '</a>'+
                        '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>';
                    }
                }
                console.log('htmlFlag',htmlFlag);
                if(!htmlFlag){
                    html += '<div data-repeater-item="" style="">'+
                        '<div id="kt_modal_add_module_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_module_header" data-kt-scroll-wrappers="#kt_modal_add_module_scroll" data-kt-scroll-offset="300px" bis_skin_checked="1" class="d-flex flex-column scroll-y me-n7 pe-7 page_speed_196737743" style="max-height: 423px;">'+
                        '<div class="row">'+
                        '<div class="fv-row mb-7 fv-plugins-icon-container col-lg-9" bis_skin_checked="1">'+
                        '<label class="fw-bold fs-6 mb-2">Поле 1</label>'+
                        '<input type="text" name="repeater_val[0][module_input]" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Введите поле" value="" >'+
                        '<div class="fv-plugins-message-container invalid-feedback" bis_skin_checked="1"></div>'+
                        '</div>'+
                        '<div class="fv-row mb-7 fv-plugins-icon-container col-lg-3" bis_skin_checked="1">'+
                        '<label class="fw-bold fs-6 mb-2"></label>'+
                        '<a href="javascript:;" data-repeater-delete="" class="btn btn-sm btn-light-danger mt-3 mt-md-8">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">'+
                        '<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>'+
                        '</svg>'+
                        '</a>'+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        '</div>';
                }
                $('#repeater_val div[data-repeater-list="repeater_val"]').append(html);

                if($('div[data-repeater-item]').length >= 5){
                    $('#repeater_val a[data-repeater-create]').hide();
                }else{
                    $('#repeater_val a[data-repeater-create]').show();
                }
                $('#kt_modal_add_module_header h2').text('Редактировать');
                $("input[name='module_price']").val(module_price);
                $("input[name='module_id']").val(module_id);
                $(".oldPrice").text('Старая цена - '+module_price+ ' руб./месяц');
                $(".lastDateUpdate").text('Дата последнего обновления цены - '+date_update);
                $("input[name='module_name']").val(module_name);
                $("textarea[name='module_description']").text(module_description);
            }
        });

        $('.btnCloseModal').on('click', function (){
            $('#kt_modal_add_module').css('display', 'none');
            $('#kt_modal_add_module').removeClass('show');
            $('#kt_modal_add_module').removeAttr('role');
            $('.modal-backdrop').remove();
            $('body').removeClass('modal-open');
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
        Swal.fire({
            text: text,
            icon: type,
            buttonsStyling: false,
            confirmButtonText: "Закрыть",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        });
    });
</script>
<?php } ?>
