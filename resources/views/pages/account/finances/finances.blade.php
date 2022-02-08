<title>{{ __('Мой профиль') }}</title>
@section('PageName', 'Профиль')
@section('breadcrumbs')
    <li class="breadcrumb-item text-gray-600">
        <a href="/" class="text-muted text-hover-primary">
            Рабочая панель
        </a>
    </li>
    <li class="breadcrumb-item text-gray-600">
        <a href="/account/overview" class="text-muted text-hover-primary">
            Профиль
        </a>
    </li>
    <li class="breadcrumb-item text-gray-500">Финансы</li>
@endsection
<x-base-layout>

    {{ theme()->getView('pages/account/_navbar', array('class' => 'mb-5 mb-xl-10', 'info' => $info,'dateCreate'=>$dateCreate)) }}

    {{ theme()->getView('pages/account/finances/financeInfo', array('class' => 'mb-5 mb-xl-10', 'info' => $info,'financeActivity'=>$financeActivity,'dateCreate'=>$dateCreate,'activeModule'=>$activeModule,'userTariff'=>$userTariff,'useTariffDay'=>$useTariffDay,'allFinanceActivity'=>$allFinanceActivity)) }}

</x-base-layout>
