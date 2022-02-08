<title>{{ __('Моя компания') }}</title>
@section('PageName', 'Моя компания')
<x-base-layout>
    {{ theme()->getView('pages/account/settings/company-details', array('class' => 'mb-5 mb-xl-10', 'info' => $info,'userCompany'=>$userCompany)) }}

</x-base-layout>
