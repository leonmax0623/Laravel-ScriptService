
<x-auth-layout>
    <!--begin::Verify Email Form-->
    <div class="w-100">

        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">
                {{ __('Спасибо за регистрацию!') }}
            </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">
                {{ __('На адрес электронной почты, который вы указали при регистрации было отправлено письмо с паролем') }}
            </div>
            <!--::Link-->

            <!--begin::Session Status-->
            @if (session('status') === 'verification-link-sent')
                <p class="font-medium text-sm text-gray-500 mt-4">
                    {{ __('На адрес электронной почты, который вы указали при регистрации, была отправлена новая ссылка для подтверждения.') }}
                </p>
            @endif
            <!--end::Session Status-->
        </div>
        <!--begin::Heading-->

        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <a href="/"><button type="submit" class="btn btn-lg btn-primary fw-bolder me-4">{{ __('Перейти в кабинет') }}</button></a>

{{--            <form method="POST" action="{{ theme()->getPageUrl('logout') }}">--}}
{{--                @csrf--}}
{{--                <button type="submit" class="btn btn-lg btn-light-primary fw-bolder me-4">{{ __('Выйти') }}</button>--}}
{{--            </form>--}}
        </div>
        <!--end::Actions-->
    </div>

    <!--end::Verify Email Form-->
</x-auth-layout>
