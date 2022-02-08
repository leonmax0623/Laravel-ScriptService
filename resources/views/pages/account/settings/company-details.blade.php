@section('breadcrumbs')
    <li class="breadcrumb-item text-gray-600">
        <a href="/" class="text-muted text-hover-primary">
            Рабочая панель
        </a>
    </li>
    <li class="breadcrumb-item text-gray-500">Моя компания</li>
@endsection
<!--begin::Basic info-->
<div class="card {{ $class }}">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">{{ __('Моя компания') }}</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->

    <!--begin::Content-->
    <div id="kt_account_profile_details" class="collapse show">
        <!--begin::Form-->
        <form id="kt_account_profile_details_form" class="form" method="POST" action="{{ route('settings.company') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('ИНН') }}</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row">
                                <input type="number" name="inn" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="ИНН" value="{{ old('inn', isset($userCompany->inn) ? $userCompany->inn : '') }}"/>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">{{ __('Название') }}</span>
                    </label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Название" value="{{ old('company', isset($userCompany->name) ? $userCompany->name : '') }}"/>
                    </div>
                    <div class="col-lg-8 fv-row" style="display:none">
                        <input type="text" name="full_name" class="form-control form-control-lg form-control-solid" placeholder="Название" value="{{ old('full_name', isset($userCompany->full_name) ? $userCompany->full_name : '') }}"/>
                    </div>
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">{{ __('ОГРН') }}</span>
                    </label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="ogrn" class="form-control form-control-lg form-control-solid" placeholder="ОГРН" value="{{ old('ogrn', isset($userCompany->ogrn) ? $userCompany->ogrn : '') }}"/>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">{{ __('КПП') }}</span>
                    </label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="kpp" class="form-control form-control-lg form-control-solid" placeholder="КПП" value="{{ old('kpp',isset($userCompany->kpp) ? $userCompany->kpp : '') }}"/>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">{{ __('Юридический адрес') }}</span>
                    </label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="legal_address" class="form-control form-control-lg form-control-solid" placeholder="Юридический адрес" value="{{ old('legal_address', isset($userCompany->legal_address) ? $userCompany->legal_address : '') }}"/>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->



                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('Фактический адрес') }}</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row">
                                <input type="text" name="actual_address" class="form-control form-control-lg form-control-solid" placeholder="Фактический адрес" value="{{ old('actual_address', isset($userCompany->actual_address) ? $userCompany->actual_address : '') }}"/>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
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
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

            </div>
            <!--end::Card body-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary" id="company_details_submit">
                    @include('partials.general._button-indicator', ['label' => __('Сохранить')])
                </button>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    $('input[name="legalAddressFlag"]').change(function()
    {
        if($(this).is(":checked")){
            $("input[name='actual_address']").val( $("input[name='legal_address']").val());
        }else{
            $("input[name='actual_address']").val('');
        }
    });
    $( "input[name='inn']" ).keyup(function() {
        $.ajax({
            url: "/api/getInnInfo",
            async: false,
            type: 'GET',
            data: {
                inn:$(this).val(),
            },
            success: function(data) {
                if(data != "") {
                    data = JSON.parse(data);
                    if (typeof data['short_name']) {
                        $("input[name='company']").val(data['short_name']);
                    }
                    if (typeof data['kpp']) {
                        $("input[name='kpp']").val(data['kpp']);
                    }
                    if (typeof data['ogrn']) {
                        $("input[name='ogrn']").val(data['ogrn']);
                    }
                    if (typeof data['legal_address']) {
                        if($('input[name="legalAddressFlag"]').is(":checked")){
                            $("input[name='actual_address']").val(data['legal_address']);
                        }
                        $("input[name='legal_address']").val(data['legal_address']);
                    }
                    if (typeof data['full_name']) {
                        $("input[name='full_name']").val(data['full_name']);
                    }
                }
            },
            error: function(err) {}
        });
    });
</script>

<!--end::Basic info-->
