<x-auth-layout>

    <!--begin::Signup Form-->
    <form method="POST" action="{{ theme()->getPageUrl('register') }}" class="form w-100" novalidate="novalidate" id="kt_sign_up_form">
    @csrf

    <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">
                {{ __('Создать аккаунт') }}
            </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">
                {{ __('Уже есть аккаунт?') }}

                <a href="{{ theme()->getPageUrl('login') }}" class="link-primary fw-bolder">
                    {{ __('Войти') }}
                </a>
            </div>
            <!--end::Link-->
        </div>
        <!--end::Heading-->


        <!--begin::Separator-->
        <div class="d-flex align-items-center mb-10">
            <div class="border-bottom border-gray-300 mw-50 w-100"></div>
            <span class="fw-bold text-gray-400 fs-7 mx-2">{{ __('ИЛИ') }}</span>
            <div class="border-bottom border-gray-300 mw-50 w-100"></div>
        </div>
        <!--end::Separator-->

        <!--begin::Input group-->
        <div class="fv-row mb-7 emailBlock">
            <label class="form-label fw-bolder text-dark fs-6">{{ __('Email') }}</label>
            <input class="form-control form-control-lg form-control-solid" type="email" name="email" autocomplete="off" value="{{ old('email') }}"/>
        </div>
        <div class="fv-row mb-7 companyBlock">
            <label class="form-label fw-bolder text-dark fs-6">{{ __('Название компании') }}</label>
            <input class="form-control form-control-lg form-control-solid" type="type" name="companyName" autocomplete="off" value="{{ old('email') }}"/>
        </div>
        <div class="fv-row mb-7">
            <label class="form-label fw-bolder text-dark fs-6">{{ __('Телефон') }}</label>
            <div class="row fv-row mb-7">
                <!--begin::Col-->
                <div class="col-xl-1" style="display: flex;justify-content: center;align-items: center;font-size: 18px;">
                   +7
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-xl-11">
                    <input class="form-control form-control-lg form-control-solid" required type="tel" name="phone" autocomplete="off" value=""/>
                </div>
                <!--end::Col-->
            </div>
            <div>
            </div>
        </div>
        <!--end::Input group-->

        <!--end::Input group--->


        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <label class="form-check form-check-custom form-check-solid form-check-inline">
                <input class="form-check-input" type="checkbox" name="toc" value="1"/>
                <span class="form-check-label fw-bold text-gray-700 fs-6">
                 Cогласен с <a href="#" class="ms-1 link-primary">{{ __('политикой обработки персональных данных') }}</a>.
            </span>
            </label>
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="text-center">
            <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                Зарегистрироваться
            </button>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Signup Form-->
    @section('scripts')
        <script>
            $('input[name="phone"]').on('keydown', function(e){
                if(e.key.length == 1 && e.key.match(/[^0-9'".]/)){
                    return false;
                };
            })
            $('input[name="email"]').on('keydown', function(e){
                setTimeout(function (){
                if($('.emailFalse').length == 1){
                    $('.emailFalse').hide();
                }
                if($('.emailBlock .fv-plugins-message-container div').length == 0){
                    var res = $('input[name="email"]').val().split('@')[0];
                    var regexp = /[а-яё]/i;
                    if(res.length > 0){
                        if(regexp.test(res)) {
                            if($('.emailBlock .fv-plugins-message-container div').length == 0){
                                if($('.emailFalse').length == 0){
                                    $('.emailBlock .fv-plugins-message-container').before('<div class="emailFalse" data-field="email" data-validator="emailAddress" style="font-size: 0.925rem;color: #F1416C;">Введено недопустимое значение email</div>');
                                }else{
                                    $('.emailFalse').show();
                                }
                            }
                        }
                    }
                    if($(".emailFalse").is(":visible") || $('.emailBlock .fv-plugins-message-container div').length > 0){
                        $('#kt_sign_up_submit').prop('disabled', true);
                    }else{
                        $('#kt_sign_up_submit').removeAttr("disabled");
                    }
                };
                },500);

            });
        </script>
    @endsection
</x-auth-layout>
